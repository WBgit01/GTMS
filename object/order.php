<?php

class Order{
    
    private $conn;
    private $table_name = "orders";


    public $id;
    public $reference_no;
    public $student_id;
    public $garment_type;
    public $amount;
    public $size_width;
    public $size_height;
    public $gender;
    public $notes;
    public $created;
    public $status;
    public $modified;

    public function __construct($db){
        $this->conn = $db;
    }

    
    function createOrder(){

        $this->created = date('Y-m-d H:i:s');

        // generate reference no.
		$digits = str_pad(mt_rand(0, 99), 4, '0', STR_PAD_LEFT);
		$randomNumber = str_pad(mt_rand(0, 999), 5, '0', STR_PAD_LEFT);
		$generated_reference_no = 'GTMS' . $digits . $randomNumber;


        $query = "INSERT INTO
                    " . $this->table_name . "
                    SET
                    reference_no = :reference_no,
                    student_id = :student_id,
                    amount = :amount,
                    garment_type = :garment_type,
                    size_width = :size_width,
                    size_height = :size_height,
                    gender = :gender,
                    status = :status,
                    created = :created";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':reference_no', $generated_reference_no);
        $stmt->bindParam(':student_id', $this->student_id);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':garment_type', $this->garment_type);
        $stmt->bindParam(':size_width', $this->size_width);
        $stmt->bindParam(':size_height', $this->size_height);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':created', $this->created);

        if ($stmt->execute()) {
            return true;
        }else{
            $this->showError($stmt);
			return false;
        }
    }

    public function showError($stmt) {
		echo "<pre>";
		print_r($stmt->errorInfo());
		echo "</pre>";
	}

    function countOrder(){

		$query = "SELECT COUNT(*) as order_count
					FROM 
					" . $this->table_name . "
					WHERE
					student_id = :student_id";
		
		$stmt = $this->conn->prepare($query);

        $stmt->bindParam(':student_id', $this->student_id);
        // $stmt->bindParam(':status', $this->status);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$order_count = $row['order_count'];
		
        if ($order_count >= 3) {
            return true;
        }else{

        }
	}

    function readAll(){
        $query = "SELECT * 
                    FROM   
                    " . $this->table_name ." 
                    ORDER BY 
                    id ASC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function readOne(){
        
    }


}







?> 