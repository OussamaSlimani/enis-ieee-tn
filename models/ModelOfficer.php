<?php
class ModelOfficer
{
     private $db;

     public function __construct()
     {
          $this->db = Database::getInstance()->getConnection();
     }

     public function getOfficers()
     {
          $query = "
             SELECT o.OfficerId, m.FullName, m.Email, m.IeeeNumber, o.Position, o.Chapter 
             FROM Officers o
             JOIN Members m ON o.IdMember = m.MemberId
         ";
          $stmt = $this->db->prepare($query);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }


     public function deleteOfficerById($officerId)
     {
          $query = "DELETE FROM Officers WHERE OfficerId = :id";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':id', $officerId, PDO::PARAM_INT);
          if ($stmt->execute()) {
               return array("success" => true, "message" => "Officer deleted");
          } else {
               return array("success" => false, "message" => "Failed to deleted officer");
          }
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
     public function create_officer($IdMember, $Position, $Chapter)
     {
          $checkQuery = "SELECT COUNT(*) FROM Officers WHERE IdMember = :IdMember AND Chapter = :Chapter";
          $checkStmt = $this->db->prepare($checkQuery);
          $checkStmt->bindParam(':IdMember', $IdMember);
          $checkStmt->bindParam(':Chapter', $Chapter);
          $checkStmt->execute();
          $count = $checkStmt->fetchColumn();
          if ($count > 0) {
               return array("success" => false, "message" => "The member already holds a position in this chapter");
          }
          $query = "INSERT INTO Officers (IdMember, Position, Chapter) VALUES (:IdMember, :Position, :Chapter)";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':IdMember', $IdMember);
          $stmt->bindParam(':Position', $Position);
          $stmt->bindParam(':Chapter', $Chapter);
          if ($stmt->execute()) {
               return array("success" => true, "message" => "Officer created successfully");
          } else {
               return array("success" => false, "message" => "Failed to create officer");
          }
     }


     public function getOfficersByChapter($Chapter)
     {
          $query = " SELECT o.OfficerId, m.FullName, m.Email, m.IeeeNumber, o.Position, o.Chapter 
                     FROM Officers o
                     JOIN Members m ON o.IdMember = m.MemberId
                     WHERE o.Chapter = :Chapter";
          $stmt = $this->db->prepare($query);
          $stmt->bindParam(':Chapter', $Chapter, PDO::PARAM_STR);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
}
