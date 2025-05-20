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

$page_title = "Vendo Statistic";
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
                echo "<th>Action</th>";
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
                echo "<td>";
                    echo "<a href='../admin/view_vendo?vid={$vendo_id}' class='action_btn1'>View</a>";
                echo "</td>";
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
