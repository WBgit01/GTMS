<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/transaction.php';
include_once '../object/order.php';
include_once '../object/user.php';


$database = new Database();
$db = $database->getConnection();

$order = new Order($db);
$user = new User($db);
$transaction = new Transaction($db);

$page_title = "Orders Requests";
$require_login = true;
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';


// Fetch orders
$stmt = $transaction->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

$user_count = $user->countUser();
?>


<!-- contents will be here -->

<div class="table_wrapper">
    <h3 class="main_title">Order Data</h3>
    <?php
        if ($num>0) {

            echo "<div class='table_container'>";
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Order ID</th>";
                        echo "<th>Student ID</th>";
                        echo "<th>Payment Status</th>";
                        echo "<th>Reference No</th>";
                        echo "<th>Status</th>";
                        echo "<th>Order Created</th>";
                        echo "<th>Action</th>";
                    echo "</tr>";
                echo "</thead>";

                echo "<tbody>";

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);

                        echo "<tr>";
                            echo "<td>{$order_id}</td>";
                            echo "<td>{$student_id}</td>";
                            echo "<td>{$payment_status}</td>";
                            echo "<td>{$reference_no}</td>";
                            echo "<td>{$status}</td>";
                            echo "<td>{$created}</td>";
                            echo "<td>";
                                echo "<a href='../user/view_request.php?oid={$order_id}' class='action_btn1'>View</a>";
                                echo "<a href='../user/update_request.php?oid={$order_id}' class='action_btn2'>Update</a>";
                                echo "<a href='#' class='action_btn3' onclick='deleteOrder({$order_id})'>Delete</a>";
                            
                        echo "</tr>";
                    }
                echo "</tbody>";
                echo "<tfoot>";
                    echo "<tr>";
                        echo "<td colspan='8' class='table_foot'>USERS ORDER LIST</td>";
                    echo "</tr>";
                echo "</tfoot>";
            echo "</table>";
        }
    ?>
    </div>


<?php include_once 'layout_foot.php'; ?>


