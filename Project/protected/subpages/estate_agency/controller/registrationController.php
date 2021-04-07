<?php
    include_once PROTECTED_DIR.'subpages/estate_agency/core/validation.php';
	class registrationController extends MyController {
	    public function __construct() {
	        parent::__construct();
	        $this->setModel('registrationModel');
            $this->validation = new Validation();
    	}

        private $validation;

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

    	private function getErrorMessage() {
            $errorMessage = "";

            $regex = "/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}(?:[ -][A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}){0,2}$/";
            if (!$this->validation->checkStringByRegex($this->lastName, $regex)) {
                $errorMessage = "Hibásan adta meg a vezetéknevét! A neve minden tagjában az első karakter nagy, a többi kicsi legyen! Nem tartalmazhat számjegyeket, speciális karakterket vagy felesleges szóközöket. Ha több tagból áll a neve, a tagokat egy szóköz vagy kötőjel választhatja el.";
            }

            if(!$this->validation->checkStringByRegex($this->firstName)) {
                $errorMessage = "Hibásan adta meg a keresztnevét! A neve minden tagjában az első karakter nagy, a többi kicsi legyen! Nem tartalmazhat számjegyeket, speciális karakterket vagy felesleges szóközöket. Ha több tagból áll a neve, a tagokat egy szóköz választhatja el.";
            }

            if(!$this->validation->checkEmail($this->firstName)) {
                $errorMessage = "Hibás email cím! Minta: username@domain.com";
            }

            $regex = "/^(06)[ -]{0,1}(20|30|70|90)[ -]{0,1}[0-9]{3}[ -]{0,1}[0-9]{4}$/";
            if(!$this->validation->checkStringByRegex($this->phone, $regex)) {
                $errorMessage = "A telefonszámot helytelenül adta meg! Mobilszámot kell megadnia, 06-tal kell kezdődenie, a következő 2 számjegy a hívószám (20, 30, 70 vagy 90), utána a telefonszám 7 karaktere következik. Minták: 
                        <ul>
                            <li>06201234567</li>
                            <li>06 30 123 4567</li>
                            <li>06-70-123-4567</li>
                            <li>06 90 123-4567</li>
                        </ul>";
            }

            $regex = "/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}(?:[ -][A-ZÁÉÍÓÖŐÚÜŰa-záéííóöőúü][a-záéííóöőúü]{1,19}){0,2}$/";
            if(!$this->validation->checkStringByRegex($this->city, $regex)) {
                $errorMessage = "A település nevét helytelenül adta meg!";
            }

            $regex = "/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}((?:[ -][A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}){0,2}( )(utca|u.|út|tér|köz|fasor|körút|sétány))$/";
            if(!$this->validation->checkStringByRegex($this->streetName, $regex)) {
                $errorMessage = "Az utcanév helytelen. Az utcanév nagy kezdőbetűvel kezdődik, nem tartalmaz számokat, spec. karaktereket, tagjait szóközzel vagy kötőjellel lehet elválasztani, a végén pedig szóközzel elválasztva ki kell tenni a közterület típusát, ami lehet: út, utca, u., tér, körút, köz, fasor, sétány.";
            }

            $regex = "/^[1-9][0-9]{0,2}([\/][A-Z]{1}){0,1}$/";
            if(!$this->validation->checkStringByRegex($this->streetNumber, $regex)) {
                $errorMessage = "A házszámot helytelenül adta meg, helyes formátumok: 8, 12, 11/A, 23/B stb.";
            }

            $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
            if(!$this->validation->checkStringByRegex($this->password, $regex)) {
                $errorMessage = "Nem megfelelő jelszót választott! A jelszónak legalább 8 karakteresnek kell lennie, tartalmaznia kell legalább egy kisbetűt, legalább egy nagybetűt és legalább egy számjegyet!";
            }

            if($this->password != $this->passwordAgain) {
                $errorMessage = "A két jelszó nem egyezik meg!";
            }

            if($this->model->getClientByEmail($this->email) != null) {
                $errorMessage = "A megadott email címmel már regisztráltak az oldalra!";
            }

            return $errorMessage;
        }

        public function registerNewClient() {
    		if(array_key_exists("save", $_POST)) {
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

    			$errorMessage = $this->getErrorMessage();
                if($errorMessage == "") {
    				$cityId = $this->saveCityData($this->city, $this->zipcode);
    				$addressId = $this->saveAddressData($this->streetName, $this->streetNumber, $cityId);
    				$this->model->registerClient($this->firstName, $this->lastName, $this->email, $this->phone, $this->password, $addressId);
    				$this->renderPage('successfulRegistrationView');
    			} else {
    				$this->addViewParams('errorMessage', $errorMessage);
                	$this->renderPage('formErrorMessageView');
    			}
                unset($_POST);
    		}
    	}
	}
?>