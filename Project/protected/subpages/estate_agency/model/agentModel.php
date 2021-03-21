<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyDbModel.php';
	class agentModel extends MyDbModel {

		public function __construct() {
	        parent::__construct();
	    }
		
		public function getAllAgents() {
			$query = "SELECT * FROM estate_agent INNER JOIN address ON address_id = address.id INNER JOIN city ON city_id = city.id";
			$agentList = $this->db->getList($query, []);
			return $agentList;
		}
	}
?>