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
                $errorMessage = "Nem adott meg minden szükséges értéket!";
            } else if(!$isEveryThingInteger) {
                $errorMessage = "Ügyeljen rá, hogy ahol számadatot kell megadni, csak számjegyeket használjon (ingatlnaszerzés éve, értéke, eladási ár)!";
            } else if(!$isYearCorrect) {
                $errorMessage = "Az eladás évét hibásan adta meg!";
            } else if (!$isAcquisitionPriceCorrect) {
                $errorMessage = "Az ingatlanszerzés értékét hibásan adta meg!";
            } else if (!$isSellingPriceCorrect) {
                $errorMessage = "Az eladási árat hibásan adta meg!";
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

    public function getAcquisitionTax() {
        if(array_key_exists('acquisitionTax', $_POST)) {
            $boolValues = array('sellWithinOneYear', 'forRelatives', 'newEstate', 'firstProperty', 'selfGoverning', 'plot');
            $sellWithinOneYear; $forRelatives; $newEstate; $firtsProperty; $selfGoverning; $plot;
            foreach ($boolValues as $value) {
                if(isset($_POST[$value])) {
                    $$value = true;
                } else {
                    $$value = false;
                }
            }

            $required = array('acquisitionPrice');
            $isAcquisitionPriceSet = $this->checkIfAllRequiredDataIsGiven($required);
            $isAcquisitionPriceNumeric = $this->checkIfAllRequiredDataIsNumeric($required);
            $acquisitionPrice = $_POST['acquisitionPrice'];
            $isAcquisitionPriceCorrect = $this->checkPrice($acquisitionPrice);

            $errorMessage = "";

            if(!$isAcquisitionPriceSet) {
                $errorMessage = "Nem adta meg a vásárolt ingatlan árát!";
            } else if(!$isAcquisitionPriceNumeric) {
                $errorMessage = "A vásárolt ingatlan árának megadásakor csak számjegyeket használjon!";
            } else if(!$isAcquisitionPriceCorrect) {
                $errorMessage = "A vásárolt ingatlan árát hibásan adta meg!";
            }

            $required = array('sellingPrice');
            $sellingPrice = $_POST['sellingPrice'];
            if($sellWithinOneYear) {
                $isSellingPriceGiven = $this->checkIfAllRequiredDataIsGiven($required);
                $isSellingPriceNumeric = $this->checkIfAllRequiredDataIsNumeric($required);
                $isSellingPriceCorrect = $this->checkPrice($sellingPrice);
                if(!$isSellingPriceGiven) {
                    $errorMessage = "Ha bejelölte, hogy egy éven belül adott el ingatlant, adja meg annak az árát is!";
                } else if(!$isSellingPriceNumeric) {
                    $errorMessage = "Az az eladási ár megadásakor csak számjegyeket használjon!";
                } else if(!$isSellingPriceCorrect) {
                    $errorMessage = "Helytelenül adta meg az eladási árat!";
                }
            } else {
                $sellingPrice = 0;
            }

            unset($_POST['acquisitionTax']);
            if($errorMessage == "") {
                $acquisitionTax = $this->model->calculateAcquisitionTax($acquisitionPrice, $sellWithinOneYear, $sellingPrice, $forRelatives, $newEstate, $firstProperty, $selfGoverning, $plot);
                $this->addViewParams('acquisitionTax', $acquisitionTax);
                $this->renderPage('acquisitionTaxView');
            }
            else {
                $this->addViewParams('errorMessage', $errorMessage);
                $this->renderPage('formErrorMessageView');
            }
        }
    }
}