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

$page_title = "Machine Settings";
$require_login = true;
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';

// Fetch orders
$stmt = $order->readUpdatedRequests();
$num = $stmt->rowCount();

$user_count = $user->countUser();
?>

<!-- contents will be here -->
<div class="table_wrapper">
    <h3 class="main_title">Vendo Settings</h3>
    <?php
        if ($num>0) {

            echo "<div class='table_container'>";
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Vendo ID</th>";
                        echo "<th>Vendo Name</th>";
                        echo "<th>Vendo Location</th>";
                    echo "</tr>";
                echo "</thead>";

                echo "<tbody>";

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);

                        
                    }
                echo "</tbody>";
                
            echo "</table>";
        }else{
            echo "<div class='message-box-failed'>";
                echo "No uniform request.";
            echo "</div>";
        }
    ?>
    </div>

<?php include_once 'layout_foot.php'; ?>


