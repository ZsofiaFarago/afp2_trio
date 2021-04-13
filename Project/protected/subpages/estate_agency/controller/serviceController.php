<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/errorMessageMaker.php';
	class serviceController extends MyController {
		public function __construct() {
	        parent::__construct();
	        $this->setModel('serviceModel');
            $this->errorMessageMaker = new ErrorMessageMaker();
            $this->loginController = new loginController();
    	}

	    private $errorMessageMaker;
		private $loginController;

		public function showOrderForm() {
			return $this->loginController->isUserLoggedIn();
		}
	}
?>