<?php

class Vendo {

	private $conn;
	private $table_name = "vendo_machines";

	public $id;
	public $vendo_name;
    public $vendo_location;
    public $vendo_revenue;
    public $staus;
    public $no_con_device;

    	public function __construct($db) {
		$this->conn = $db;
	}

    function readVendo(){

		$query = "SELECT * FROM 
					" . $this->table_name . "";
		
		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt;
	}

    function readAll($from_records_num, $records_per_page){
        $query = "SELECT * 
                    FROM   
                    " . $this->table_name ." 
                    ORDER BY 
                    id ASC 
                    LIMIT {$from_records_num}, {$records_per_page}";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function readVendoUsers($vendo_id) {
        $query = "SELECT * 
                FROM " . $this->table_name . " 
                WHERE vendo_id = :vendo";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $vendo_id);
        $stmt->execute();

        return $stmt;
    }

    public function getTotalRevenue() {
        $query = "SELECT SUM(vendo_revenue) AS total_revenue FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_revenue'] ?? 0;
    }





}



?>
