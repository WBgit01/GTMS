<?php 
include_once '../config/core.php';

$page_title = "Users";
$require_login = true;
include_once '../login_checker.php';

$page_title = "Users";
include_once 'sidebar.php'; 
include_once 'layout_head.php';

?>


<!-- contents will be here -->

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


<?php include_once 'layout_foot.php'; ?>


