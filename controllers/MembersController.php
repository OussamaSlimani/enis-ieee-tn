<?php
require_once 'Controller.php';
require_once 'models/MembersModel.php';

class MembersController extends Controller
{
	private $MembersModel;

	public function __construct()
	{
		parent::__construct();
		$this->MembersModel = new MembersModel();
	}

	/* ################## get list of active members ################## */
	public function active()
	{
		$members = $this->MembersModel->findBy([
			'MembershipStatus' => 'Active',
		]);
		$this->render_view_secured('members/members', ['members' => $members]);
	}

	/* ################## open create member view ################## */
	public function create()
	{
		$this->render_view_secured('members/create');
	}

	/* ################## Create new active member ################## */
	public function store()
	{
		if ($_SERVER['REQUEST_METHOD'] != 'POST') {
			$this->render_view_secured('members/create', ['notification' => ["success" => false, "message" => "Error: Email and password not provided"]]);
			return;
		}

		$ieeenumber = $_POST['ieeenumber'] ?? '';
		$email = $_POST['email'] ?? '';
		$fullname = $_POST['fullname'] ?? '';
		$department = $_POST['department'] ?? '';
		$password = $_POST['password'] ?? '';
		$membershipstatus = $_POST['membershipstatus'] ?? '';
		$joining = $_POST['joining_time'] ?? '';

		if ($this->MembersModel->findBy(['Email' => $email])) {
			$this->render_view_secured('members/create', ['notification' => ["success" => false, "message" => "Error: Email already exists."]]);
			return;
		}

		$joining_date = new DateTime($joining);
		$current_year = (int) $joining_date->format('Y');
		$next_year = $current_year + 1;
		$two_years_after = $current_year + 2;
		$end_membership = ($joining_date >= new DateTime("$current_year-08-16") && $joining_date <= new DateTime("$current_year-12-31"))
			? "$two_years_after-01-01"
			: "$next_year-01-01";

		$data = [
			'IeeeNumber' => $ieeenumber,
			'email' => $email,
			'fullname' => $fullname,
			'password' => $password,
			'department' => $department,
			'MembershipStatus' => $membershipstatus,
			'EndMembership' => $end_membership
		];

		try {
			$lastInsertId = $this->MembersModel->create($data);
			$notification = $lastInsertId
				? ["success" => true, "message" => "Member created successfully!"]
				: ["success" => false, "message" => "Failed to create account. Please try again."];
		} catch (PDOException $e) {
			$notification = ["success" => false, "message" => "Failed to create account. Please try again."];
		}

		$this->render_view_secured('members/create', ['notification' => $notification]);
	}


	/* ################## Search active member by full name ################## */
	public function search()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
			$searchTerm = $_POST['search'];
			$today = date('Y-m-d');

			$conditions = [
				'FullName LIKE ?' => $searchTerm,
				'MembershipStatus = ?' => 'Active',
				'EndMembership >= ?' => $today
			];

