<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyDbModel.php';
	class catalogueModel extends MyDbModel {

		public function __construct() {
	        parent::__construct();
	    }
		
		public function getAllEstates() {
			$query = "SELECT estate.id as id, estate.selling_price, estate.purchase_price, estate.area, estate.room_number, estate.description, estate.image_name, client.id as client_id, client.first_name, client.last_name, client.phone, client.email, address.street_name, address.street_number, city.name, city.zipcode FROM estate INNER JOIN client ON estate.client_id = client.id INNER JOIN address ON estate.address_id = address.id INNER JOIN city ON city_id = city.id;";
			$estateList = $this->db->getList($query, []);
			return $estateList;
		}

		public function getReservationRecord($estateId) {
			$query = "SELECT client.first_name, client.last_name, client.id as client_id FROM client INNER JOIN reserve ON client.id = reserve.client_id WHERE reserve.estate_id = :estate_id;";
			$queryParams = [
				':estate_id' => $estateId
			];
			$reservationRecord = $this->db->getRecord($query, $queryParams);
			return $reservationRecord;
		}

		public function reserveEstate($estateId) {
			$query = "INSERT INTO reserve(estate_id, client_id) VALUES(:estate_id, :client_id);";
			$queryParams = [
				':estate_id' => $estateId,
				':client_id' => $_SESSION['uid']
			];
			$this->db->executeDML($query, $queryParams);
		}

		public function getReserver($clientId) {
			$query = "SELECT * FROM client WHERE id = :id;";
			$queryParams = [
				':id' => $clientId
			];
			return $this->db->getRecord($query, $queryParams);
		}

		public function deleteReservation($estateId) {
			$query="DELETE FROM reserve WHERE client_id = :client_id AND estate_id = :estate_id;";
			$queryParams = [
				':client_id' => $_SESSION['uid'],
				':estate_id' => $estateId
			];
			$this->db->executeDML($query, $queryParams);
		}

		public function registerEstate($addressId, $roomNumber, $area, $description, $sellingPrice, $purchasePrice, $imageName) {
			$query = "INSERT INTO estate(area, room_number, description, image_name, client_id, address_id, selling_price, purchase_price) values(
				:area, :room_number, :description, :image_name, :client_id, :address_id, :selling_price, :purchase_price);";
			$params = [
				':area' => $area,
				':room_number' => $roomNumber,
				':description' => $description,
				':image_name' => $imageName,
				':client_id' => $_SESSION['uid'],
				':address_id' => $addressId,
				'selling_price' => $sellingPrice,
				'purchase_price' => $purchasePrice
			];
			$result = $this->db->executeDML($query, $params);
			return $result;
		}
	}
?>