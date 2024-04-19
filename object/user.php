<?php

class User {

	private $conn;
	private $table_name = "users";

	public $id;
	public $firstname;
	public $lastname;
	public $student_id;
	public $access_level;
	public $email_address;
	public $password;
	public $created;

	public function __construct($db) {
		$this->conn = $db;
	}

	function createUser(){

		
		$this->created = date('Y-m-d H:i:s');
		
		// Sanitize data
		$this->firstname = htmlspecialchars(strip_tags($this->firstname));
		$this->lastname = htmlspecialchars(strip_tags($this->lastname));
		$this->student_id = htmlspecialchars(strip_tags($this->student_id));
		$this->access_level = htmlspecialchars(strip_tags($this->access_level));
		$this->email_address = htmlspecialchars(strip_tags($this->email_address));
		$this->password = htmlspecialchars(strip_tags($this->password));

		// Password hash
		$password_hash = password_hash($this->password, PASSWORD_BCRYPT);

		$query  = "INSERT INTO 
					" . $this->table_name ."
					SET
					firstname = :firstname,
					lastname = :lastname,
					student_id = :student_id,
					access_level = :access_level,
					email_address = :email_address,
					password = :password,
					created = :created"; 

		$stmt = $this->conn->prepare($query);

		//sanitize
		$this->firstname=htmlspecialchars(strip_tags($this->firstname));
		$this->lastname=htmlspecialchars(strip_tags($this->lastname));
		$this->access_level=htmlspecialchars(strip_tags($this->access_level));
		$this->email_address=htmlspecialchars(strip_tags($this->email_address));
		$this->password=htmlspecialchars(strip_tags($this->password));

		//password hash
		$password_hash = password_hash($this->password, PASSWORD_BCRYPT);

		// generate Student ID
		$digits = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);
		$randomNumber = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
		$generated_student_id = $digits . 'b' . $randomNumber;


		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':student_id', $generated_student_id);
		$stmt->bindParam(':access_level', $this->access_level);
		$stmt->bindParam(':email_address', $this->email_address);
		$stmt->bindParam(':password', $password_hash);
		$stmt->bindParam(':created', $this->created);

		if ($stmt->execute()) {
			return true;
		} else {
			$this->showError($stmt);
			return false;
		}
	}

	// Method to display errors
	public function showError($stmt) {
		echo "<pre>";
		print_r($stmt->errorInfo());
		echo "</pre>";
	}

	// check if given email exist in the database
	function emailExists(){
		// query to check if email exists
		$query = "SELECT id, firstname, lastname, access_level, password
				FROM " . $this->table_name . "
				WHERE email_address = ? OR student_id = ?
				LIMIT 0,1";
		// prepare the query
		$stmt = $this->conn->prepare( $query );
		// sanitize
		$this->email_address=htmlspecialchars(strip_tags($this->email_address));
		// bind given email value
		$stmt->bindParam(1, $this->email_address);
		$stmt->bindParam(2, $this->student_id);
		$stmt->execute();
		// get number of rows
		$num = $stmt->rowCount();
		// if email exists, assign values to object properties for easy access and use for php sessions
		if($num>0){
			// get record details / values
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// assign values to object properties
			$this->id = $row['id'];
			$this->firstname = $row['firstname'];
			$this->lastname = $row['lastname'];
			$this->access_level = $row['access_level'];
			$this->password = $row['password'];
			// return true because email exists in the database
			return true;
		}
		// return false if email does not exist in the database
		return false;
	}

	function emailExisted(){
		// query to check if email exists
		$query = "SELECT id
				FROM " . $this->table_name . "
				WHERE email_address = ?
				LIMIT 0,1";

		// prepare the query
		$stmt = $this->conn->prepare( $query );
		// sanitize
		$this->email_address=htmlspecialchars(strip_tags($this->email_address));

		// bind given email value
		$stmt->bindParam(1, $this->email_address);
		$stmt->execute();
		// get number of rows
		$num = $stmt->rowCount();

		if($num>0){
			// contact or email is existed
			return true;
		}else{
			return false;
		}

	}

	function contactExisted(){
		// query to check if email exists
		$query = "SELECT id
				FROM " . $this->table_name . "
				WHERE contact_no = ?
				LIMIT 0,1";

		// prepare the query
		$stmt = $this->conn->prepare( $query );
		// sanitize
		$this->contact_no=htmlspecialchars(strip_tags($this->contact_no));

		// bind given email value
		$stmt->bindParam(1, $this->contact_no);
		$stmt->execute();
		// get number of rows
		$num = $stmt->rowCount();

		if($num>0){
			// contact or email is existed
			return true;
		}else{
			return false;
		}

	}






}
?>
