<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GTMS-Portal</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<style>
		body{
	margin: 0;
	padding: 0;
	font-family: 'Roboto';
	background: linear-gradient(rgba(0, 0, 0, 0.0),rgba(0, 0, 0, 0.0)), url(IMG/MSC_background3.jpg);
}
.container{
	width: 100%;
	height: 100vh;
	
	background-position: center;
	background-size: cover;
	box-sizing: border-box;

}
.navi{
	box-sizing: border-box;
	background-color: green;
	background-size: cover;
}
.navi{
	height: 10%;
	display: flex;
	align-items: center;
	padding-left: 8%;
	padding-right: 8%;
	
}
.logo{
	width: 40px;
	cursor: pointer;
	
}
.logo2{
	width: 200px;
	cursor: pointer;
	padding-left: 20px;
	background-size: cover;
	
}
nav{
	flex: 1;
	text-align: right;
}
nav ul li{
	list-style: none;
	display: inline-block;
	margin-left: 60px;
}
nav ul li a{
	text-decoration: none;
	color: white;
	text-transform: uppercase;
	font-size: 18px;
	
}
.banner{
	box-sizing: border-box;
	align-items: center;
	display: flex;
	flex-direction: column;
	
}
h1{
	position: absolute;
	width: 100%;
	top: 16%;
	text-align: center;
	font-size: 60px;
	font-weight: 50px;
	color: black;
}
.logoMain{
	position: absolute;
	width: 185px;
	top: 40%;
}
.button1{
	background: green;
	color: white;
	font-size: 23px;
	text-decoration: none;
	text-align: center;
	cursor: pointer;
	position: absolute;
	border: 2px solid black;
	border-radius: 10px;
	margin: 18px;
	padding: 18px 60px;
	display: inline-block;
	top: 83%;
}
.footer{
	position: relative;
	bottom: 0;
	left: 0;
	top: 100px;
	width: 100%;
	height: 65px;
	background-color: green;
}
.footer p1{
	position: absolute;
	color: lightgrey;
	top: 26px;
	padding-left: 4%;
	font-size: 14px;

}
.footer p2{
	position: relative;
	color: white;
	top: 26px;
	padding-right: 4%;
	font-size: 14px;
	margin-left: 85%;
	text-align: right;
}

	</style>
</head>
<body>
	
	<div class="container">
		<div class="navi">
			<img src="IMG/MSC_Logo.png" class="logo">
			<img src="IMG/GTMS_logo2.png" class="logo2">
			<nav>
				<ul>
					<li><a href="GTMS-main.php">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Login</a></li>
					<li><a href="#">SignUp</a></li>
				</ul>
			</nav>
		</div>	
	</div>

	<div class="banner">
		<h1> Garments Transaction Management System</h1>
			<img src="IMG/MSC_Logo.png" class="logoMain">
			<a class="button1" href="GTMS-sub.php">TEST</a>
	</div>
		<div class="footer">
		<p1>WB ©2024</p1>
		<p2>Release: Beta v1.0
	</div>

</body>
</html>