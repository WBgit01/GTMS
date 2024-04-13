<?php
$page_title = "Register";
include_once "config/database.php";
include_once "config/core.php";
include_once 'head_layout.php';
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
    $user->student_id = "22b093";
    $user->access_level = "Admin";

    if ($user->createUser()) {
        echo "<div class='alert-message-success'>";
        echo "Registration Success!.";
        echo "</div>";
    } else {
        echo "<div class='alert-message-failed'>";
        echo "Registration Failed, Please Try Again.";
        echo "</div>";
    }
} 
?>


<head>
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="libs/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="form_center">
    <div class="form_container">
        <i class="fa-solid fa-xmark form_close"></i>
        <form action="#" method="POST">
            <h3>Signup</h3>
            <div class="input_box">
                <input type="name" name="firstname" placeholder="Enter your fullname" required/>
                <i class="fa-regular fa-user name"></i>
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
                <input type="password" placeholder="Confirm password" required/>
                <i class="fa-solid fa-lock password"></i>
                <i class="fa-regular fa-eye-slash pwhide"></i>
            </div>
            
            <button class="btn1">Signup Now</button>

            <div class="login_signup">
                Already have an account? <a href="login.php" id="login-link">Login</a>
            </div>
        </form> 
    </div> 
</div>

<script src="libs/javascript/script.js"></script>
<script src="libs/javascript/login-script.js"></script>
</body>
</html>

<?php include_once 'footer_layout.php' ?>
