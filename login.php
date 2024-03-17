<?php

$page_title = "Login";
include_once 'layout_head.php';
?>

<!-- html form here -->

<form action="">
    <div class="form-container">
        <div class="header">
            <span>Login</span>
        </div>
        <div class="form-content">
            <input type="text" name='email' placeholder="Username" required><br>
            <input type="password" name='password' placeholder="Password" required><br>
            <input type="submit" value='LOGIN'><br>
            forgot password? <a href="">HERE!</a>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php' ?>