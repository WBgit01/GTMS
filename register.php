<?php

$page_title = "Register";
include_once 'layout_head.php';
?>

<!-- html form here -->

<form action="">
    <div class="form-container">
        <div class="header">
            <img src="IMG/GTMS_logo1.png" class="logo-login">
            <span>Signup</span>
        </div>
        <div class="form-content-signup">
            <input type="text" name='name' placeholder="Fullname" required><br>
            <input type="text" name='password' placeholder="School ID" required><br>
            <input type="text" name='contact' placeholder="Email" required><br>
            <input type="password" name='password' placeholder="Password" required><br>
            <input type="password" name='password' placeholder="Confirm Password" required><br>
            <input type="submit" value='Signup'><br>
            Already have an account? <a href="login.php">HERE</a>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php' ?>