<!-- NOTE: THIS PAGE CONTAINS BOTH LOGIN AND SIGNUP FORM -->
<?php $page_title = "Login";
include_once 'head_layout.php';
?>

<html>
    <head>
    <link rel="stylesheet" href="libs/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
        <body>
        <div class="form_center">
          <div class="form_container">
                    <i class="fa-solid fa-xmark form_close"></i>
                    <!-- LOGIN FORM -->
                    <div class="form login_form">
                        <form action="#">
                            <h3>Login</h3>
                            <div class="input_box">
                                <input type="email" placeholder="Enter your email" required/>
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
                                Don't have an account? <a href="#" id="signup">Signup</a>
                            </div>
                        </form>
                    </div>

                    <!-- SIGNUP FORM -->
                    <div class="form signup_form">
                        <form action="#">
                            <h3>Signup</h3>
                            <div class="input_box">
                                <input type="name" placeholder="Enter your fullname" required/>
                                <i class="fa-regular fa-user name"></i>
                            </div>

                            <div class="input_box">
                                <input type="email" placeholder="Enter your email" required/>
                                <i class="fa-regular fa-envelope email"></i>
                            </div>

                            <div class="input_box">
                                <input type="password" placeholder="Create password" required/>
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
                                Already have an account? <a href="#" id="login-link">Login</a>
                            </div>
                        </form>
                    </div> 
                </div>
        </div>
                <script src="libs/javascript/script.js"></script>
                <script src="libs/javascript/login-script.js"></script>
        </body>
</html>

<?php include_once 'footer_layout.php' ?>
