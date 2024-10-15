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

    function readName(){

        $query = "SELECT academic_year FROM " . $this->table_name ." WHERE id = ? limit 0,1";

        $stmt= $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $this->academic_year_name = $row['academic_year'];
    }

    function readAcademicYear($acad_id) {
        // Use single equal sign for SQL query comparison
        $query = "SELECT academic_year FROM " . $this->table_name . " WHERE id = : "{$acad_id}" LIMIT 1";
    
        // Prepare the query
        $stmt = $this->conn->prepare($query);
    
        // Bind the parameter using named placeholders
        $stmt->bindParam(':acad_id', $acad_id);
    
        // Execute the query
        $stmt->execute();
    
        // Fetch the result
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // If the row exists, assign the academic year to the class property
        if ($row) {
            $this->academic_year_name = $row['academic_year'];
        } else {
            // Handle case where no result is found
            $this->academic_year_name = null;  // or some other default value
        }
    }
    
}

?>