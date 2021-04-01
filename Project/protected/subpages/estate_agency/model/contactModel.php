<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyDbModel.php';

	class contactModel extends MyDbModel {
		public function __construct() {
	        parent::__construct();
	    }

		public function getAllAgents() {
			$query = "SELECT * FROM estate_agent";
			$agentList = $this->db->getList($query, []);
			return $agentList;
		}

		public function getAgentById($id) {
			$query = "SELECT * FROM estate_agent WHERE id = :id;";
			$params = [
				':id' => $id
			];
			return $this->db->getRecord($query, $params);
		}

		public function sendMessage($name, $email, $subject, $addressedId, $message) {
			$agent = $this->getAgentById($addressedId);
			$send = "\r\nTisztelt ".$agent["first_name"]." ".$agent["last_name"]."!<br/>".$message."<br/>"."Tisztelettel: ".$name;
			// mail($agent['email'], $subject, $message);
			return $send;
		}
	}
?>