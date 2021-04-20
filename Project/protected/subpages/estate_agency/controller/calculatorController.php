<?php
include_once PROTECTED_DIR.'subpages/estate_agency/core/errorMessageMaker.php';
class calculatorController extends MyController {
    public function __construct() {
        parent::__construct();
        $this->setModel('calculatorModel');
        $this->errorMessageMaker = new ErrorMessageMaker();
    }

    private $acquisitionYear;
    private $acquisitionPrice_incomeTax;
    private $plannedSellingPrice;
    private $personalIncomeTax;

    private $sellWithinOneYear;
    private $forRelatives;
    private $newEstate;
    private $firstProperty;
    private $selfGoverning;
    private $plot;
    private $acquisitionPrice_acqTax;
    private $sellingPrice;

    private $errorMessageMaker;

    private function getIncomeTaxPostData() {
        $this->acquisitionYear = $_POST['acquisitionYear'];
        $this->acquisitionPrice_incomeTax = $_POST['acquisitionPrice_incomeTax'];
        $this->plannedSellingPrice = $_POST['plannedSellingPrice'];
    }

    private function getAcquisitionTaxPostData() {
        $boolValues = array('sellWithinOneYear', 'forRelatives', 'newEstate', 'firstProperty', 'selfGoverning', 'plot');
        foreach ($boolValues as $value) {
            if(isset($_POST[$value])) {
                $this->$value = true;
            } else {
                $this->$value = false;
            }
        }
        $this->acquisitionPrice_acqTax = $_POST['acquisitionPrice_acqTax'];
        $this->sellingPrice = $_POST['sellingPrice'];
    }

    private function getIncomeTaxErrorMessages() {
        $required = array('acquisitionYear', 'acquisitionPrice_incomeTax', 'plannedSellingPrice');
        $this->errorMessageMaker->setNotNumericErrorMessage($required);
        $this->errorMessageMaker->setYearErrorMessage($this->acquisitionYear);
        $this->errorMessageMaker->setAcquisitionPriceErrorMessage($this->acquisitionPrice_incomeTax);
        $this->errorMessageMaker->setSellingPriceErrorMessage($this->plannedSellingPrice);
        $errorMessages = $this->errorMessageMaker->getErrorMessages();
        return $errorMessages;
    }

    private function getAcquisitionTaxErrorMessages() {
            $required = array('acquisitionPrice_acqTax');
            $this->errorMessageMaker->setRequiredErrorMessage($required);
            $this->errorMessageMaker->setNotNumericErrorMessage($required);
            $errorMessages = $this->errorMessageMaker->getErrorMessages();
            if($this->sellWithinOneYear) {
                $required = array('sellingPrice');
                $this->errorMessageMaker->setRequiredErrorMessage($required);
                $this->errorMessageMaker->setNotNumericErrorMessage($required);
                $this->errorMessageMaker->setSellingPriceErrorMessage($this->sellingPrice);
            }
            $this->errorMessageMaker->setAcquisitionPriceErrorMessage($this->acquisitionPrice_incomeTax);
            return $errorMessages;
    }

    public function getPersonalIncomeTax() {
        if(isset($_POST) && array_key_exists('incomeTax', $_POST)) {
            $this->getIncomeTaxPostData();
            $errorMessages = $this->getIncomeTaxErrorMessages();
            if(count($errorMessages) == 0) {
                $personalIncomeTax = $this->model->calculatePersonalIncomeTax($this->acquisitionYear, $this->acquisitionPrice_incomeTax, $this->plannedSellingPrice);
                $this->addViewParams('personalIncomeTax', $personalIncomeTax);
                unset($_POST);
                $this->renderPage('personalIncomeTaxView');
            } else {
                $this->addViewParams('errorMessages', $errorMessages);
                unset($_POST);
                $this->renderPage('formErrorMessageView');
            }
        }
    }

    public function getAcquisitionTax() {
        if(isset($_POST) && array_key_exists('acquisitionTax', $_POST)) {
            $this->getAcquisitionTaxPostData();
            $errorMessages = $this->getAcquisitionTaxErrorMessages();
            if(!$this->sellWithinOneYear) {
                $this->sellingPrice = 0;
            }
            if(count($errorMessages) == 0) {
                $acquisitionTax = $this->model->calculateAcquisitionTax($this->acquisitionPrice_acqTax, $this->sellWithinOneYear, $this->sellingPrice, $this->forRelatives, $this->newEstate, $this->firstProperty, $this->selfGoverning, $this->plot);
                $this->addViewParams('acquisitionTax', $acquisitionTax);
                unset($_POST);
                $this->renderPage('acquisitionTaxView');
            }
            else {
                $this->addViewParams('errorMessages', $errorMessages);
                unset($_POST);
                $this->renderPage('formErrorMessageView');
            }
        }
    }
}
?>