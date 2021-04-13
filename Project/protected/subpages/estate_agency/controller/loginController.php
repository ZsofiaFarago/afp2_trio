<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/errorMessageMaker.php';
	class loginController extends MyController {
		public function __construct() {
	        parent::__construct();
	        $this->setModel('userManager');
	        $this->errorMessageMaker = new ErrorMessageMaker();
	    }

	    private $errorMessageMaker;
	    private $email;
	    private $password;

	    public function getPostData() {
	    	$this->email = $_POST['email'];
	    	$this->password = $_POST['password'];
	    }

		public function logout() {
			if(array_key_exists('logout', $_POST)) {
				$this->model->userLogout();
			}
		}

		public function login() {
			if(array_key_exists('login', $_POST)) {
				$this->getPostData();
				if($this->model->checkEmailAndPassword($this->email, $this->password)) {
					$this->model->userLogin($this->email, $this->password);
				} else {
					$errorMessages = ["Hibás email vagy jelszó."];
					$this->addViewParams('errorMessages', $errorMessages);
                	$this->renderPage('formErrorMessageView');
				}
			}
		}

		public function isUserLoggedIn() {
			return $this->model->isUserLoggedIn();
		}
	}
?>