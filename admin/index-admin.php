<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/transaction.php';
include_once '../object/user.php';
include_once '../object/order.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$order = new Order($db);

$page_title = "Dashboard";
$require_login = true;
$isAccessible = $_SESSION['isAccessible'];
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';

$stmt = $order->readUpadatedRequest();
$num = $stmt->rowCount();

$stmt = $order->readApprovedRequests();
$num = $stmt->rowCount();

$stmt = $order->readDeclinedRequests();
$num = $stmt->rowCount();

$user_count = $user->countUser();
$order_count = $order->countOrderRequest();
$pendingCount = $order->countPendingOrders();
$declinedCount = $order->countDeclinedOrders();
?>

<div class="panel_container">
    <h3 class="main_title">Statistics</h3>
    <div class="panel_wrapper">

        <div class="panel_content lightcolor-2">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Users</span>
                    <span class="amount_value"><?php echo $user_count;?></span>
                </div>
                <i class="fa-solid fa-users icon darkcolor-2"></i>
            </div>
        </div>

        <div class="panel_content lightcolor-3">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Approved Requests</span>
                    <span class="amount_value"><?php echo $order_count; ?></span>
                </div>
                <i class="fa-solid fa-shop icon darkcolor-3"></i>
            </div>
        </div>

        <div class="panel_content lightcolor-4">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Pending Requests</span>
                    <span class="amount_value"><?php echo $pendingCount; ?></span>
                </div>
                <i class="fa-regular"></i>
                <i class="fa-solid fa-cart-plus icon darkcolor-4"></i>
            </div>
        </div>

        <div class="panel_content lightcolor-1">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Declined Requests</span>
                    <span class="amount_value"><?php echo $declinedCount; ?></span>
                </div>
                <i class="fa-solid fa-shop-slash icon darkcolor-1"></i>
            </div>
        </div>

        <h3 class="main_title">Search Order</h3>
        <div class="search_bar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Enter Reference no.">
        </div>
    </div>
</div>

    <?php
        // SEARCHED ORDER SUPPOSED TO BE APPEAR HERE THIS IS TEMPORARY
        include_once 'pending_request.php';
    ?>

    <!-- // if ($num > 0) {
    //     echo "<div class='table_container'>";
    //     echo "<table>";
    //     echo "<thead>";
    //     echo "<tr>";
    //     echo "<th>Student ID</th>";
    //     echo "<th>Reference No</th>";
    //     echo "<th>Status</th>";
    //     echo "<th>Order Created</th>";
    //     echo "<th>Action</th>";
    //     echo "</tr>";
    //     echo "</thead>";

    //     echo "<tbody>";

    //     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //         extract($row);

    //         echo "<tr>";
    //         echo "<td>{$student_id}</td>";
    //         echo "<td>{$reference_no}</td>";
    //         echo "<td>{$status}</td>";
    //         echo "<td>{$created}</td>";
    //         echo "<td>";
    //         if ($status == "Approved") {
    //             echo "<a href='../admin/view_request.php?oid={$id}' class='action_btn1'>View</a>";
    //             echo "<a decline-id='{$id}' class='action_btn3 decline-object'>Decline</a>";
    //         } else {
    //             echo "<a href='../admin/view_request.php?oid={$id}' class='action_btn1'>View</a>";
    //             echo "<a update-id='{$id}' class='action_btn2 update-object'>Approved</a>";
    //             echo "<a href='#' class='action_btn3' onclick='deleteOrder({$id})'>Declined</a>";
    //         }
    //         echo "</td>";
    //         echo "</tr>";
    //     }
    //     echo "</tbody>";
    //     echo "<tfoot>";
    //     echo "<tr>";
    //     echo "<td colspan='8' class='table_foot'>USERS ORDER LIST</td>";
    //     echo "</tr>";
    //     echo "</tfoot>";
    //     echo "</table>";
    // } -->

