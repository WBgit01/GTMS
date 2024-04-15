<?php 
include_once "config/database.php";
include_once "config/core.php";



$page_title = "Login";
include_once 'layout_head.php';
?>

<i class="fa-solid fa-xmark form_close"></i>
    <!-- LOGIN FORM -->
<div class="form login_form">
    <form action="#">
        <h3>Login</h3>
            <div class="input_box">
                <input type="text" placeholder="Enter Email or Student ID" required/>
                <i class="fa-regular fa-envelope email"></i>
            </div>

            <div class="input_box">
                <input type="password" placeholder="Enter your password" required/>
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
