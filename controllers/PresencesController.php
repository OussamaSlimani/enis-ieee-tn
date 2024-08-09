<?php
require_once 'Controller.php';
require_once 'models/ActivitiesModel.php';
require_once 'models/PresencesModel.php';
require_once 'models/MembersModel.php';

class PresencesController extends Controller
{
     private $ActivitiesModel;
     private $MembersModel;
     private $PresencesModel;

     public function __construct()
     {
          parent::__construct();
          $this->ActivitiesModel = new ActivitiesModel();
          $this->MembersModel = new MembersModel();
          $this->PresencesModel = new PresencesModel();
     }

     /* ################## get list of presences ################## */
     public function presences()
     {
          $activities = $this->ActivitiesModel->all();
          $this->render_view_secured('presences/presences', ['activities' => $activities]);
     }

     /* ################## open create activity page ################## */
     public function create_activity()
     {
          $this->render_view_secured('presences/create');
     }

     /* ################## save activity ################## */
     public function store_activity()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $name = $_POST['name'] ?? '';
               $date = $_POST['date'] ?? '';
               $type = $_POST['type'] ?? '';
               $location_type = $_POST['location_type'] ?? '';

               $Score = 0;
               switch ($type) {
                    case 'workshop':
                         $Score += 5;
                         break;
                    case 'event':
                         $Score += 10;
                         break;
                    case 'syp':
                         $Score += 15;
                         break;
                    case 'ag':
                         $Score += 10;
                         break;
                    case 'building':
                         $Score += 25;
                         break;
                    case 'ambassador':
                         $Score += 10;
                         break;
                    case 'organization':
                         $Score += 15;
                         break;
                    case 'networking':
                         $Score += 5;
                         break;
               }
               if ($location_type === 'physical') {
                    $Score += 5;
               }

               $data = [
                    'Name' => $name,
                    'Date' => $date,
                    'Type' => $type,
                    'LocationType' => $location_type,
                    'ActivityScore' => $Score,
               ];

               try {
                    $lastInsertId = $this->ActivitiesModel->create($data);
                    $notification = $lastInsertId
                         ? ["success" => true, "message" => "Activity created successfully!"]
                         : ["success" => false, "message" => "Failed to create activity. Please try again."];
               } catch (PDOException $e) {
                    $notification = ["success" => false, "message" => "Failed to create activity. Please try again. Error: " . $e->getMessage()];
               }

