<?php 
class Transaction{

    private $conn;
    private $table_name = "transactions";

    public $id;
    public $student_id;
    public $firstname;
    public $lastname;
    public $order_id;
    public $payment_status;
    public $status;
    public $created;
    public $modifed;

    public function __construct($db){
        $this->conn = $db;
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

}

?>
