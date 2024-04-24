<?php
// login checker for 'admin' access level
// if access level was not 'Admin', redirect him to login page
if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
    header("Location: {$home_url}admin/index.php?action=logged_in_as_admin");
}

else if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['access_level'] == "Admin"){
    // if user not yet logged in, redirect to login page
    if($page_title == "Login" || $page_title == "Register"){
        header("Location: {$home_url}admin/index.php?action=already_logged_in");
    }
}
// if $require_login was set and value is 'true'
else if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if(!isset($_SESSION['access_level'])){
        header("Location: {$home_url}login.php?action=please_login");
    }
}
// if user is already Loggedin and the access level is student the login and sign up page must not be accessible
else if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['access_level'] == "Student"){
    // if user not yet logged in, redirect to login page
    if($page_title == "Login" || $page_title == "Register" || $page_title == "Dasboard"){
        header("Location: {$home_url}user/index.php?action=already_logged_in");
    }
}


else{
    // no problem, stay on current page
}
?>