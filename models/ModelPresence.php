<?php
class ModelPresence
{
     private $db;

     public function __construct()
     {
          $this->db = Database::getInstance()->getConnection();
     }
     public function getActivities()
     {
          $query = "
          SELECT * 
          FROM Activities
          ORDER BY Date DESC 
          ";
          $stmt = $this->db->prepare($query);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function store_presence($name, $date, $type, $location_type)
     {
          $Score = 0;
          if ($type == "workshop") {
               $Score += 5;
          } else if ($type == "event") {
               $Score += 10;
          } else if ($type == "syp") {
               $Score += 15;
          } else if ($type == "ag") {
               $Score += 10;
          } else if ($type == "building") {
               $Score += 25;
          } else if ($type == "ambassador") {
               $Score += 10;
          } else if ($type == "organization") {
               $Score += 15;
          } else if ($type == "networking") {
               $Score += 5;
          }
          if ($location_type == "physical") {
               $Score += 5;
          }

          $query = "INSERT INTO Activities (Name, Date, Type, LocationType, ActivityScore)
          VALUES (:name, :date, :type, :location_type, :Score)";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':date', $date);
          $stmt->bindParam(':type', $type);
          $stmt->bindParam(':location_type', $location_type);
          $stmt->bindParam(':Score', $Score);

          if ($stmt->execute()) {
               return array("success" => true, "message" => "Activity created successfully!");
          } else {
               return array("success" => false, "message" => "Failed to create activity. Please try again.");
          }
     }

     public function delete_activity($Id)
     {
          $query = "DELETE FROM Activities WHERE ActivityId = :Id";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':Id', $Id, PDO::PARAM_INT);
          if ($stmt->execute()) {
               return array("success" => true, "message" => "activity deleted");
          } else {
               return array("success" => false, "message" => "Failed to deleted activity");
          }
     }
     public function getActivityById($Id)
     {
          $query = "
             SELECT * 
             FROM Activities
             WHERE ActivityId = :Id
         ";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':Id', $Id, PDO::PARAM_INT);
          $stmt->execute();
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }

     public function getActiveMembers()
     {
          $today = date('Y-m-d');
          $query = "SELECT * FROM Members WHERE MembershipStatus = 'Active' AND EndMembership >= :today";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':today', $today);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function getPresencesByActivity($Id)
     {
          $query = "
             SELECT MemberId 
             FROM Presences
             WHERE ActivityId = :id
         ";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
     }

     public function UpdateScoreMember($MemberId, $ActivityId, $sign)
     {
          // Select the ActivityScore from the Activities table
          $querySelect = "
            SELECT ActivityScore FROM Activities WHERE ActivityId = :ActivityId;
        ";

          $stmtSelect = $this->db->prepare($querySelect);
          $stmtSelect->bindParam(':ActivityId', $ActivityId, PDO::PARAM_INT);
          $stmtSelect->execute();

          $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);
          if (!$result) {
               return false;
          }

          $ActivityScore = $result['ActivityScore'];

          // Update the score in the Members table based on the sign
          if ($sign == '+') {
               $queryUpdate = "
                UPDATE Members 
                SET Score = Score + :ActivityScore
                WHERE MemberId = :MemberId
            ";
          } else {
               $queryUpdate = "
                UPDATE Members 
                SET Score = Score - :ActivityScore
                WHERE MemberId = :MemberId
            ";
          }

          $stmtUpdate = $this->db->prepare($queryUpdate);
          $stmtUpdate->bindParam(':ActivityScore', $ActivityScore, PDO::PARAM_INT);
          $stmtUpdate->bindParam(':MemberId', $MemberId, PDO::PARAM_INT);
          $stmtUpdate->execute();

          return $stmtUpdate->rowCount();
     }

     public function mark_as_present($memberId, $activityId)
     {
          // Insert presence into Presences table
          $query = "INSERT INTO Presences (ActivityId, MemberId) VALUES (:activityId, :memberId)";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':activityId', $activityId, PDO::PARAM_INT);
          $stmt->bindParam(':memberId', $memberId, PDO::PARAM_INT);

          // Update member score
          $this->UpdateScoreMember($memberId, $activityId, '+');

          if ($stmt->execute()) {
               return ["success" => true, "message" => "Presence added!"];
          } else {
               return ["success" => false, "message" => "Failed to add presence. Please try again."];
          }
     }

     public function remove_present($memberId, $activityId)
     {
          // Update member score
          $this->UpdateScoreMember($memberId, $activityId, '-');

          // Delete presence from Presences table
          $query = "DELETE FROM Presences WHERE ActivityId = :activityId AND MemberId = :memberId";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':activityId', $activityId, PDO::PARAM_INT);
          $stmt->bindParam(':memberId', $memberId, PDO::PARAM_INT);

          if ($stmt->execute()) {
               return ["success" => true, "message" => "Presence removed!"];
          } else {
               return ["success" => false, "message" => "Failed to remove presence. Please try again."];
          }
     }

     public function search_member_presence($searchTerm)
     {
          $today = date('Y-m-d');
          $query = "SELECT * FROM Members WHERE LOWER(FullName) LIKE LOWER(:searchTerm) AND MembershipStatus = 'Active' AND EndMembership >= :today";
          $stmt = $this->db->prepare($query);
          $searchTerm = "%$searchTerm%";
          $stmt->bindParam(':searchTerm', $searchTerm);
          $stmt->bindParam(':today', $today);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
}
