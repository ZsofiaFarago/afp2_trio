<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyDbModel.php';

	class registrationModel extends MyDbModel {
		public function __construct() {
	        parent::__construct();
	    }
		
		public function registerCity($name, $zipCode) {
			$query = "INSERT INTO city('name', 'zipcode') values(
				:name, :zipcode);";
			$params = [
				':name' => $name,
				':zipcode' => $zipcode
			];
			$result = $this->db->executeDML($query, $params);
			return $result;
		}

		public function registerAddress($streetName, $streetNumber, $cityId) {
			$query = "INSERT INTO address('street_name', 'street_number', 'city_id') values(
				:streetName, :streetNumber, :city_id);";
			$params = [
				':streetName' => $streetName,
				':streetNumber' => $streetNumber,
				':city_id' => $cityId
			];
			$result = $this->db->executeDML($query, $params);
			return $result;
		}

		public function registerClient($firstName, $lastName, $email, $password, $addressId) {
			$query = "INSERT INTO client('first_name', 'last_name', 'email', 'phone', 'password', 'address_id') values(
				:firstName, :lastName, :email, ':phone', :password, :address_id);";
			$params = [
				':firstName' => $firstName,
				':lastName' => $lastName,
				':email' => $email,
				':phone' => $phone,
				'password' => $password,
				'address_id' => $addressId
			];
			$result = $this->db->executeDML($query, $params);
			return $result;
		}

		public function getCityById($cityId) {
			$query = "SELECT * FROM city WHERE id = :id";
			$params = [
				':id' => $cityId
			];
			$result = $this->db->getRecord($query, $params);
			return $result;
		}

		public function getAddressById($addressId) {
			$query = "SELECT * FROM address WHERE id = :id";
			$params = [
				':id' => $addressId
			];
			$result = $this->db->getRecord($query, $params);
			return $result;
		}

		public function getClientByEmail($email) {
			$query = "SELECT * FROM client WHERE email = :email;";
			$params = [
				':email' => $email
			];
			$result = $this->db->getRecord($query, $params);
			return $result;
		}

		public function getCityByZipcode($zipcode) {
			$query = "SELECT * FROM city WHERE zipcode = :zipcode;";
			$params = [
				':zipcode' => $zipcode;
			];
			$result = $this->db->getRecord($query, $params);
			return $result;
		}

		public function getAddressByDeatails($streetName, $streetNumber, $cityId) {
			$query = "SELECT * FROM address WHERE streetName = :streetName AND streetNumber = :streetNumber AND city_id = :city_id;";
			$params = [
				':streetName' => $streetName,
				':streetNumber' => $streetNumber,
				':city_id' => $cityId
			];
			$result = $this->db->getList($query, $params);
			return $result;
		}
	}
?>