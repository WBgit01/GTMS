<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="../libs/css/user-style.css">
    <title>User Dashboard</title>
</head>
<body>


<?php

    
if ($page_title =="Profile") {
    echo "<div class='main_content'>";
        echo "<div class='header_wrapper'>";
            echo "<div class='header_title'>";
                echo "<span>Setting</span>";
                echo "<h2>{$page_title}</h2>";
                echo "<h2>Stuent ID: {$user->student_id}</h2>";
                echo "";
            echo "</div>";
        echo "<div class='user_info'>";
                echo isset($user->image_profile) ? "<img src='uploads/{$_SESSION['user_id']}/{$user->image_profile}' alt='User Image'>" : "No image found. </br>";
                
            echo "</div>";
        echo "</div>";
}else{
    echo "<div class='main_content'>";
    echo "<div class='header_wrapper'>";
        echo "<div class='header_title'>";
            echo "<h2>$page_title</h2>";
        echo "</div>";
        echo "<div class='user_info'>";
            echo isset($_SESSION['profile_image']) ? "<img src='uploads/{$_SESSION['user_id']}/{$_SESSION['profile_image']}' alt='User Image'>" : "No image found.";

        echo "</div>";
    echo "</div>";
}



?>

