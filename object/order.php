<?php

class Order{
    
    private $conn;
    private $table_name = "orders";


    public $id;
    public $reference_no;
    public $student_id;
    public $garment_type;
    public $garment_id;
    public $amount;
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
                    gender = :gender,
                    status = :status,
                    created = :created";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':reference_no', $generated_reference_no);
        $stmt->bindParam(':student_id', $this->student_id);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':garment_type', $this->garment_type);
        $stmt->bindParam(':gender', $this->gender);
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
		
        if ($order_count >= 4) {
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
        
        $query = "SELECT reference_no, amount, garment_type, garment_id, gender, notes, status
                    FROM
                    " . $this->table_name . "
                    WHERE
                    id = ?
                    LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->reference_no = $row['reference_no'];
        $this->amount = $row['amount'];
        $this->notes = $row['notes'];
        $this->gender = $row['gender'];
        $this->garment_type = $row['garment_type'];
        $this->garment_id = $row['garment_id'];
        $this->status = $row['status'];
    }

    function updateRequest(){
        // Check if the garment_id contains multiple IDs separated by comma
        if (strpos($this->garment_id, ',') !== false) {
            // If it does, split the string into an array of IDs
            $ids = explode(',', $this->garment_id);
    
            // Loop through the IDs and sanitize them
            foreach ($ids as &$id) {
                $id = htmlspecialchars(strip_tags($id));
            }
    
            // Join the sanitized IDs back into a comma-separated string
            $this->garment_id = implode(',', $ids);
        } else {
            // If there's only one ID, sanitize it
            $this->garment_id = htmlspecialchars(strip_tags($this->garment_id));
        }
    
        // Prepare the SQL query
        $query = "UPDATE 
                    " . $this->table_name . "
                    SET
                        garment_id = :garment_id
                    WHERE
                        id = :id";
        
        // Prepare the statement
        $stmt = $this->conn->prepare($query);
    
        // Bind parameters
        $stmt->bindParam(":garment_id", $this->garment_id);
        $stmt->bindParam(":id", $this->id);
    
        // Execute the statement
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

}







?> 