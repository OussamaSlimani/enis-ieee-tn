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

	public function active()
	{
		$members  = $this->MembersModel->all();
		$this->render_view_secured('members/members', ['members' => $members]);
	}

	public function create()
	{
		$this->render_view_secured('members/create');
	}

	public function store()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$ieeenumber = $_POST['ieeenumber'];
			$email = $_POST['email'];
			$fullname = $_POST['fullname'];
			$department = $_POST['department'];
			$password = $_POST['password'];
			$membershipstatus = $_POST['membershipstatus'];
			$joining = $_POST['joining_time'];
			$joining_time = date('Y-m-d', strtotime($joining));

			$notification = $this->model->create($ieeenumber, $fullname, $email, $password, $department, $membershipstatus, $joining_time);
		} else {
			$notification = array("success" => false, "message" => "Error: Email and password not provided");
		}
		$this->render_view_secured('members/create', ['notification' => $notification]);
	}

	public function search()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
			$searchTerm = $_POST['search'];
			$members = $this->model->search($searchTerm);
			$this->render_view_secured('members/members', ['members' => $members]);
		} else {
			// Handle case where search form is not submitted
			$this->render_view_secured('members/members');
		}
	}
	public function edit()
	{
		if (isset($_GET['code'])) {
			$code = $_GET['code'];
			$member = $this->model->findByID($code);
			if ($member) {
				$this->render_view_secured('members/update', [
					'member' => $member
				]);
			} else {
				$members  = $this->model->getActiveMembers();
				$this->render_view_secured('members/members', [
					'members'  => $members,
					'notification' => [
						'success' => false,
						'message' => 'Member not found.'
					]
				]);
			}
		} else {
			$members  = $this->model->getActiveMembers();
			$this->render_view_secured('members/members', [
				'members'  => $members,
				'notification' => [
					'success' => false,
					'message' => 'Invalid request.'
				]
			]);
		}
	}
	public function update()
	{
		if (isset($_GET['code'])) {
			$code = $_GET['code'];
			$member = $this->model->findByID($code);
			if ($member) {
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					// Sanitize inputs
					$ieeenumber = htmlspecialchars($_POST['ieeenumber']);
					$email = htmlspecialchars($_POST['email']);
					$fullName = htmlspecialchars($_POST['fullname']);
					$department = htmlspecialchars($_POST['department']);
					$password = htmlspecialchars($_POST['password']);
					$membershipStatus = htmlspecialchars($_POST['membershipstatus']);
					$endMembership = htmlspecialchars($_POST['EndMembership']);

					$notification = $this->model->update($code, $ieeenumber, $email, $fullName, $department, $password, $membershipStatus, $endMembership);
					$member = $this->model->findByID($code);
					$this->render_view_secured('members/update', [
						'member' => $member,
						'notification' => $notification
					]);
				}
			} else {
				// Handle case when member is not found
				echo "Member not found!";
			}
		}
	}

	public function delete()
	{
		if (isset($_GET['code'])) {
			$memberId = $_GET['code'];
			$notification = $this->model->delete($memberId);
		} else {
			$notification = "Failed to delete member";
		}

		$members  = $this->model->getActiveMembers();
		$this->render_view_secured('members/members', [
			'members' => $members,
			'notification' => $notification
		]);
	}

	/* ================================  New Members ======================  */
	public function new_members()
	{
		$members  = $this->model->getNewMembers();
		$this->render_view_secured('members/newMembers', ['members' => $members]);
	}

	public function delete_new_member()
	{
		if (isset($_GET['code'])) {
			$memberId = $_GET['code'];
			$notification = $this->model->delete($memberId);
		} else {
			$notification = "Failed to delete member";
		}

		$members  = $this->model->getNewMembers();
		$this->render_view_secured('members/newMembers', [
			'members' => $members,
			'notification' => $notification
		]);
	}

	public function search_new_member()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
			$searchTerm = $_POST['search'];
			$members = $this->model->search_new_member($searchTerm);
			$this->render_view_secured('members/newMembers', ['members' => $members]);
		} else {
			// Handle case where search form is not submitted
			$this->render_view_secured('members/newMembers');
		}
	}
	public function payment_new_member()
	{
		if (isset($_GET['code'])) {
			$Id = $_GET['code'];
			$notification = $this->model->payment_new_member($Id);
		} else {
			$notification = "Failed to process the payment request.";
		}

		$members  = $this->model->getNewMembers();
		$this->render_view_secured('members/newMembers', [
			'members' => $members,
			'notification' => $notification
		]);
	}


	/* ================================  Renew Members ======================  */
	public function renew_members()
	{
		$members  = $this->model->getOldMembers();
		$this->render_view_secured('members/renewMembers', [
			'members' => $members
		]);
	}

	public function search_renew_member()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
			$searchTerm = $_POST['search'];
			$members = $this->model->search_renew_member($searchTerm);
			$this->render_view_secured('members/renewMembers', ['members' => $members]);
		} else {
			// Handle case where search form is not submitted
			$this->render_view_secured('members/renewMembers');
		}
	}

	public function payment_renew_member()
	{
		if (isset($_GET['code'])) {
			$Id = $_GET['code'];
			$notification = $this->model->payment_renew_member($Id);
		} else {
			$notification = "Failed to process the payment request.";
		}

		$members  = $this->model->getOldMembers();
		$this->render_view_secured('members/renewMembers', [
			'members' => $members,
			'notification' => $notification
		]);
	}

	public function delete_renew_member()
	{
		if (isset($_GET['code'])) {
			$memberId = $_GET['code'];
			$notification = $this->model->delete($memberId);
		} else {
			$notification = "Failed to delete member";
		}

		$members  = $this->model->getOldMembers();
		$this->render_view_secured('members/renewMembers', [
			'members' => $members,
			'notification' => $notification
		]);
	}

	/* ================================  Score ======================  */
	public function score()
	{
		$members  = $this->model->score();
		$this->render_view_secured('members/score', ['members' => $members]);
	}

	public function all()
	{
		$members  = $this->model->getAll();
		include('app/views/members/test.php');
	}
}
