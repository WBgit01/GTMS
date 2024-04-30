<?php 

include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/transaction.php';
include_once '../object/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$transaction = new Transaction($db);


$page_title = "Dashboard";
$require_login = true;
$isAccessible = $_SESSION['isAccessible'];
include_once '../login_checker.php';



include_once 'sidebar.php'; 
include_once 'layout_head.php';

$stmt = $transaction->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

$user_count = $user->countUser();




?>
<!-- PANEL-CONTAINER -->
<div class="panel_container">
    <h3 class="main_title">Statistics</h3>
    <div class="panel_wrapper">
        <!-- PANEL-1 -->
        <div class="panel_content lightcolor-1">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Sales</span>
                    <span class="amount_value">500</span>
                </div>
                <i class="fa-solid fa-peso-sign icon darkcolor-1"></i>
            </div>
        </div>
        <!-- PANEL-2 -->
        <div class="panel_content lightcolor-2">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Users</span>
                    <span class="amount_value"><?php echo $user_count;?></span>
                </div>
                <i class="fa-solid fa-users icon darkcolor-2"></i>
            </div>
        </div>
        <!-- PANEL-3 -->
        <div class="panel_content lightcolor-3">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Orders</span>
                    <span class="amount_value">500</span>
                </div>
                <i class="fa-solid fa-cart-plus icon darkcolor-3"></i>
            </div>
        </div>
        <!-- PANEL-4 -->
        <div class="panel_content lightcolor-4">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Products</span>
                    <span class="amount_value">500</span>
                </div>
                <i class="fa-regular"></i>
                <i class="fa-solid  fa-rectangle-list icon darkcolor-4"></i>
            </div>
        </div>
    </div>
</div>
<!-- TABLE-DATA -->
<div class="table_wrapper">
    <h3 class="main_title">Data List</h3>
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
                        echo "<th>Order Created</th>";
                        echo "<th>Status</th>";
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
                                echo "<a href='#' class=''>View</a>";
                                echo "<a href='#'>Update</a>";
                                echo "<a href='#'>Delete</a>";
                                    
                        echo "</tr>";
                    }
                echo "</tbody>";
                echo "<tfoot>";
                    echo "<tr>";
                        echo "<td colspan='7' class='table_foot'>EXAMPLE TABLE FOOTER</td>";
                    echo "</tr>";
                echo "</tfoot>";
            echo "</table>";
        }
    ?>
    </div>
</div>
<?php include_once 'layout_foot.php'; ?>