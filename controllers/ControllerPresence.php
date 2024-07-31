<?php
require_once 'app/controllers/Controller.php';
require_once 'app/models/ModelPresence.php';
require_once 'app/models/Database.php';

class ControllerPresence extends Controller
{
     private $model;

     public function __construct()
     {
          parent::__construct();
          $db = Database::getInstance()->getConnection();
          $this->model = new ModelPresence($db);
     }

     public function presences()
     {
          $activities  = $this->model->getActivities();
          $this->render_view_secured('presences/presences', ['activities' => $activities]);
     }
     public function create_activity()
     {
          $this->render_view_secured('presences/create');
     }
     public function store_activity()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $name = $_POST['name'];
               $date = $_POST['date'];
               $type = $_POST['type'];
               $location_type = $_POST['location_type'];

               $notification = $this->model->store_presence($name, $date, $type, $location_type);
          } else {
               $notification = array("success" => false, "message" => "Error: Some fields are not provided");
          }
          $this->render_view_secured('presences/create', ['notification' => $notification]);
     }

     public function delete_activity()
     {
          if (isset($_GET['code'])) {
               $Id = $_GET['code'];
               $notification = $this->model->delete_activity($Id);
          } else {
               $notification = "Failed to delete activity";
          }

          $activities  = $this->model->getActivities();
          $this->render_view_secured('presences/presences', [
               'activities' => $activities,
               'notification' => $notification
          ]);
     }

     public function mark_presence()
     {
          if (isset($_GET['code'])) {
               $Id = $_GET['code'];
               $activity = $this->model->getActivityById($Id);
               $members = $this->model->getActiveMembers();
               $presences = $this->model->getPresencesByActivity($Id);
               $this->render_view_secured('presences/markPresence', [
                    'activity' => $activity,
                    'members' => $members,
                    'presences' => $presences
               ]);
          }
     }

     public function mark_as_present()
     {
          if (isset($_GET['code'])) {
               list($activityId, $memberId) = explode('-', $_GET['code']);
               $notification = $this->model->mark_as_present($memberId, $activityId);
          }

          $activity = $this->model->getActivityById($activityId);
          $members = $this->model->getActiveMembers();
          $presences = $this->model->getPresencesByActivity($activityId);
          $this->render_view_secured('presences/markPresence', [
               'activity' => $activity,
               'members' => $members,
               'presences' => $presences,
               'notification' => $notification
          ]);
     }

     public function remove_present()
     {
          if (isset($_GET['code'])) {
               list($activityId, $memberId) = explode('-', $_GET['code']);
               $notification = $this->model->remove_present($memberId, $activityId);
          }

          $activity = $this->model->getActivityById($activityId);
          $members = $this->model->getActiveMembers();
          $presences = $this->model->getPresencesByActivity($activityId);
          $this->render_view_secured('presences/markPresence', [
               'activity' => $activity,
               'members' => $members,
               'presences' => $presences,
               'notification' => $notification
          ]);
     }
     public function search_presence()
     {
          if (isset($_POST['ActivityId']) && !empty($_POST['ActivityId']) && isset($_POST['search'])) {
               $activityId = $_POST['ActivityId'];
               $searchTerm = $_POST['search'];
               $activity = $this->model->getActivityById($activityId);
               $members = $this->model->search_member_presence($searchTerm);
               $presences = $this->model->getPresencesByActivity($activityId);
               $this->render_view_secured('presences/markPresence', [
                    'activity' => $activity,
                    'members' => $members,
                    'presences' => $presences
               ]);
          }
     }
}