               $this->render_view_secured('presences/create', ['notification' => $notification]);
          }
     }

     /* ################## delete activity ################## */
     public function delete_activity()
     {
          $notification = "";

          if (isset($_GET['code'])) {
               $ActivityId = $_GET['code'];
               $deleted = $this->ActivitiesModel->delete($ActivityId);
               $notification = $deleted
                    ? ["success" => true, "message" => "Activity deleted successfully."]
                    : ["success" => false, "message" => "Failed to delete activity."];
          } else {
               $notification = ["success" => false, "message" => "Activity ID not provided."];
          }

          $activities = $this->ActivitiesModel->all();
          $this->render_view_secured('presences/presences', [
               'activities' => $activities,
               'notification' => $notification
          ]);
     }

     /* ################## open mark presence page ################## */
     private function getActivityData($ActivityId)
     {
          $activity = $this->ActivitiesModel->find($ActivityId);
          $members = $this->MembersModel->findBy([
               'MembershipStatus' => 'Active',
          ]);
          $today = date('Y-m-d');
          $members = array_filter($members, function ($member) use ($today) {
               return $member['EndMembership'] >= $today;
          });

          $presences = $this->PresencesModel->findBy([
               'ActivityId' => $ActivityId,
          ]);

          $presences = array_column($presences, 'MemberId');

          return [
               'activity' => $activity,
               'members' => $members,
               'presences' => $presences
          ];
     }

     public function mark_presence()
     {
          if (isset($_GET['code'])) {
               $ActivityId = $_GET['code'];
               $data = $this->getActivityData($ActivityId);
               $this->render_view_secured('presences/markPresence', $data);
          }
     }

     /* ################## mark the presence ################## */
     public function updateScoreMember($memberId, $activityId, $sign)
     {
          $notification = [];
          $activity = $this->ActivitiesModel->find($activityId);
          if (!$activity) {
               return ["success" => false, "message" => "Activity not found."];
          }
          $activityScore = $activity['ActivityScore'];

          $member = $this->MembersModel->find($memberId);
          if (!$member) {
               return ["success" => false, "message" => "Member not found."];
          }
          $score = $member['Score'];

          if ($sign === '+') {
               $score += $activityScore;
          } elseif ($sign === '-') {
               $score -= $activityScore;
          } else {
               return ["success" => false, "message" => "Invalid sign. Use '+' or '-'."];
          }

          $updateResult = $this->MembersModel->update($memberId, ['Score' => $score]);
          if ($updateResult) {
               $notification = ["success" => true, "message" => "The update was successful!"];
          } else {
               $notification = ["success" => false, "message" => "The update failed. Try again!"];
          }

          return $notification;
     }

     public function mark_as_present()
     {
          if (isset($_GET['code'])) {
               list($activityId, $memberId) = explode('-', $_GET['code']);

               try {
                    $lastInsertId = $this->PresencesModel->create(['ActivityId' => $activityId, 'MemberId' => $memberId]);
                    $this->updateScoreMember($memberId, $activityId, '+');
                    $notification = $lastInsertId
                         ? ["success" => true, "message" => "Presence added!"]
                         : ["success" => false, "message" => "Failed to add presence. Please try again."];
               } catch (PDOException $e) {
                    $notification = ["success" => false, "message" => "Failed to add presence. Please try again. Error: " . $e->getMessage()];
               }

               $data = $this->getActivityData($activityId);
               $this->render_view_secured('presences/markPresence', array_merge($data, $notification));
          }
     }

     /* ################## remove the presence ################## */
     public function remove_present()
     {
          if (isset($_GET['code'])) {
               list($activityId, $memberId) = explode('-', $_GET['code']);

               try {
                    $presence = $this->PresencesModel->findBy([
                         'ActivityId' => $activityId,
                         'MemberId' => $memberId
                    ]);

                    if (!empty($presence)) {
                         $Id = $presence[0]['Id'];
                         $deleted = $this->PresencesModel->delete($Id);
                         $this->updateScoreMember($memberId, $activityId, '-');

                         $notification = $deleted
                              ? ["success" => true, "message" => "Presence deleted!"]
                              : ["success" => false, "message" => "Failed to delete presence. Please try again."];
                    } else {
                         $notification = ["success" => false, "message" => "Presence not found."];
                    }
               } catch (PDOException $e) {
                    $notification = ["success" => false, "message" => "Failed to delete presence. Please try again. Error: " . $e->getMessage()];
               }

               $data = $this->getActivityData($activityId);
               $this->render_view_secured('presences/markPresence', array_merge($data, $notification));
          }
     }


     /* ################## search member by name ################## */
     public function search_presence()
     {
          if (isset($_POST['ActivityId']) && !empty($_POST['ActivityId']) && isset($_POST['search'])) {
               $activityId = $_POST['ActivityId'];
               $searchTerm = $_POST['search'];


               $today = date('Y-m-d');
               $conditions = [
                    'FullName LIKE ?' => $searchTerm,
                    'MembershipStatus = ?' => 'Active',
                    'EndMembership >= ?' => $today
               ];
               $members = $this->MembersModel->search($conditions);

               $activity = $this->ActivitiesModel->find($activityId);

               $presences = $this->PresencesModel->findBy([
                    'ActivityId' => $activityId,
               ]);
               $presences = array_column($presences, 'MemberId');
               $this->render_view_secured('presences/markPresence', [
                    'activity' => $activity,
                    'members' => $members,
                    'presences' => $presences
               ]);
          }
     }
}
