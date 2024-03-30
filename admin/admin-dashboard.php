<?php
$page_title = "Dashboard";
include_once 'layout_head.php';


?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-admin">
    <h1>Admin Dashboard</h1>
    <table id="ordersTable">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Student ID</th>
                <th>Access Level</th>
                <th>Email Address</th>
                <th>Contact No</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody id="ordersTableBody"></tbody> <!-- make sure there is a tbody element -->
    </table>
</div>
<script src="scripts.js"></script>
</body>
</html>


<?php
include_once 'layout_foot.php';
?>
