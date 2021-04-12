<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/validation.php';
	class ErrorMessageMaker {

		public function __construct() {
			$this->validation = new Validation();
			$this->errorMessages = [];
		}

		private $instance;
		private $validation;
		private $errorMessages;

		public function geterrorMessages() {
			return $this->errorMessages;
		}

		public function setFirstNameErrorMessage($firstName) {
			$regex = "/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}(?:[ -][A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}){0,2}$/";
            if (!$this->validation->checkStringByRegex($firstName, $regex)) {
                $errorMessage = "Hibásan adta meg a vezetéknevét! A neve minden tagjában az első karakter nagy, a többi kicsi legyen! Nem tartalmazhat számjegyeket, speciális karakterket vagy felesleges szóközöket. Ha több tagból áll a neve, a tagokat egy szóköz vagy kötőjel választhatja el.";
                array_push($this->errorMessages, $errorMessage);
            }
		}

		public function setLastNameErrorMessage($lastName) {
			 $regex = "/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}(?:[ -][A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}){0,2}$/";
            if (!$this->validation->checkStringByRegex($lastName, $regex)) {
                $errorMessage = "Hibásan adta meg a keresztnevét! A neve minden tagjában az első karakter nagy, a többi kicsi legyen! Nem tartalmazhat számjegyeket, speciális karakterket vagy felesleges szóközöket. Ha több tagból áll a neve, a tagokat egy szóköz vagy kötőjel választhatja el.";
                array_push($this->errorMessages, $errorMessage);
            }
		}

		public function setEmailErrorMessage($email) {
			if(!$this->validation->checkEmail($email)) {
				$errorMessage = "Hibás email cím! Minta: username@domain.com";
                array_push($this->errorMessages, $errorMessage);
            }
		}

		public function setPhoneErrorMessage($phone) {
			$regex = "/^(06)[ -]{0,1}(20|30|70|90)[ -]{0,1}[0-9]{3}[ -]{0,1}[0-9]{4}$/";
            if(!$this->validation->checkStringByRegex($phone, $regex)) {
                $errorMessage = "A telefonszámot helytelenül adta meg! Mobilszámot kell megadnia, 06-tal kell kezdődenie, a következő 2 számjegy a hívószám (20, 30, 70 vagy 90), utána a telefonszám 7 karaktere következik. Minták: 
                        <ul>
                            <li>06201234567</li>
                            <li>06 30 123 4567</li>
                            <li>06-70-123-4567</li>
                            <li>06 90 123-4567</li>
                        </ul>";
                array_push($this->errorMessages, $errorMessage);
            }
		}

		public function setZipcodeErrorMessage($zipcode) {
			$regex = "/^[1-9][0-9]{3}$/";
			if(!$this->validation->checkStringByRegex($zipcode, $regex)) {
				$errorMessage = "Helytelen irányítószámot adott meg. A magyar irányítószámok 4 számjegyből állnak és nem kezdődhetnek 0-val.";
				array_push($this->errorMessages, $errorMessage);
			}
		}

		public function setCityErrorMessage($city) {
			$regex = "/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}(?:[ -][A-ZÁÉÍÓÖŐÚÜŰa-záéííóöőúü][a-záéííóöőúü]{1,19}){0,2}$/";
            if(!$this->validation->checkStringByRegex($city, $regex)) {
                $errorMessage = "A település nevét helytelenül adta meg!";
                array_push($this->errorMessages, $errorMessage);
            }
		}

		public function setAddressErrorMessage($streetName) {
            $regex = "/^[A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}((?:[ -][A-ZÁÉÍÓÖŐÚÜŰ][a-záéííóöőúü]{1,19}){0,2}( )(utca|u.|út|tér|köz|fasor|körút|sétány))$/";
            if(!$this->validation->checkStringByRegex($streetName, $regex)) {
                $errorMessage = "Az utcanév helytelen. Az utcanév nagy kezdőbetűvel kezdődik, nem tartalmaz számokat, spec. karaktereket, tagjait szóközzel vagy kötőjellel lehet elválasztani, a végén pedig szóközzel elválasztva ki kell tenni a közterület típusát, ami lehet: út, utca, u., tér, körút, köz, fasor, sétány.";
                array_push($this->errorMessages, $errorMessage);
            }
		}

		public function setStreetNumberErrorMessage($streetNumber) {
			$regex = "/^[1-9][0-9]{0,2}([\/][A-Z]{1}){0,1}$/";
            if(!$this->validation->checkStringByRegex($streetNumber, $regex)) {
                $errorMessage = "A házszámot helytelenül adta meg, helyes formátumok: 8, 12, 11/A, 23/B stb.";
                array_push($this->errorMessages, $errorMessage);
            }
		}

		public function setPasswordErrorMessage($password, $passwordAgain) {
			$regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
            if(!$this->validation->checkStringByRegex($password, $regex)) {
                $errorMessage = "Nem megfelelő jelszót választott! A jelszónak legalább 8 karakteresnek kell lennie, tartalmaznia kell legalább egy kisbetűt, legalább egy nagybetűt és legalább egy számjegyet!";
                array_push($this->errorMessages, $errorMessage);
            } else if($password != $passwordAgain) {
                $errorMessage = "A két jelszó nem egyezik meg!";
                array_push($this->errorMessages, $errorMessage);
            }
		}
	}
?>