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

        <div class="panel_content lightcolor-4">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Total Revenue</span>
                    <span class="amount_value">565,816</span>
                </div>
                <i class="fa-solid fa-chart-simple icon darkcolor-4"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-2">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Total Devices Connected</span>
                    <span class="amount_value">565,816</span>
                </div>
                <i class="fa-solid fa-mobile-retro icon darkcolor-2"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-3">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Active Vendo</span>
                    <span class="amount_value">2</span>
                </div>
                <i class="fa-solid fa-circle-up icon darkcolor-3"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-1">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Inactive Vendo</span>
                    <span class="amount_value">3</span>
                </div>
                <i class="fa-solid fa-circle-down icon darkcolor-1"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-5">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Total Vendo</span>
                    <span class="amount_value">5</span>
                </div>
                <i class="fa-solid fa-house-signal icon darkcolor-5"></i>
            </div>
        </div>





        <h3 class="main_title"></h3>
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
                echo "<th>Connected Devices</th>";
                echo "<th>Details</th>";
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
                    echo "<a href='../admin/view_vendo.php?vid={$id}' class='action_btn1'>View</a>";
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