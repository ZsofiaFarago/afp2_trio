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

		private $city;
		private $zipcode;
		private $streetName;
		private $streetNumber;
		private $size;
		private $type;

		private $evaluation;
		private $energetic;
		private $propertyPaper;
		private $plan;

		public function showOrderForm() {
			return $this->loginController->isUserLoggedIn();
		}

		private function getPostData() {
			$this->city = $_POST['city'];
			$this->zipcode = $_POST['zipcode'];
			$this->streetName = $_POST['streetName'];
			$this->streetNumber = $_POST['streetNumber'];
			$this->size = $_POST['size'];
			$this->type = $_POST['type'];
			$boolValues = ['evaluation', 'energetic', 'propertyPaper', 'plan'];
			foreach ($boolValues as $value) {
				if(isset($_POST[$value])) {
					$this->$value = true;
				} else {
					$this->$value = false;
				}
			}
		}

		private function getErrorMessages() {
			$this->errorMessageMaker->setCityErrorMessage($this->city);
			$this->errorMessageMaker->setZipcodeErrorMessage($this->zipcode);
			$this->errorMessageMaker->setAddressErrorMessage($this->streetName);
			$this->errorMessageMaker->setStreetNumberErrorMessage($this->streetNumber);
			$required = ['size'];
			$this->errorMessageMaker->setNotNumericErrorMessage($required);
			$errorMessages = $this->errorMessageMaker->getErrorMessages();
			return $errorMessages;
		}

		public function orderService() {
			if(array_key_exists("order", $_POST)) {
				$this->getPostData();
				$errorMessages = $this->getErrorMessages();
				if(count($errorMessages) == 0) {
					$this->model->orderService($this->city, $this->zipcode, $this->streetName, $this->size, $this->type, $this->streetNumber, $this->evaluation, $this->energetic, $this->propertyPaper, $this->plan);
					$this->renderPage('succesfulOrderView');
				} else {
					$this->addViewParams('errorMessages', $errorMessages);
                	$this->renderPage('formErrorMessageView');
				}
			}
		}
	}
?>