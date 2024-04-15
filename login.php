<<<<<<< HEAD
<?php
include_once "config/core.php";


=======
<?php 
>>>>>>> 78f3baa850cdc42ab9e2a7643b956c52210481a2
$page_title = "Login";
$require_login = false;
include_once "login_checker.php";
$access_denied = false;
include_once 'layout_head.php';

<<<<<<< HEAD
=======
$require_login = false;
include_once "login_checker.php";
$access_denied = false;

>>>>>>> 78f3baa850cdc42ab9e2a7643b956c52210481a2
if($_POST){
    include_once "config/database.php";
    include_once "object/user.php";

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

<<<<<<< HEAD
    $user->email_address=$_POST['email_address'];
    $user->student_id = $_POST['email_address'];

    $email_exists_or_studentid_exist = $user->emailExists();
    
    //validate the login creds
    
    if ($email_exists_or_studentid_exist && password_verify($_POST['password'], $user->password)) {
        $_SESSION['firstname'] = $user->firstname;
        $_SESSION['lastname'] = $user->lastname;
        $_SESSION['access_level'] = $user->access_level;

        if ($user->access_level == "Admin") {
            header("location:{$home_url}admin/index-admin.php?action=login_success");
        }else{
            header("location:{$home_url}index.php?action=login_success");
        }
    }else{
=======
    $user->email_address = $_POST['email_address'];

    // Check if the email exists
    if ($user->emailExists()) {
        // Verify password
        $userData = $user->getUserByEmail($user->email_address);
        if (password_verify($_POST['password'], $userData['password'])) {
            $_SESSION['firstname'] = $userData['firstname'];
            $_SESSION['lastname'] = $userData['lastname'];
            $_SESSION['access_level'] = $userData['access_level'];
            
            if ($userData['access_level'] == "Admin") {
                header("Location: {$home_url}admin/index-admin.php?action=login_success");
                exit();
            } else {
                header("Location: {$home_url}index-user.php?action=login_success");
                exit(); 
            }
        } else {
            // Password incorrect
            $access_denied = true;
        }
    } else {
        // Email not found
>>>>>>> 78f3baa850cdc42ab9e2a7643b956c52210481a2
        $access_denied = true;
    }
}

<<<<<<< HEAD
// error messages
include_once 'alert-messages.php';
?>

<i class="fa-solid fa-xmark form_close"></i>
    <!-- LOGIN FORM -->
<div class="form login_form">
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
        <h3>Login</h3>
            <div class="input_box">
                <input type="text" placeholder="Enter Email or Student ID" name="email_address" required/>
                <i class="fa-regular fa-envelope email"></i>
=======
include_once 'layout_head.php';
?>

<body>
    <div class="form_center">
        <div class="form_container">
            <i class="fa-solid fa-xmark form_close"></i>
            <!-- LOGIN FORM -->
            <div class="form login_form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <h3>Login</h3>
                    <div class="input_box">
                        <input type="text" name="email_address" placeholder="Enter Email or Student ID" required/>
                        <i class="fa-regular fa-envelope email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="password" placeholder="Enter your password" required/>
                        <i class="fa-solid fa-lock password"></i>
                        <i class="fa-regular fa-eye-slash pwhide"></i>
                    </div>
                    
                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check"/>
                            <label for="check">Remember me</label>
                        </span>
                        <a href="#" class="forgot_pw">Forgot password?</a>
                    </div>

                    <button class="btn1" id="form-open">Login Now</button>

                    <div class="login_signup">
                        Don't have an account? <a href="#" class="signup">Signup</a>
                    </div>
                </form>
>>>>>>> 78f3baa850cdc42ab9e2a7643b956c52210481a2
            </div>

            <div class="input_box">
                <input type="password" name="password" placeholder="Enter your password"  required/>
                <i class="fa-solid fa-lock password"></i>
                <i class="fa-regular fa-eye-slash pwhide"></i>
            </div>

                    
            <div class="option_field">
                <span class="checkbox">
                    <input type="checkbox" id="check"/>
                    <label for="check">Remember me</label>
                </span>

                <a href="#" class="forgot_pw">Forgot password?</a>
            </div>

            <button class="btn1" id="form-open">Login Now</button>

            <div class="login_signup">
                Don't have an account? <a href="#" class="signup">Signup</a>
            </div>
    </form>
</div>

<?php include_once 'layout_foot.php' ?>
