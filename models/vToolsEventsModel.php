<?php
require_once 'Model.php';

class vToolsEventsModel extends Model
{
     protected $table = 'vToolsEvents';

     public function __construct()
     {
          $this->pdo = Model::getInstance()->getConnection();
     }

     // verifyPayment 
     public function verifyPayment($email, $password)
     {
          $result = $this->findBy([
               'Email' => $email,
               'Password' => $password
          ]);

          if (!empty($result)) {
               $result = $result[0];
               if ($result['MembershipStatus'] == 'Not Active' || $result['EndMembership'] < date('Y-m-d')) {
                    return array("success" => false, "message" => "The Payment is not processed yet!");
               } else {
                    return array("success" => true, "message" => "The Payment is processed!");
               }
          } else {
               return array("success" => false, "message" => "Error, verify your email or password!");
          }
     }


     // verifyPayment 
     public function updateIeeeEmailNumber($ieeeNumber, $ieeeEmail, $email, $password)
     {
          // First, check if the user is valid and active
          $result = $this->findBy([
               'Email' => $email,
               'Password' => $password,
               'MembershipStatus' => 'Active'
          ]);

          if (!empty($result)) {
               $result = $result[0]; // Assuming findBy returns an array

               // Prepare the data for updating
               $data = [
                    'IeeeNumber' => $ieeeNumber,
                    'IeeeEmail' => $ieeeEmail
               ];

               // Update the data
               $updateResult = $this->update($result['id'], $data);

               if ($updateResult > 0) {
                    return array("success" => true, "message" => "The update was successful!");
               } else {
                    return array("success" => false, "message" => "The update failed. Try again!");
               }
          } else {
               return array("success" => false, "message" => "You can't update: Member not found or the payment is not processed yet!");
          }
     }
}
