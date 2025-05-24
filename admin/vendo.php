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

$total_revenue = $vendo->getTotalRevenue();

?>

<div class="panel_container">
    <h3 class="main_title">Statistics</h3>
    <div class="panel_wrapper">

        <div class="panel_content lightcolor-1">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Today Total Revenue</span>
                    <span class="amount_value"><?php echo "₱ ". number_format($total_revenue, 2); ?></span>
                </div>
                <i class="fa-solid fa-peso-sign icon darkcolor-1"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-2">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Weekly Revenue</span>
                    <span class="amount_value">₱ 10,745</span>
                </div>
                <i class="fa-solid fa-coins icon darkcolor-2"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-3">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Monthly Revenue</span>
                    <span class="amount_value">₱ 322,350</span>
                </div>
                <i class="fa-solid fa-hand-holding-dollar icon darkcolor-3"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-4">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Yearly Revenue</span>
                    <span class="amount_value">₱ 3,868,200</span>
                </div>
                <i class="fa-solid fa-chart-simple icon darkcolor-4"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-8">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Total Connected Users</span>
                    <span class="amount_value">105</span>
                </div>
                <i class="fa-solid fa-mobile-retro icon darkcolor-8"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-5">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Active Vendo</span>
                    <span class="amount_value">3</span>
                </div>
                <i class="fa-solid fa-circle-up icon darkcolor-5"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-6">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Inactive Vendo</span>
                    <span class="amount_value">0</span>
                </div>
                <i class="fa-solid fa-circle-down icon darkcolor-6"></i>
            </div>
        </div>
        <div class="panel_content lightcolor-7">
            <div class="panel_header">
                <div class="amount">
                    <span class="title">Total Vendo</span>
                    <span class="amount_value"><?php echo $num; ?></span>
                </div>
                <i class="fa-solid fa-house-signal icon darkcolor-7"></i>
            </div>
        </div>

        <h3 class="main_title"></h3>

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
            $total_revenue += (float)$vendo_revenue;

            echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$vendo_name}</td>";
                echo "<td>₱" . number_format($vendo_revenue, 2) . "</td>";
                echo "<td>{$vendo_location}</td>";
                echo "<td>{$status}</td>";
                echo "<td>{$no_con_device}</td>";
                echo "<td><a href='../admin/view_vendo.php?vid={$id}' class='action_btn1'>View</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        ?>
    </div>
</div>

<?php
} else {
    echo "<div class='result_txt'>No transactions found.</div>";
}
include_once 'layout_foot.php';
?>
