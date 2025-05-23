<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/transaction.php';
include_once '../object/user.php';
include_once '../object/vendo.php';

$database = new Database();
$db = $database->getConnection();

$vendo = new vendo($db);

$page_title = "Downtime Logs";
$require_login = true;
$isAccessible = $_SESSION['isAccessible'];
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';



$stmt = $vendo->readVendo();
$num = $stmt->rowCount();


?>

<div class="panel_container">
    <h3 class="main_title">Vendo Downtime</h3>
    <div class="panel_wrapper">
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
                echo "<th>Vendo Location</th>";
                echo "<th>Date</th>";
                echo "<th>Downtime</th>";
                echo "<th>Recovery Time</th>";
                echo "<th>Duration</th>";
            echo "</tr>";
        echo "</thead>";

        echo "<tbody>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$vendo_name}</td>";
                echo "<td>{$vendo_location}</td>";
                echo "<td>02/24/24</td>";
                echo "<td>7:54 pm</td>";
                echo "<td>8:54 pm</td>";
                echo "<td>1 hour</td>";
            echo "</tr>";
        }
        echo "</tbody>";
    } else {

        echo "<div class='result_txt'>No transactions found.</div>";
    }
    ?>
</div>

<?php include_once 'layout_foot.php';?>