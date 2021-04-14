<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyDbModel.php';
	class serviceModel extends MyDbModel {
		public function __construct() {
	        parent::__construct();
	    }

	   	private function getCityRecord($name, $zipcode) {
	    	$query = "SELECT * FROM city WHERE name = :name AND zipcode = :zipcode;";
	    	$queryParams = [
	    		':name' => $name,
	    		':zipcode' => $zipcode
	    	];
	    	return $this->db->getRecord($query, $queryParams);
	    }

	    private function insertNewCity($name, $zipcode) {
	    	$query = "INSERT INTO city(name, zipcode) values(:name, :zipcode);";
	    	$queryParams = [
	    		':name' => $name,
	    		':zipcode' => $zipcode
	    	];
	    	return $this->db->executeDML($query, $queryParams);
	    }

	   	private function insertNewAddress($cityId, $streetName, $streetNumber) {
	    	$query = "INSERT INTO address(city_id, street_name, street_number) values(:city_id, :street_name, :street_number);";
	    	$queryParams = [
	    		':city_id' => $cityId,
	    		':street_name' => $streetName,
	    		':street_number' => $streetNumber
	    	];
	    	return $this->db->executeDML($query, $queryParams);
	    }

	    private function getAddressRecord($cityId, $streetName, $streetNumber) {
	    	$query = "SELECT * FROM address WHERE city_id = :cityId AND street_name = :streetName AND street_number = :streetNumber;";
	    	$queryParams = [
	    		':cityId' => $cityId,
	    		':streetName' => $streetName,
	    		':streetNumber' => $streetNumber
	    	];
	    	return $this->db->getRecord($query, $queryParams);
	    }

	    private function insertServiceOrder($addressId, $size, $type, $evaluation, $energetic, $propertyPaper, $plan) {
	    	$query = "INSERT INTO service(address_id, size, type, evaluation, energetic, property_paper, plan) values(:addressId, :size, :type, :evaluation, :energetic, :propertyPaper, :plan);";
	    	$queryParams = [
	    		':addressId' => $addressId,
	    		':size' => $size,
	    		':type' => $type,
	    		':evaluation' => $evaluation,
	    		':energetic' => $energetic,
	    		':propertyPaper' => $propertyPaper,
	    		':plan' => $plan
	    	];
	    	return $this->db->executeDML($query, $queryParams);
	    }

	    public function orderService($city, $zipcode, $streetName, $size, $type, $streetNumber, $evaluation, $energetic, $propertyPaper, $plan) {
	    	$evaluation = $evaluation == true ? 1 : 0;
	    	$energetic = $energetic == true ? 1 : 0;
	    	$propertyPaper = $propertyPaper == true ? 1 : 0;
	    	$plan = $plan == true ? 1 : 0;
	    	$size = intval($size);

	    	$cityRecord = $this->getCityRecord($city, $zipcode);
	    	if($cityRecord == null || count($cityRecord) == 0) {
	    		$this->insertNewCity($city, $zipcode);
	    		$cityRecord = $this->getCityRecord($city, $zipcode);
	    	}
	    	$cityId = $cityRecord['id'];
	    	$addressRecord = $this->getAddressRecord($cityId, $streetName, $streetNumber);
	    	if($addressRecord == null || count($addressRecord) == 0) {
	    		$this->insertNewAddress($cityId, $streetName, $streetNumber);
	    		$addressRecord = $this->getAddressRecord($cityId, $streetName, $streetNumber);
	    	}
	    	$addressId = $addressRecord['id'];
	    	$this->insertServiceOrder($addressId, $size, $type, $evaluation, $energetic, $propertyPaper, $plan);
	    }
	}
?>