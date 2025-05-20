<?php
include_once '../config/core.php';
include_once '../config/database.php';


$database = new Database();
$db = $database->getConnection();


$page_title = "Troubleshoot Guide";
$require_login = true;
include_once '../login_checker.php';

include_once 'sidebar.php'; 
include_once 'layout_head.php';

?>

<!-- lagay mo dito ung content na nasabi ni bossing janrey html format-->

<?php include_once 'layout_head.php'; ?>