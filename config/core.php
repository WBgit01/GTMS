<?php
// show error reporting
error_reporting(E_ALL);
// start php session
session_start();
<<<<<<< HEAD
=======
// print_r($_SESSION);
>>>>>>> 46f65b99253db20192225ce2ace7fe5784d6e26c
// set your default time-zone
date_default_timezone_set('Asia/Manila');

// home page url
$home_url="http://localhost/gtms/";
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set number of records per page
$records_per_page = 5;
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>