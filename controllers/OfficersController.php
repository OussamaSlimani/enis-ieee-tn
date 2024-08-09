<?php
require_once 'Controller.php';
require_once 'models/OfficersModel.php';
require_once 'models/MembersModel.php';

class OfficersController extends Controller
{
     private $OfficersModel;
     private $MembersModel;

     public function __construct()
     {
          parent::__construct();
          $this->OfficersModel = new OfficersModel();
          $this->MembersModel = new MembersModel();
     }

     /* ################## get list of officers ################## */
     public function getOfficersData()
     {
          $firstColumns = ['OfficerId', 'Position', 'Chapter'];
          $secondColumns = ['FullName', 'Email', 'IeeeNumber'];
          $firstColumnJoin = 'IdMember';
          $secondColumnJoin = 'MemberId';
          $secondTable = 'Members';
          $Type = 'INNER';

          return $this->OfficersModel->join($firstColumns, $secondColumns, $firstColumnJoin, $secondColumnJoin, $secondTable, $Type);
     }

     public function officers()
     {
          $officers = $this->getOfficersData();
          $this->render_view_secured('officers/officers', ['officers' => $officers]);
     }


     /* ################## open create officer page ################## */
     public function create_officer()
     {
          $members = $this->MembersModel->findBy([
               'MembershipStatus' => 'Active',
          ]);
          $today = date('Y-m-d');
          $members = array_filter($members, function ($member) use ($today) {
               return $member['EndMembership'] >= $today;
          });
          $this->render_view_secured('officers/create', ['members' => $members]);
     }

     /* ################## save officer ################## */
     public function store_officer()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $IdMember = $_POST['IdMember'] ?? '';
               $Position = $_POST['Position'] ?? '';
               $Chapter = $_POST['Chapter'] ?? '';

               $data = [
                    'IdMember' => $IdMember,
                    'Position' => $Position,
                    'Chapter' => $Chapter,
               ];

               try {
                    $lastInsertId = $this->OfficersModel->create($data);
                    $notification = $lastInsertId
                         ? ["success" => true, "message" => "Officer created successfully!"]
                         : ["success" => false, "message" => "Failed to create Officer. Please try again."];
               } catch (PDOException $e) {
                    $notification = ["success" => false, "message" => "Failed to create Officer. Please try again. Error: " . $e->getMessage()];
               }

               $officers = $this->getOfficersData();
               $this->render_view_secured('officers/officers', ['officers' => $officers, 'notification' => $notification]);
          }
     }

     /* ################## delete an officer ################## */
     public function delete_officer()
     {
          $notification = "";

          if (isset($_GET['code'])) {
               $OfficerId = $_GET['code'];
               if ($this->OfficersModel->delete($OfficerId)) {
                    $notification = array("success" => true, "message" => "Officers deleted successfully.");
               } else {
                    $notification = array("success" => false, "message" => "Failed to delete Officers.");
               }
          } else {
               $notification = array("success" => false, "message" => "Officers ID not provided.");
          }

          $officers = $this->getOfficersData();
          $this->render_view_secured('officers/officers', ['officers' => $officers, 'notification' => $notification]);
     }


     /* ################## filter officer by subunit ################## */
     public function filter_officers()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $chapter = $_POST['chapter'];
               if ($chapter === 'all') {
                    $officers = $this->getOfficersData();
               } else {
                    $officers = $this->getOfficersData();
                    $officers = array_filter($officers, function ($officer) use ($chapter) {
                         return $officer['Chapter'] == $chapter;
                    });
               }
               $this->render_view_secured('officers/officers', ['officers' => $officers]);
          }
     }
}
