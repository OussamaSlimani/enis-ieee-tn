<?php
require_once 'app/controllers/Controller.php';
require_once 'app/models/ModelOfficer.php';
require_once 'app/models/Database.php';

class ControllerOfficer extends Controller
{
     private $model;

     public function __construct()
     {
          parent::__construct();
          $db = Database::getInstance()->getConnection();
          $this->model = new ModelOfficer($db);
     }
     public function officers()
     {
          $officers  = $this->model->getOfficers();
          $this->render_view_secured('officers/officers', ['officers' => $officers]);
     }
     public function create_officer()
     {
          $members = $this->model->getActiveMembers();
          $this->render_view_secured('officers/create', ['members' => $members]);
     }
     public function store_officer()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $IdMember = $_POST['IdMember'];
               $Position = $_POST['Position'];
               $Chapter = $_POST['Chapter'];

               $notification = $this->model->create_officer($IdMember, $Position, $Chapter);
          } else {
               $notification = array("success" => false, "message" => "Error: Invalid request method");
          }
          $members = $this->model->getActiveMembers();
          $this->render_view_secured('officers/create', [
               'notification' => $notification, 'members' => $members
          ]);
     }

     public function delete_officer()
     {
          if (isset($_GET['code'])) {
               $Id = $_GET['code'];
               $notification = $this->model->deleteOfficerById($Id);
          } else {
               $notification = "Failed to delete member";
          }

          $officers  = $this->model->getOfficers();
          $this->render_view_secured('officers/officers', ['officers' => $officers, 'notification' => $notification]);
     }

     public function filter_officers()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $chapter = $_POST['chapter'];
               if ($chapter === 'all') {
                    $officers = $this->model->getOfficers();
               } else {
                    $officers = $this->model->getOfficersByChapter($chapter);
               }
               $this->render_view_secured('officers/officers', ['officers' => $officers]);
          }
     }
}
