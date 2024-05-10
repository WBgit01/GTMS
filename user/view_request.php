<?php 
$id = isset($_GET['oid']) ? $_GET['oid'] : die('Error: ID not Found');
include_once '../config/core.php';
$require_login = true;
include_once '../login_checker.php';

$page_title = "Request";
include_once 'sidebar.php'; 
include_once 'layout_head.php'; ?>


<div class="panel_container" id="profile-container">
    <div class="panel_wrapper">
    </div>
</div>


<?php include_once 'layout_foot.php'; ?>