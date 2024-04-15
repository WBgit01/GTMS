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
		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':student_id', $this->student_id);
		$stmt->bindParam(':access_level', $this->access_level);
		$stmt->bindParam(':email_address', $this->email_address);
		$stmt->bindParam(':password', $password_hash);
		$stmt->bindParam(':created', $this->created);

		if ($stmt->execute()) {
			// Check if the access level is "Student"
			if ($this->access_level === "Student") {
				// Redirect to index.php
				echo "Redirecting to index.php";
				header("Location: index.php");
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
}
?>
