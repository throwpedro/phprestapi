<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "Products";
 
    // object properties
    public $id;
    public $description;
    public $type;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
    
        // select all query
        $query = "SELECT * FROM Products";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}