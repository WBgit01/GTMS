<?php


include_once "config/database.php";
include_once "config/core.php";
include_once "object/user.php";

$database = new Database;
$db = $database->getConnection();
$user = new User($db);

// page layout
$page_title = "Register";
include_once 'layout_head.php';
if ($_POST) {
    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->email_address = $_POST['email_address'];
    $user->password = $_POST['password'];
    $user->access_level = "Student";

    if ($user->createUser()) {
        echo "<div class='alert-message-success'>";
            echo "Registration Success!";
        echo "</div>";
    } else {
        echo "<div class='alert-message-failed'>";
            echo "Registration Failed, Please Try Again.";
        echo "</div>";
    }
} 

?>
<i class="fa-solid fa-xmark form_close"></i>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        
    <h3>Signup</h3>
    <div class="input_box">
        <input type="name" name="firstname" placeholder="First Name" required/>
        <i class="fa-regular fa-user name"></i>
    </div>

    <div class="input_box">
        <input type="name" name="lastname" placeholder="Last Name" required/>
            <i class="fa-regular fa-user name"></i>
    </div>

    <div class="input_box">
        <input type="email" name="email_address" placeholder="Email Address" required/>
            <i class="fa-regular fa-envelope email"></i>
    </div>

    <div class="input_box">
        <input type="password" name="password" placeholder="Create password" required/>
        <i class="fa-solid fa-lock password"></i>
        <i class="fa-regular fa-eye-slash pwhide"></i>
    </div>

    <div class="input_box">
        <input type="password" placeholder="Confirm password" required/>
        <i class="fa-solid fa-lock password"></i>
        <i class="fa-regular fa-eye-slash pwhide"></i>
    </div>
            
    <button class="btn1" type="submit">Sign Up</button>

    <div class="login_signup">
        Already have an account? <a href="login.php" id="login-link">Sign In Now!</a>
    </div>
</form>

<?php include_once 'layout_foot.php'; ?>
