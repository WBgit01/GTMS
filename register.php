<?php

$page_title = "Register";
include_once 'layout_head.php';
?>

<!-- html form here -->

<form action="">
    <div class="form-container">
        <div class="header">
            <span>Signup</span>
        </div>
        <div class="form-content-signup">
            <input type="text" name='name' placeholder="Name" required><br>
            <input type="text" name='password' placeholder="Email" required><br>
            <input type="text" name='contact' placeholder="Contact" required><br>
            <input type="password" name='password' placeholder="Password" required><br>
            <input type="password" name='password' placeholder="Confirm Password" required><br>
            <input type="submit" value='Signup'><br>
            Already have an account? <a href="login.php">HERE</a>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php' ?>