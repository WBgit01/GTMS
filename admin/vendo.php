<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/transaction.php';
include_once '../object/user.php';
include_once '../object/vendo.php';

$database = new Database();
$db = $database->getConnection();

$vendo = new vendo($db);

$page_title = "Vendo Dashboard";
$require_login = true;
$isAccessible = $_SESSION['isAccessible'];
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';



$stmt = $vendo->readVendo();
$num = $stmt->rowCount();


?>

<div class="panel_container">
    <h3 class="main_title">Statistics</h3>
    <div class="panel_wrapper">


    </div>

<div class="panel2_wrapper">
    <?php
    if ($num > 0) {
        echo "<div class='table_container'>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Vendo ID</th>";
        echo "<th>Vendo Name</th>";
        echo "<th>Vendo Revenue</th>";
        echo "<th>Vendo Location</th>";
        echo "<th>Status</th>";
        echo "<th>No.of Devices Connected</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$vendo_name}</td>";
            echo "<td>{$vendo_revenue}</td>";
            echo "<td>{$vendo_location}</td>";
            echo "<td>{$status}</td>";
            echo "<td>{$no_con_device}</td>";
            echo "<td>";
            if ($status == "Approved") {
                echo "<a href='../admin/view_request.php?oid={$id}' class='action_btn1'>View</a>";

            }elseif ($status == "Updated") {
                echo "<a href='../admin/view_request.php?oid={$id}' class='action_btn1'>View</a>";
                echo "<a update-id='{$id}' class='action_btn2 update-object'>Approve</a>";
                echo "<a decline-id='{$id}' class='action_btn3 decline-object'>Decline</a>";

            }elseif ($status == "Declined") {
                echo "<a href='../admin/view_request.php?oid={$id}' class='action_btn1'>View</a>"; 

            }else {
                echo "<a href='../admin/view_request.php?oid={$id}' class='action_btn1'>View</a>";
                echo "<a update-id='{$id}' class='action_btn2 update-object'>Approve</a>";
                echo "<a href='#' class='action_btn3' onclick='deleteOrder({$id})'>Decline</a>";
            }
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";

    } else {

        echo "<div class='result_txt'>No transactions found.</div>";
    }
    ?>
</div>

<?php include_once 'layout_foot.php';?>