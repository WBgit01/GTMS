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

<<<<<<< HEAD
	function createUser(){

		
=======
	// Method to check if email exists in the database
	public function emailExists() {
		$query = "SELECT id FROM " . $this->table_name . " WHERE email_address = :email LIMIT 1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':email', $this->email_address);
		$stmt->execute();
		$rowCount = $stmt->rowCount();
		return $rowCount > 0;
	}

	// Method to fetch user data by email address
	public function getUserByEmail($email) {
		$query = "SELECT id, firstname, lastname, access_level, password FROM " . $this->table_name . " WHERE email_address = :email LIMIT 1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	// Method to generate IDs (Updated to be a static method)
	public static function idGenerator() {
		return '22' . chr(rand(97, 122)) . substr(md5(uniqid(mt_rand(), true)), 0, 5);
	}

	// Method to create a new user
	public function createUser() {
>>>>>>> 78f3baa850cdc42ab9e2a7643b956c52210481a2
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
<<<<<<< HEAD

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


=======
>>>>>>> 78f3baa850cdc42ab9e2a7643b956c52210481a2
		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':student_id', $generated_student_id);
		$stmt->bindParam(':access_level', $this->access_level);
		$stmt->bindParam(':email_address', $this->email_address);
		$stmt->bindParam(':password', $password_hash);
		$stmt->bindParam(':created', $this->created);

		if ($stmt->execute()) {
			// Check if the access level is "Student"
			if ($this->access_level === "Student") {
				// Redirect to index-user.php
				echo "Redirecting to index-user.php";
				header("Location: index-user.php");
				exit();
			}
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
<<<<<<< HEAD

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






=======
>>>>>>> 78f3baa850cdc42ab9e2a7643b956c52210481a2
}
?>
