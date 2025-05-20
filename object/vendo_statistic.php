<?php

class VendoStatistic {

	private $conn;
	private $table_name = "vendo_users";

	public $id;
	public $vendo_id;
    public $device_mac_address;
    public $device_duration;
    public $staus;
    public $device_ip_address;

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
                WHERE vendo_id = :vendo_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':vendo_id', $vendo_id, PDO::PARAM_INT); // Bind safely
        $stmt->execute();

        return $stmt;
    }





}



?>
