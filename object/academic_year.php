<?php

class Academic_year{
    
    private $conn;
    private $table_name = "academic_year";

    public $id;
    public $academic_year_name;
    public $created;
    public $modified;

    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

        $query = "SELECT 
                    id, academic_year
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    function readName() {
        // Prepare the query
        $query = "SELECT academic_year FROM " . $this->table_name . " WHERE id = ?";
    
        // Prepare the statement
        $stmt = $this->conn->prepare($query);
    
        // Bind the parameter
        $stmt->bindParam(1, $this->id);
    
        // Execute the statement
        $stmt->execute();
    
        // Fetch the row from the result set
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Assign the value to the property
        if($row) {
            $this->academic_year_name = $row['academic_year'];
        }
    }
    
    
}

?>