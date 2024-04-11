<?php

include_once "config/database.php";
include_once "object/user.php";

$database = new Database;
$db = $database->getConnection();

$user = new User($db);


$page_title = "Register";
include_once 'layout_head.php';

echo "<div class='alert-message'>";
    echo "<span>Messages Here</span>";
echo "</div>";
if ($_POST) {

    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->email_address = $_POST['email_address'];
    $user->password = $_POST['password'];
    $user->student_id = "22b093";
    $user->access_level = "Student";

    if ($user->createUser()) {
           // style this shit
        echo "<div class='alert-message-success'>";
            echo "Registration Success!.";
        echo "</div>";
    }elseif(){
        echo "<div class='alert-message-failed'>";
            echo "Registration Failed, Please Try Again.";
        echo "</div>";
    }


}
?>

<!-- html form here -->

<form action="register.php" method="POST">
    <div class="form-container">
        <div class="header">
            <img src="IMG/GTMS_logo1.png" class="logo-login">
            <span>Signup</span>
        </div>
        <div class="form-content-signup">
            <input type="text" name='firstname' placeholder="Firstname" required><br>
            <input type="text" name='lastname' placeholder="Lastname" required><br> 
            <input type="text" name='email_address' placeholder="Email Adress" required><br>
            <!-- <input type="text" name='contact' placeholder="Contact" required><br> -->
            <input type="password" name='password' placeholder="Password" required><br>
            <!-- <input type="password" name='password' placeholder="Confirm Password" required><br> -->
            <input type="submit" value='Signup'><br>
            Already have an account? <a href="login.php">HERE</a>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php' ?>