<?php
include_once PROTECTED_DIR.'subpages/estate_agency/core/validation.php';
class calculatorController extends MyController {
    public function __construct() {
        parent::__construct();
        $this->setModel('calculatorModel');
        $this->validation = new Validation();
    }

    private $validation;

    public function getPersonalIncomeTaxForm() {
        $this->renderPage('personalIncomeTaxView');
    }

    public function getAcquisitionTaxForm() {
        $this->renderPage('acquisitionTaxView');
    }

    public function getPersonalIncomeTax() {
        if(array_key_exists('incomeTax', $_POST)) {
            $required = array('acquisitionYear', 'acquisitionPrice', 'plannedSellingPrice');
            
            $isEverythingGiven = $this->validation->checkIfAllRequiredDataIsGiven($required);
            $isEveryThingInteger = $this->validation->checkIfAllRequiredDataIsNumeric($required);
            $isYearCorrect = $this->validation->checkYear($_POST['acquisitionYear']);
            $isAcquisitionPriceCorrect = $this->validation->checkPrice($_POST['acquisitionPrice']);
            $isSellingPriceCorrect = $this->validation->checkPrice($_POST['plannedSellingPrice']);
            
            unset($_POST['incomeTax']);
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

            $required = array('acquisitionPrice2');
            $isAcquisitionPriceSet = $this->validation->checkIfAllRequiredDataIsGiven($required);
            $isAcquisitionPriceNumeric = $this->validation->checkIfAllRequiredDataIsNumeric($required);
            $acquisitionPrice = $_POST['acquisitionPrice2'];
            $isAcquisitionPriceCorrect = $this->validation->checkPrice($acquisitionPrice);

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
                $isSellingPriceGiven = $this->validation->checkIfAllRequiredDataIsGiven($required);
                $isSellingPriceNumeric = $this->validation->checkIfAllRequiredDataIsNumeric($required);
                $isSellingPriceCorrect = $this->validation->checkPrice($sellingPrice);
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
?>