			$members = $this->MembersModel->search($conditions);
			$this->render_view_secured('members/members', ['members' => $members]);
		} else {
			$this->render_view_secured('members/members');
		}
	}

	/* ################## open update active member view ################## */
	public function edit()
	{
		$code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);
		if ($code) {
			$member = $this->MembersModel->find($code);

			if ($member) {
				$this->render_view_secured('members/update', [
					'member' => $member
				]);
			} else {
				$this->render_view_secured('members/update', [
					'notification' => "Member not found. Please try again."
				]);
			}
		} else {
			$this->render_view_secured('members/update', [
				'notification' => "Failed to get member account. Please try again."
			]);
		}
	}

	/* ################## update active member ################## */
	public function update()
	{
		if (isset($_GET['code'])) {
			$code = $_GET['code'];

			$ieeenumber = isset($_POST['ieeenumber']) ? htmlspecialchars($_POST['ieeenumber']) : '';
			$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
			$fullName = isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '';
			$department = isset($_POST['department']) ? htmlspecialchars($_POST['department']) : '';
			$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
			$membershipStatus = isset($_POST['membershipstatus']) ? htmlspecialchars($_POST['membershipstatus']) : '';
			$endMembership = isset($_POST['EndMembership']) ? htmlspecialchars($_POST['EndMembership']) : '';

			$data = [
				'fullName' => $fullName,
				'ieeeNumber' => $ieeenumber,
				'email' => $email,
				'department' => $department,
				'password' => $password,
				'membershipStatus' => $membershipStatus,
				'endMembership' => $endMembership
			];

			$updateResult = $this->MembersModel->update($code, $data);

			if ($updateResult) {
				$notification = ["success" => true, "message" => "The update was successful!"];
			} else {
				$notification = ["success" => false, "message" => "The update failed. Try again!"];
			}

			$member = $this->MembersModel->find($code);

			$this->render_view_secured('members/update', [
				'member' => $member,
				'notification' => $notification
			]);
		}
	}

	/* ################## delete active member ################## */
	public function delete()
	{
		$notification = "";

		if (isset($_GET['code'])) {
			$memberId = $_GET['code'];
			if ($this->MembersModel->delete($memberId)) {
				$notification = array("success" => true, "message" => "Member deleted successfully.");
			} else {
				$notification = array("success" => false, "message" => "Failed to delete member.");
			}
		} else {
			$notification = array("success" => false, "message" => "Member ID not provided.");
		}

		$members = $this->MembersModel->findBy([
			'MembershipStatus' => 'Active',
		]);

		$this->render_view_secured('members/members', [
			'members' => $members,
			'notification' => $notification
		]);
	}

	/* ################## List of Members' Scores ################## */
	public function score()
	{
		$members = $this->MembersModel->findBy([
			'MembershipStatus' => 'Active',
		]);
		$this->render_view_secured('members/score', ['members' => $members]);
	}


	/* ################## open new member page ################## */
	public function new_members()
	{
		$members = $this->MembersModel->findBy([
			'MembershipStatus' => 'Not Active',
		]);
		$this->render_view_secured('members/newMembers', ['members' => $members]);
	}

	/* ################## delete new member ################## */
	public function delete_new_member()
	{
		$notification = "";

		if (isset($_GET['code'])) {
			$memberId = $_GET['code'];
			if ($this->MembersModel->delete($memberId)) {
				$notification = array("success" => true, "message" => "Member deleted successfully.");
			} else {
				$notification = array("success" => false, "message" => "Failed to delete member.");
			}
		} else {
			$notification = array("success" => false, "message" => "Member ID not provided.");
		}

		$members = $this->MembersModel->findBy([
			'MembershipStatus' => 'Not Active',
		]);

		$this->render_view_secured('members/newMembers', [
			'members' => $members,
			'notification' => $notification
		]);
	}

	/* ################## search new member ################## */
	public function search_new_member()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
			$searchTerm = $_POST['search'];

			$conditions = [
				'FullName LIKE ?' => $searchTerm,
				'MembershipStatus = ?' => 'Not Active'
			];

			$members = $this->MembersModel->search($conditions);
			$this->render_view_secured('members/newMembers', ['members' => $members]);
		} else {
			$this->render_view_secured('members/newMembers');
		}
	}

	/* ################## payment of new member ################## */
	public function payment_new_member()
	{
		if (isset($_GET['code'])) {
			$code = $_GET['code'];

			$joining_date = new DateTime();
			$current_year = (int) $joining_date->format('Y');
			$next_year = $current_year + 1;
			$two_years_after = $current_year + 2;

			if ($joining_date >= new DateTime("$current_year-08-16") && $joining_date <= new DateTime("$current_year-12-31")) {
				$end_membership = "$two_years_after-01-01";
			} else {
				$end_membership = "$next_year-01-01";
			}

			$data = [
				'membershipStatus' => 'Active',
				'endMembership' => $end_membership
			];

			$updateResult = $this->MembersModel->update($code, $data);

			if ($updateResult) {
				$notification = ["success" => true, "message" => "The payment was successful!"];
			} else {
				$notification = ["success" => false, "message" => "The payment failed. Try again!"];
			}
		} else {
			$notification = ["success" => false, "message" => "Failed to process the payment request."];
		}

		$members = $this->MembersModel->findBy([
			'MembershipStatus' => 'Not Active',
		]);

		$this->render_view_secured('members/newMembers', [
			'members' => $members,
			'notification' => $notification
		]);
	}

	/* ################## get list of members who need renew ################## */
	public function renew_members()
	{
		$members = $this->MembersModel->findBy([
			'MembershipStatus' => 'Active',
		]);
		$this->render_view_secured('members/renewMembers', ['members' => $members]);
	}

	/* ################## search of members who need renew ################## */
	public function search_renew_member()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
			$searchTerm = $_POST['search'];

			$conditions = [
				'FullName LIKE ?' => $searchTerm,
				'MembershipStatus = ?' => 'Active'
			];

			$members = $this->MembersModel->search($conditions);
			$this->render_view_secured('members/renewMembers', ['members' => $members]);
		} else {
			$this->render_view_secured('members/renewMembers');
		}
	}

	/* ################## delete of members who need renew ################## */
	public function delete_renew_member()
	{
		$notification = "";

		if (isset($_GET['code'])) {
			$memberId = $_GET['code'];
			if ($this->MembersModel->delete($memberId)) {
				$notification = array("success" => true, "message" => "Member deleted successfully.");
			} else {
				$notification = array("success" => false, "message" => "Failed to delete member.");
			}
		} else {
			$notification = array("success" => false, "message" => "Member ID not provided.");
		}

		$members = $this->MembersModel->findBy([
			'MembershipStatus' => 'Active',
		]);

		$this->render_view_secured('members/renewMembers', [
			'members' => $members,
			'notification' => $notification
		]);
	}

	/* ################## renew the membership ################## */
	public function payment_renew_member()
	{
		if (isset($_GET['code'])) {
			$code = $_GET['code'];

			$joining_date = new DateTime();
			$current_year = (int) $joining_date->format('Y');
			$next_year = $current_year + 1;
			$two_years_after = $current_year + 2;

			if ($joining_date >= new DateTime("$current_year-08-16") && $joining_date <= new DateTime("$current_year-12-31")) {
				$end_membership = "$two_years_after-01-01";
			} else {
				$end_membership = "$next_year-01-01";
			}

			$data = [
				'endMembership' => $end_membership
			];

			$updateResult = $this->MembersModel->update($code, $data);

			if ($updateResult) {
				$notification = ["success" => true, "message" => "The payment was successful!"];
			} else {
				$notification = ["success" => false, "message" => "The payment failed. Try again!"];
			}
		} else {
			$notification = ["success" => false, "message" => "Failed to process the payment request."];
		}

		$members = $this->MembersModel->findBy([
			'MembershipStatus' => 'Active',
		]);

		$this->render_view_secured('members/renewMembers', [
			'members' => $members,
			'notification' => $notification
		]);
	}
}
