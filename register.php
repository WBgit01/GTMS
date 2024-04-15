<?php
$page_title = "Register";
include_once "config/database.php";
include_once "config/core.php";
include_once 'layout_head.php';
include_once "object/user.php";

$database = new Database;
$db = $database->getConnection();
$user = new User($db);
$page_title = "Register";

echo "<div class='alert-message'>here</div>";

if ($_POST) {
    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->email_address = $_POST['email_address'];
    $user->password = $_POST['password'];
    $user->student_id = $_POST['student_id'];
    $user->access_level = "Student"; // Set access level to "Student" by default

    if ($user->createUser()) {
        echo "<div class='alert-message-success'>";
        echo "Registration Success! Redirecting to login page...";
        echo "</div>";
        // Redirect to login page after registration
        header("Location: login.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "<div class='alert-message-failed'>";
        echo "Registration Failed, Please Try Again.";
        echo "</div>";
    }
}
?>

<div class="form_center">
    <div class="form_container">
        <i class="fa-solid fa-xmark form_close"></i>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3>Signup</h3>
            <div class="input_box">
                <input type="text" name="firstname" placeholder="Enter your first name" required/>
                <i class="fa-regular fa-user name"></i>
            </div>

            <div class="input_box">
                <input type="text" name="lastname" placeholder="Enter your last name" required/>
                <i class="fa-regular fa-user name"></i>
            </div>

            <div class="input_box">
                <input type="text" name="student_id" placeholder="Enter your student ID" required/>
                <i class="fa-regular fa-id-badge id name"></i>
            </div>

            <div class="input_box">
                <input type="email" name="email_address" placeholder="Enter your email" required/>
                <i class="fa-regular fa-envelope email"></i>
            </div>

            <div class="input_box">
                <input type="password" name="password" placeholder="Create password" required/>
                <i class="fa-solid fa-lock password"></i>
                <i class="fa-regular fa-eye-slash pwhide"></i>
            </div>

            <div class="input_box">
                <input type="password" name="confirm_password" placeholder="Confirm password" required/>
                <i class="fa-solid fa-lock password"></i>
                <i class="fa-regular fa-eye-slash pwhide"></i>
            </div>
            
            <button type="submit" class="btn1">Signup Now</button>

            <div class="login_signup">
                Already have an account? <a href="login.php" id="login-link">Login</a>
            </div>
        </form> 
    </div> 
</div>

<?php include_once 'layout_foot.php' ?>

