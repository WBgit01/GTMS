<?php 
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../object/user.php';
include_once '../object/academic_year.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$academic_year_obj = new Academic_year($db);

$page_title = "👩‍💻 Users";
$require_login = true;
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';

// Fetch users
$stmt = $user->readUsers();
$num = $stmt->rowCount();
$user_count = $user->countUser();



?>

<!-- contents will be here -->

    <?php
        if ($num>0) {

            echo "<div class='table_container'>";
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Student ID</th>";
                        echo "<th>Firstname</th>";
                        echo "<th>Lastname</th>";
                        echo "<th>Gender</th>";
                        echo "<th>School Year</th>";
                        echo "<th>Contact</th>";
                        echo "<th>Address</th>";
                        echo "<th>Action</th>";
                    echo "</tr>";
                echo "</thead>";

                echo "<tbody>";
                
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        
                        $academic_year_obj->id =  $academic_year;
                        $academic_year_obj->readName();
                       
                        echo "<tr>";
                            echo "<td>{$student_id}</td>";
                            echo "<td>{$firstname}</td>";
                            echo "<td>{$lastname}</td>";
                            echo "<td>{$gender}</td>";
                            echo "<td>{$academic_year_obj->academic_year_name}</td>";
                            echo "<td>{$contact_no}</td>";
                            echo "<td>{$address}</td>";
                            echo "<td>";
                                echo "<a href='../admin/view_user.php?uid={$id}' class='action_btn1'>View</a>";
                                echo "<a href='{$home_url}admin/update_user.php?uid={$id}'class='action_btn2'>Update</a>";
                                echo "<a delete-id='{$id}' class='action_btn3 delete-object'>Delete</a>";
                        echo "</tr>";
                    }

                echo "</tbody>";
                echo "<tfoot>";
                    echo "<tr>";
                        echo "<td colspan='8' class='table_foot'></td>";
                    echo "</tr>";
                echo "</tfoot>";
            echo "</table>";
        }
    ?>
    </div>

<?php include_once 'layout_foot.php'; ?>


