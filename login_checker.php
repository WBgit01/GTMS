<?php
// Make sure to start the session


// Check if access level is Admin and redirect if so
if(isset($_SESSION['access_level']) && $_SESSION['access_level'] == "Admin") {
    header("Location: {$home_url}admin/index.php?action=logged_in_as_admin");
    exit; // Ensure that script stops execution after redirection
}

// Check if login is required and redirect if user is not logged in
if(isset($require_login) && $require_login == true && !isset($_SESSION['access_level'])) {
    header("Location: {$home_url}login.php?action=please_login");
    exit; // Ensure that script stops execution after redirection
}

// No pr