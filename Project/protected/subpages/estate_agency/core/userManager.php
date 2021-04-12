<?php
	class UserManager {
		
		private function ___construct() {
		}

		private static $instance;
		private $db;

		public static UserManager getInstance() {
			if(self::$instance == null) {
				self::$instance = new UserManager();
			}
			return self::$instance;
		}

		public function isUserLoggedIn() {
			return $_SESSION != null && array_key_exists('uid', $_SESSION) &&is_numeric($_SESSION['uid']);
		}

		function userLogout() {
			session_destroy();
			header('Location:'.'http://localhost/project/index.php?S=estate_agency');
		}

		function userLogin($email, $password) {
			$queryString = "SELECT * FROM client WHERE email = :email AND password = :password;";
			$queryParams = [
				':email' => $email,
				':password' => $password
			];
			if($this->db == null) {
				$this->db = Database::getIsntance();
			}
			$userRecord = $this->db->getRecord($queryString, $queryParams);
			$_SESSION['uid'] = $userRecord['id']
			$_SESSION['email'] = $userRecord['email'];
			header('Location:'.'http://localhost/project/index.php?S=estate_agency');
		}
	}
?>