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
    function readOne(){
 
        // query to read single record
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->description = $row['description'];
        $this->type = $row['type'];
    }
    // create product
    function create(){
 
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    description=:description, type=:type";
        
        // prepare query
        $stmt = $this->conn->prepare($query);
        
        // sanitize
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->type=htmlspecialchars(strip_tags($this->type));
        
        // bind values
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":name", $this->type);
        
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
     
    }
}
