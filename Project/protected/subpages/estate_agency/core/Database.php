<?php
class Database {
    const DB_TYPE = 'mysql';
    const DB_HOST = 'localhost';
    const DB_NAME = 'estatedb';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_CHARSET = 'utf8';
 
    private static $instance;
    public static function GetInstance() {
        if(self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instace;
    }
    
    private function __construct() {
    }
    
    public function getConnection() {
        $connection = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME.';', DB_USER, DB_PASS);
        $connection->exec("SET NAMES 'utf8'");
        return $connection;
    }
}