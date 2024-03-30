<?php

class User{

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

	public function __construct($db){
		$this->conn = $db;
	}

	function idGenerator() {
	    while (true) {
	        yield '22' . chr(rand(97, 122)) . substr(md5(uniqid(mt_rand(), true)), 0, 5);
	    }
	    $generator = idGenerator();

		// Generate IDs
		for ($i = 0; $i < 10; $i++) {
		    echo $generator->current() . "\n";
		    $generator->next();
		}
	}




	function createUser(){
		
		$this->created = date('Y-m-d H:i:s');

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
		$this->student_id=htmlspecialchars(strip_tags($this->student_id));
		$this->access_level=htmlspecialchars(strip_tags($this->access_level));
		$this->email_address=htmlspecialchars(strip_tags($this->email_address));
		$this->password=htmlspecialchars(strip_tags($this->password));

		//password hash
		$password_hash = password_hash($this->password, PASSWORD_BCRYPT);

		$stmt->bindParam(':firstname', $this->firstname);
		$stmt->bindParam(':lastname', $this->lastname);
		$stmt->bindParam(':student_id', $this->student_id);
		$stmt->bindParam(':access_level', $this->access_level);
		$stmt->bindParam(':email_address', $this->email_address);
		$stmt->bindParam(':password', $password_hash);
		$stmt->bindParam(':created', $this->created);

		if($stmt->execute()){
			return true;
		}else{
			$this->showError($stmt);
			return false;
		}
	}
	public function showError(){
		echo "<pre>";
			print_r($stmt->errorInfo());
		echo "</pre>";
	}



	//////
	function emailExists(){

		$query = "SELECT id, firstname, lastname, access_level, password
					FROM " . $this->table_name . "
					WHERE email_address = ? OR student_id = ?
					LIMIT 0, 1";
		
		$stmt = $this->conn->prepare($query);
		
		$this->email_address = htmlspecialchars(strip_tags($this->email_address));
		$this->student_id = htmlspecialchars(strip_tags($this->student_id));

		$stmt->bindParam(1, $this->email_address);
		$stmt->bindParam(2, $this->student_id);

		$stmt->execute();
		
		$num = $stmt->rowCount();

		if ($num>0) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->id = $row['id'];
			$this->firstname = $row['firstname'];
			$this->lastname = $row['lastname'];
			$this->access_level = $row['access_level'];
			$this->password = $row['password'];
			
			return true;
		}
		return false;
	}






}



?>
