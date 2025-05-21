<?php 
$vendo_id = isset($_GET['vid']) ? $_GET['vid'] : die('Error: ID not Found');

include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/user.php';
include_once '../object/vendo.php';
include_once '../object/vendo_statistic.php';

$database = new Database();
$db = $database->getConnection();

$vendo = new vendo($db);
$vendo_statistic = new VendoStatistic($db);

$page_title = "Vendo-pobla-200";
$require_login = true;
$isAccessible = $_SESSION['isAccessible'];
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';

$stmt = $vendo_statistic->readVendoUsers($vendo_id);
$num = $stmt->rowCount();
?>

<div class="panel_container">
    <h3 class="main_title">Statistics</h3>
    <div class="panel_wrapper">

        <div class="panel_content lightcolor-2">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Connected User</span>
                    <span class="amount_value">3</span>
                </div>
                <i class="fa-solid fa-users icon darkcolor-2"></i>
            </div>
        </div>

        <div class="panel_content lightcolor-4">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Daily Sales</span>
                    <span class="amount_value">28,290</span>
                </div>
                <i class="fa-solid fa-peso-sign icon darkcolor-4"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-3">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Weekly Sales</span>
                    <span class="amount_value">28,2908</span>
                </div>
                <i class="fa-solid fa-coins icon darkcolor-3"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-1">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Monthly Sales</span>
                    <span class="amount_value">28,2908</span>
                </div>
                <i class="fa-solid fa-hand-holding-dollar icon darkcolor-1"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-5">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Yearly Sales</span>
                    <span class="amount_value">28,2908</span>
                </div>
                <i class="fa-solid fa-money-bill-trend-up icon darkcolor-5"></i>
            </div>
        </div>
        

        <h3 class="main_title">Devices</h3>

    </div>

    <div class="panel2_wrapper">
    <?php
    if ($num > 0) {
        echo "<div class='table_container'>";
        echo "<table>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Mac Address</th>";
                echo "<th>Device Duration</th>";
                echo "<th>Status</th>";
                echo "<th>IP Address</th>";
            echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "<tr>";
                echo "<td>{$device_mac_address}</td>";
                echo "<td>{$device_duration}</td>";
                echo "<td>{$status}</td>";
                echo "<td>{$device_ip_address}</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='result_txt'>No Devices Available</div>";
    }
    ?>
    </div>
</div>

<?php include_once 'layout_foot.php';?>
