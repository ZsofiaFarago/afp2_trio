<?php
    include_once PROTECTED_DIR.'subpages/estate_agency/model/addressModel.php';
	class catalogueController extends MyController {
	    public function __construct() {
	        parent::__construct();
	        $this->setModel('catalogueModel');
            $this->loginController = new loginController();
            $this->errorMessageMaker = new ErrorMessageMaker();
            $this->addressModel = new AddressModel();
    	}

        private $loginController;
        private $reservationRecord;
        private $errorMessageMaker;
        private $addressModel;

        private $city;
        private $zipcode;
        private $streetName;
        private $streetNumber;
        private $area;
        private $roomNumber;
        private $description;
        private $sellingPrice;
        private $purchasePrice;
        private $imageName;

        public function loadPostData() {
            $this->city = $_POST['city'];
            $this->zipcode = $_POST['zipcode'];
            $this->streetName = $_POST['streetName'];
            $this->streetNumber = $_POST['streetNumber'];
            $this->area = $_POST['area'];
            $this->roomNumber = $_POST['roomNumber'];
            $this->description = $_POST['description'];
            $this->sellingPrice = $_POST['selling_price'];
            $this->purchasePrice = $_POST['purchase_price'];
        }

        private function getErrorMessages() {
            $this->errorMessageMaker->setZipcodeErrorMessage($this->zipcode);
            $this->errorMessageMaker->setCityErrorMessage($this->city);
            $this->errorMessageMaker->setAddressErrorMessage($this->streetName);
            $this->errorMessageMaker->setStreetNumberErrorMessage($this->streetNumber);
            $required = array('area', 'roomNumber');
            $this->errorMessageMaker->setNotNumericErrorMessage($required);
            $this->errorMessageMaker->setDescriptionErrorMessage($this->description);
            $this->errorMessageMaker->setSellingPriceErrorMessage($this->sellingPrice);
            $this->errorMessageMaker->setAcquisitionPriceErrorMessage($this->purchasePrice);

            $errorMessages = $this->errorMessageMaker->getErrorMessages();
            return $errorMessages;
        }

        public function isUserLoggedIn() {
            return $this->loginController->isUserLoggedIn();
        }

    	public function getAllEstates() {
    		$this->estates = $this->model->getAllEstates();
            return $this->estates;
    	}

        public function isAlreadyReserved($estateId) {
            $this->reservationRecord = $this->model->getReservationRecord($estateId);
            if($this->reservationRecord == null || count($this->reservationRecord) == 0) {
                return false;
            }
            else {
                return true;
            }
        }

        public function getReserverDetails() {
            return $this->model->getReserver($this->reservationRecord['client_id']);
        }

        public function reserve($estateId) {
            $this->model->reserveEstate($estateId);
            unset($_POST);
        }

        public function undoReservation($estateId) {
            $this->model->deleteReservation($estateId);
            unset($POST);
        }

        private function saveCityData($city, $zipcode) {
            $cityRecord = $this->addressModel->getCityByZipcode($zipcode);
            if($cityRecord == null) {
                $this->addressModel->registerCity($city, $zipcode);
                $cityRecord = $this->addressModel->getCityByZipcode($zipcode);
            }
            return $cityRecord['id'];
        }

        private function saveAddressData($streetName, $streetNumber, $cityId) {
            $addressRecord = $this->addressModel->getAddressByDetails($streetName, $streetNumber, $cityId);
            if($addressRecord == null) {
                $this->addressModel->registerAddress($streetName, $streetNumber, $cityId);
                $addressRecord = $this->addressModel->getAddressByDetails($streetName, $streetNumber, $cityId);
            }
            return $addressRecord['id'];
        }

        public function uploadImageToServer() {
            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['img']['tmp_name'];
                $fileName = $_FILES['img']['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $newFileName = $fileName.'.'.$fileExtension;
                $uploadFileDir = PUBLIC_DIR.'images/estate_agency/';
                $dest_path = $uploadFileDir . $newFileName;
                $this->imageName = $fileName;
                move_uploaded_file($fileTmpPath, $dest_path);
            }
        }

        public function uploadEstate() {
            $this->loadPostData();
            $errorMessages = $this->getErrorMessages();
            if(count($errorMessages) == 0) {
                $cityId = $this->saveCityData($this->city, $this->zipcode);
                $addressId = $this->saveAddressData($this->streetName, $this->streetNumber, $cityId);
                $this->uploadImageToServer();
                $this->model->registerEstate($addressId, $this->roomNumber, $this->area, $this->description, $this->sellingPrice, $this->purchasePrice, $this->imageName);
                $this->renderPage('catalogueView');
            } else {
                $this->addViewParams('errorMessages', $errorMessages);
                $this->renderPage('formErrorMessageView');
            }
        }
	}
?>