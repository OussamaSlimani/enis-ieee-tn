<?php
class ModelMember
{
	private $db;

	public function __construct()
	{
		$this->db = Database::getInstance()->getConnection();
	}

	/* ================================  Active Members ======================  */
	public function getActiveMembers()
	{
		$today = date('Y-m-d');
		$query = "SELECT * FROM Members WHERE MembershipStatus = 'Active' AND EndMembership >= :today";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':today', $today);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function create($IeeeNumber, $fullname, $email, $password, $department, $membershipstatus, $joining_time)
	{
		$query = "SELECT COUNT(*) FROM Members WHERE Email = :email";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		if ($count > 0) {
			return array("success" => false, "message" => "Email already exists!");
		}

		$joining_date = new DateTime($joining_time);
		$current_year = (int) $joining_date->format('Y');
		$next_year = $current_year + 1;
		$two_years_after = $current_year + 2;

		$end_membership = '';

		if ($joining_date >= new DateTime("$current_year-08-16") && $joining_date <= new DateTime("$current_year-12-31")) {
			$end_membership = "$two_years_after-01-01";
		} else {
			$end_membership = "$next_year-01-01";
		}
		$query = "INSERT INTO Members (IeeeNumber, Email, FullName, Department, Password, MembershipStatus, EndMembership)
          VALUES (:ieeenumber, :email, :fullname, :department, :password, :membershipstatus, :end_membership)";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':ieeenumber', $IeeeNumber);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':fullname', $fullname);
		$stmt->bindParam(':department', $department);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':membershipstatus', $membershipstatus);
		$stmt->bindParam(':end_membership', $end_membership);

		if ($stmt->execute()) {
			return array("success" => true, "message" => "Account created successfully!");
		} else {
			return array("success" => false, "message" => "Failed to create account. Please try again.");
		}
	}

	public function search($searchTerm)
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

	public function findByID($Id)
	{
		$query = "SELECT * FROM Members WHERE MemberId = :Id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':Id', $Id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function update($memberId, $ieeenumber, $email, $fullName, $department, $password, $membershipStatus, $endMembership)
	{
		$query = "UPDATE Members SET IeeeNumber = :ieeenumber, email = :email, fullName = :fullName, department = :department, password = :password, MembershipStatus = :membershipStatus, EndMembership = :endMembership WHERE MemberId = :memberId";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':memberId', $memberId);
		$stmt->bindParam(':ieeenumber', $ieeenumber);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':fullName', $fullName);
		$stmt->bindParam(':department', $department);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':membershipStatus', $membershipStatus);
		$stmt->bindParam(':endMembership', $endMembership);
		if ($stmt->execute()) {
			return array("success" => true, "message" => "Account updated successfully!");
		} else {
			return array("success" => false, "message" => "Failed to update account. Please try again.");
		}
	}

	public function delete($memberId)
	{
		$query = "DELETE FROM Members WHERE MemberId = :memberId";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':memberId', $memberId, PDO::PARAM_INT);
		if ($stmt->execute()) {
			return array("success" => true, "message" => "Member deleted!");
		} else {
			return array("success" => false, "message" => "Failed to delete member");
		}
	}

	/* ================================  New Members ======================  */
	public function getNewMembers()
	{
		$query = "SELECT * FROM Members WHERE MembershipStatus = 'Not Active'";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function search_new_member($searchTerm)
	{
		$today = date('Y-m-d');
		$query = "SELECT * FROM Members WHERE LOWER(FullName) LIKE LOWER(:searchTerm) AND MembershipStatus = 'Not Active' AND EndMembership >= :today";
		$stmt = $this->db->prepare($query);
		$searchTerm = "%$searchTerm%";
		$stmt->bindParam(':searchTerm', $searchTerm);
		$stmt->bindParam(':today', $today);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function payment_new_member($Id)
	{
		$joining_date = new DateTime(date('Y-m-d'));
		$current_year = (int) $joining_date->format('Y');
		$next_year = $current_year + 1;
		$two_years_after = $current_year + 2;

		$end_membership = '';

		if ($joining_date >= new DateTime("$current_year-08-16") && $joining_date <= new DateTime("$current_year-12-31")) {
			$end_membership = "$two_years_after-01-01";
		} else {
			$end_membership = "$next_year-01-01";
		}

		$query = "UPDATE Members SET MembershipStatus = 'Active', EndMembership = :end_membership WHERE MemberId = :id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':id', $Id, PDO::PARAM_INT);
		$stmt->bindParam(':end_membership', $end_membership, PDO::PARAM_STR);

		if ($stmt->execute()) {
			return array("success" => true, "message" => "Payment processed successfully.");
		} else {
			return array("success" => false, "message" => "Failed to process the payment request.");
		}
	}

	/* ================================  Renew Members ======================  */

	public function getOldMembers()
	{
		$today = date('Y-m-d');
		$query = "SELECT * FROM Members WHERE MembershipStatus = 'Active' AND EndMembership < :today";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':today', $today);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function search_renew_member($searchTerm)
	{
		$today = date('Y-m-d');
		$query = "SELECT * FROM Members WHERE LOWER(FullName) LIKE LOWER(:searchTerm) AND MembershipStatus = 'Active' AND EndMembership < :today";
		$stmt = $this->db->prepare($query);
		$searchTerm = "%$searchTerm%";
		$stmt->bindParam(':searchTerm', $searchTerm);
		$stmt->bindParam(':today', $today);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function payment_renew_member($Id)
	{
		$next_year = date('Y') + 1;
		$end_membership = "$next_year-01-01";

		$query = "UPDATE Members SET EndMembership = :end_membership WHERE MemberId = :id";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':end_membership', $end_membership);
		$stmt->bindParam(':id', $Id, PDO::PARAM_INT);
		if ($stmt->execute()) {
			return array("success" => true, "message" => "Payment processed successfully.");
		} else {
			return array("success" => false, "message" => "Failed to process the payment request.");
		}
	}

	/* ================================  Renew Members ======================  */
	public function score()
	{
		$today = date('Y-m-d');
		$query = "SELECT * FROM Members WHERE MembershipStatus = 'Active' AND EndMembership >= :today ORDER BY score DESC";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':today', $today);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}











	/************************** */

	public function getAll()
	{
		$query = "SELECT * FROM Members";
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
