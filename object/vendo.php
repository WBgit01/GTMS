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


}



?>
