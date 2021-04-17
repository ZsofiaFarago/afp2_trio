<?php
	class catalogueController extends MyController {
	    public function __construct() {
	        parent::__construct();
	        $this->setModel('catalogueModel');
            $this->loginController = new loginController();
    	}

        private $loginController;
        private $reservationRecord;

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
            header('Location:'.'http://localhost/project/index.php?S=estate_agency&A=catalogue');
        }

        public function undoReservation($estateId) {
            $this->model->deleteReservation($estateId);
            unset($POST);
            header('Location:'.'http://localhost/project/index.php?S=estate_agency&A=catalogue');
        }

        public function uploadEstate() {
            
        }
	}
?>