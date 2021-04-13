<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyDbModel.php';
	class UserManager extends MyDbModel {

		public function __construct() {
	        parent::__construct();
	    }

		public function isUserLoggedIn() {
			return isset($_SESSION) && $_SESSION != null && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
		}

		public function userLogout() {
			session_destroy();
			header('Location:'.'http://localhost/project/index.php?S=estate_agency');
		}

		public function userLogin($email, $password) {
			$queryString = "SELECT * FROM client WHERE email = :email AND password = :password;";
			$queryParams = [
				':email' => $email,
				':password' => $password
			];
			if($this->db == null) {
				$this->db = Database::getIsntance();
			}
			$userRecord = $this->db->getRecord($queryString, $queryParams);
			$_SESSION['uid'] = $userRecord['id'];
			$_SESSION['email'] = $userRecord['email'];
			header('Location:'.'http://localhost/project/index.php?S=estate_agency');
		}

		public function checkEmailAndPassword($email, $password) {
			$queryString = "SELECT * FROM client WHERE email = :email;";
			$queryParams = [
				':email' => $email
			];
			$userRecord = $this->db->getRecord($queryString, $queryParams);
			if($userRecord == null || count($userRecord) == 0) {
				return false;
			}
			if($userRecord['password'] != $password) {
				return false;
			}
			return true;
		}
	}
?>