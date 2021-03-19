<?php
class MyDbModel {
    protected $db;
    protected function __construct() {
        require_once './protected/core/Database.php';
        $this->db = Database::GetInstance();
    }
}