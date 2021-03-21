<?php
	class MyDbModel {
	    protected $db;
	    protected function __construct() {
	        include_once PROTECTED_DIR.'subpages/estate_agency/core/Database.php';
	        $this->db = Database::getInstance();
	    }
	}
?>