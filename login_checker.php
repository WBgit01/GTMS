<?php
// login checker for 'admin' access level
// if access level was not 'Admin', redirect him to login page
if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
    header("Location: {$home_url}admin/index.php?action=logged_in_as_admin");
}
// if $require_login was set and value is 'true'
else if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if(!isset($_SESSION['access_level'])){
        header("Location: {$home_url}login.php?action=please_login");
    }
}
else{
    // no problem, stay on current page
}
?>