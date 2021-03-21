<?php
class Database {
    const DB_TYPE = 'mysql';
    const DB_HOST = 'localhost';
    const DB_NAME = 'estatedb';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_CHARSET = 'utf8';
 
    private static $instance = null;
    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    
    private function __construct() {
    }
    
    public function getConnection() {
        $connection = new PDO(self::DB_TYPE.':host='.self::DB_HOST.';dbname='.self::DB_NAME.';', self::DB_USER, self::DB_PASS);
        $connection->exec("SET NAMES 'utf8'");
        return $connection;
    }
    
    public function getList($query, $params = []) {
        $connection = $this->getConnection();
        $connection->exec("SET NAMES 'utf8'");
        $statement = $connection->prepare($query);
        $success = $statement->execute($params);
        $result = [];
        if($success){
            $result = $statement->fetchAll();
        }
        $statement->closeCursor();
        $connection = null;
        return $result;
    }
    
    public function getRecord($query, $params = []) {
        $connection = getConnection();
        $statement = $connection->prepare($query);
        $success = $statement->execute($params);
        $result;
        if($success){
            $result = $statement->fetch()[0];
        }
        $statement->closeCursor();
        $connection = null;
        return $result;
    }
    
    public function executeDML($query, $params = []) {
        $connection = getConnection();
        $statement = $connection->prepare($query);
        $success = $statement->execute($params);
        $statement->closeCursor();
        $connection = null;
        return $success;
    }
}