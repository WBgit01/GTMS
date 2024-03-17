<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GTMS-Portal</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="libs/css/style.css">
</head>
<body>
	
	<div class="container">
		<?php include_once 'navigation.php'; ?>
	</div>

    
        <?php 
            if ($page_title == "Index"){
                echo "<div class='banner'>";
                echo "<h1> Garments Transaction Management System</h1>";
                echo "<img src='IMG/MSC_Logo.png' class='logoMain'>";
                echo "<a class='button1' href='GTMS-sub.php'>TEST</a>";
                
            }elseif ($page_title=="Login") {
                
            }
        ?>