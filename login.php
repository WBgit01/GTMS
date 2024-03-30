<?php
include_once "config/core.php";


$page_title = "Login";
$require_login = false;
include_once "login_checker.php";
$access_denied = false;
include_once 'layout_head.php';

if($_POST){
    include_once "config/database.php";
    include_once "object/user.php";

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $user->email_address=$_POST['email_address'];
    $user->student_id = $_POST['email_address'];

    $email_exists_or_studentid_exist = $user->emailExists();
    
    //validate the login creds
    
    if ($email_exists_or_studentid_exist && password_verify($_POST['password'], $user->password)) {
        $_SESSION['firstname'] = $user->firstname;
        $_SESSION['lastname'] = $user->lastname;
        $_SESSION['access_level'] = $user->access_level;

        if ($user->access_level == "Admin") {
            header("location:{$home_url}admin/index.php?action=login_success");
        }else{
            header("location:{$home_url}index.php?action=login_success");
        }
    }else{
        $access_denied = true;
    }
}

?>

<!-- html form here -->

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <div class="form-container">
        <?php include_once "alert-messages.php"; ?>
        <div class="header">
            <img src="IMG/GTMS_logo1.png" class="logo-login">
            <span>Login</span>
        </div>
        <div class="form-content">
            <input type="text" name='email_address' placeholder="School ID/Username" required><br>
            <input type="password" name='password' placeholder="Password" required><br>
            <input type="submit" value='LOGIN'><br>
            forgot password? <a href="">HERE!</a>
        </div>
    </div>
</form>

<?php include_once 'layout_foot.php' ?>