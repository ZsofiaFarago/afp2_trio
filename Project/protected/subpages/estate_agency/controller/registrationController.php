<?php
    include_once PROTECTED_DIR.'subpages/estate_agency/core/errorMessageMaker.php';
	class registrationController extends MyController {
	    public function __construct() {
	        parent::__construct();
	        $this->setModel('registrationModel');
            $this->errorMessageMaker = new ErrorMessageMaker();
    	}

        private $errorMessageMaker;

        private $firstName;
        private $lastName;
        private $email;
        private $phone;
        private $city;
        private $zipcode;
        private $streetName;
        private $streetNumber;
        private $password;
        private $passwordAgain;

	    private function saveCityData($city, $zipcode) {
	    	$cityRecord = $this->model->getCityByZipcode($zipcode);
	    	if($cityRecord == null) {
	    		$this->model->registerCity($city, $zipcode);
	    		$cityRecord = $this->model->getCityByZipcode($zipcode);
	    	}
	    	return $cityRecord['id'];
	    }

	    private function saveAddressData($streetName, $streetNumber, $cityId) {
	    	$addressRecord = $this->model->getAddressByDetails($streetName, $streetNumber, $cityId);
	    	if($addressRecord == null) {
	    		$this->model->registerAddress($streetName, $streetNumber, $cityId);
	    		$addressRecord = $this->model->getAddressByDetails($streetName, $streetNumber, $cityId);
	    	}
	    	return $addressRecord['id'];
	    }

    	private function getErrorMessages() {
            $this->errorMessageMaker->setFirstNameErrorMessage($this->firstName);
            $this->errorMessageMaker->setLastNameErrorMessage($this->lastName);
            $this->errorMessageMaker->setEmailErrorMessage($this->email);
            $this->errorMessageMaker->setPhoneErrorMessage($this->phone);
            $this->errorMessageMaker->setZipcodeErrorMessage($this->zipcode);
            $this->errorMessageMaker->setCityErrorMessage($this->city);
            $this->errorMessageMaker->setAddressErrorMessage($this->streetName);
            $this->errorMessageMaker->setStreetNumberErrorMessage($this->streetNumber);
            $this->errorMessageMaker->setPasswordErrorMessage($this->password, $this->passwordAgain);

            $errorMessages = $this->errorMessageMaker->getErrorMessages();

            if($this->model->getClientByEmail($this->email) != null) {
                $errorMessage = "A megadott email címmel már regisztráltak az oldalra!";
                array_push($errorMessages, $errorMessage);
            }
            return $errorMessages;
        }

        private function getPostData() {
            $this->firstName = $_POST['firstName'];
            $this->lastName = $_POST['lastName'];
            $this->email = $_POST['email'];
            $this->phone = $_POST['phone'];
            $this->city = $_POST['city'];
            $this->zipcode = $_POST['zipcode'];
            $this->streetName = $_POST['streetName'];
            $this->streetNumber = $_POST['streetNumber'];
            $this->password = $_POST['password'];
            $this->passwordAgain = $_POST['passwordAgain'];
        }

        public function registerNewClient() {
    		if(array_key_exists("save", $_POST)) {
                $this->getPostData();
    			$errorMessages = $this->getErrorMessages();
                if(count($errorMessages) == 0) {
    				$cityId = $this->saveCityData($this->city, $this->zipcode);
    				$addressId = $this->saveAddressData($this->streetName, $this->streetNumber, $cityId);
    				$this->model->registerClient($this->firstName, $this->lastName, $this->email, $this->phone, $this->password, $addressId);
    				$this->renderPage('successfulRegistrationView');
    			} else {
    				$this->addViewParams('errorMessages', $errorMessages);
                	$this->renderPage('formErrorMessageView');
    			}
                unset($_POST);
    		}
    	}
	}
?>