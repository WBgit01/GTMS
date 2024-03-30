<?php
// Database connection
$servername = "localhost"; // MySQL server host
$username = "root"; // MySQL username
$password = ""; // MySQL password
$database = "gtms"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the 'users' table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$orders = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

// Close connection
$conn->close();

// Output orders data as JSON
echo json_encode($orders);
?>
