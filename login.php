<?php
include_once "config/database.php";
include_once "config/core.php";


$page_title = "Login";
include_once 'layout_head.php';


?>



<!-- html form here -->

<form action="">
    <div class="form-container">
        <div class="header">
            <img src="IMG/GTMS_logo1.png" class="logo-login">
            <span>Login</span>
        </div>
        <div class="form-content">
            <input type="text" name='email' placeholder="School ID" required><br>
            <input type="password" name='password' placeholder="Password" required><br>
            <input type="submit" value='LOGIN'><br>
            forgot password? <a href="">HERE!</a>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php' ?>