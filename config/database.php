<?php

require_once("connectionSettings.php");
class Database
{
 
    public $conn;

    // get the database connection
    public function getConnection()
    {
        $settings = new ConnectionSettings();
        $credentials = $settings->getCredentials();
        $this->conn = null;
        
        try{
            $this->conn = new PDO("mysql:host=" . $credentials['host'] . ";dbname=" . $credentials['dbName'], $credentials['username'], $credentials['password']);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>