<?php
class calculatorController extends MyController {
    public function __construct() {
        parent::__construct();
        $this->setModel('calculatorModel');
    }
    
    private function checkIfAllRequiredDataIsGiven($required) {
        foreach($required as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                return false;
            }
        }
        return true;
    }

    private function checkIfAllRequiredDataIsNumeric($required) {
        foreach($required as $field) {
            if (!is_numeric($_POST[$field])) {
                return false;
            }
        }
        return true;
    }

    private function checkYear($year) {
        if(0 <= $year && $year <= (int)date("Y")) {
            return true;
        }
        return false;
    }

    private function checkPrice($price) {
        if(0 <= $price) {
            return true;
        }
        return false;
    }

    public function getPersonalIncomeTax() {
        if(array_key_exists('incomeTax', $_POST)) {
            $required = array('acquisitionYear', 'acquisitionPrice', 'plannedSellingPrice');
            
            $isEverythingGiven = $this->checkIfAllRequiredDataIsGiven($required);
            $isEveryThingInteger = $this->checkIfAllRequiredDataIsNumeric($required);
            $isYearCorrect = $this->checkYear($_POST['acquisitionYear']);
            $isAcquisitionPriceCorrect = $this->checkPrice($_POST['acquisitionPrice']);
            $isSellingPriceCorrect = $this->checkPrice($_POST['plannedSellingPrice']);

            $errorMessage = "";
            if(!$isEverythingGiven) {
                $eroorMessage = "Nem adott meg minden szükséges értéket!";
            } else if(!$isEveryThingInteger) {
                $errorMessage = "Ügyeljen rá, hogy ahol számadatot kell megadni, csak számjegyeket használjon (ingatlnaszerzés éve, értéke, eladási ár)!";
            } else if(!$isYearCorrect) {
                $errorMessage = "Az eladás évét hibásan adta meg!";
            } else if (!$isAcquisitionPriceCorrect) {
                $errorMessage = "Az ingatlanszerzés értékét hibásan adta meg!";
            } else if (!$isSellingPriceCorrect) {
                $isSellingPriceCorrect = "Az eladási árat hibásan adta meg!";
            } else {
                $acquisitionYear = $_POST['acquisitionYear'];
                $acquisitionPrice = $_POST['acquisitionPrice'];
                $plannedSellingPrice = $_POST['plannedSellingPrice'];
                $personalIncomeTax = $this->model->calculatePersonalIncomeTax($acquisitionYear, $acquisitionPrice, $plannedSellingPrice);
                $this->addViewParams('personalIncomeTax', $personalIncomeTax);
                unset($_POST['incomeTax']);
                $this->renderPage('personalIncomeTaxView');
                return;
            }
            $this->addViewParams('errorMessage', $errorMessage);
            $this->renderPage('formErrorMessageView');
        }
    }
}