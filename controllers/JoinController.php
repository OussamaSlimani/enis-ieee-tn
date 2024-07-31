<?php
require_once 'Controller.php';
require_once 'models/JoinModel.php';

class JoinController extends Controller
{
     private $JoinModel;

     public function __construct()
     {
          parent::__construct();
          $this->JoinModel = new JoinModel();
     }

     // ====================  Join pages
     public function join()
     {
          $this->render_view('join/join');
     }

     public function step1()
     {
          $this->render_view('join/step1');
     }

     public function step2()
     {
          $this->render_view('join/step2');
     }

     public function step3()
     {
          $this->render_view('join/step3');
     }

     // ==================== New Account
     public function createNewAccount()
     {
          $notification = array("success" => false, "message" => "Error: Email and password not provided");
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $email = $_POST['email'];
               $fullname = $_POST['fullname'];
               $password = $_POST['password'];
               $department = $_POST['department'];
               if (!empty($email) && !empty($fullname) && !empty($password) && !empty($department)) {
                    $data = [
                         'email' => $email,
                         'fullname' => $fullname,
                         'password' => $password,
                         'department' => $department
                    ];
                    try {
                         $lastInsertId = $this->JoinModel->create($data);
                         if ($lastInsertId) {
                              $notification = array("success" => true, "message" => "Member created successfully!");
                         }
                    } catch (PDOException $e) {
                         $notification = array("success" => false, "message" => "Create failed: " . $e->getMessage());
                    }
               } else {
                    $notification['message'] = "Error: All fields are required.";
               }
          }
          $this->render_view('join/step1', ['notification' => $notification]);
     }

     // ==================== Verify Payment
     public function verifyPayment()
     {
          $notification = array("success" => false, "message" => "Error: Email and password not provided");

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               if (isset($_POST['email']) && isset($_POST['password'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $result = $this->JoinModel->findBy([
                         'Email' => $email,
                         'Password' => $password
                    ]);

                    if (!empty($result)) {
                         $result = $result[0];
                         if ($result['MembershipStatus'] == 'Not Active' || $result['EndMembership'] < date('Y-m-d')) {
                              $notification = array("success" => false, "message" => "The Payment is not processed yet!");
                         } else {
                              $notification = array("success" => true, "message" => "The Payment is processed!");
                         }
                    } else {
                         $notification = array("success" => false, "message" => "Error: Verify your email or password!");
                    }
               }
          }

          $this->render_view('join/step2', ['notification' => $notification]);
     }


     // ==================== Update IEEE Email and Number
     public function updateIeeeEmailNumber()
     {
          $notification = array("success" => false, "message" => "Error: IEEE Number, Email, IEEE email, and password not provided.");

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               if (isset($_POST['IeeeNumber']) && isset($_POST['email']) && isset($_POST['ieeeEmail']) && isset($_POST['password'])) {
                    $ieeeNumber = $_POST['IeeeNumber'];
                    $email = $_POST['email'];
                    $ieeeEmail = $_POST['ieeeEmail'];
                    $password = $_POST['password'];

                    $result = $this->JoinModel->findBy([
                         'Email' => $email,
                         'Password' => $password,
                         'MembershipStatus' => 'Active'
                    ]);

                    if (!empty($result)) {
                         $result = $result[0];
                         $updateData = [
                              'IeeeNumber' => $ieeeNumber,
                              'Email' => $email,
                              'IeeeEmail' => $ieeeEmail,
                              'Password' => $password
                         ];
                         $updateResult = $this->JoinModel->update($result['MemberId'], $updateData);

                         if ($updateResult) {
                              $notification = array("success" => true, "message" => "The update was successful!");
                         } else {
                              $notification = array("success" => false, "message" => "The update failed. Try again!");
                         }
                    } else {
                         $notification = array("success" => false, "message" => "You can't update: Member not found or the payment is not processed yet!");
                    }
               }
          }

          $this->render_view('join/step3', ['notification' => $notification]);
     }
}
