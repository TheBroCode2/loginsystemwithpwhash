<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();


if (isset($_SESSION['id'])){
	$uid = $_SESSION['id'];
	$user = $_SESSION['username'];
	
	
	} else {
		header('location: index.php');
		die();
		
		}



?>






<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
Welcome <?php echo $user; ?>, You are logged in, Your user ID is <?php echo $uid; ?>, 
<h1>This is the secret page which can only be viewed after logging in!</h1>
<form action="logout.php">
<input type="submit" id="lout" value="Log Out" />
</form>

</body>
</html>