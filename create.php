<?php 
session_start();
$db = mysqli_connect("nikolajdommergaard.dk.mysql", "nikolajdommerga", "GHAdaJqK", "nikolajdommerga");


if (isset($_POST['register_btn'])){
    session_start();
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);
   
	
    if ($password == $password2) {
        // Create use
        $phash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO brugere (username, password) VALUES ('$username', '$phash')";
        mysqli_query($db, $sql);
        $_SESSION['message'] = "User created!";
        $_SESSION['username'] = $username;
        header("location: index.php");
		
    }
    else {
        // Failed
        $_SESSION['message'] = "The two passwords do not match";
        
    }
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
<div class="box">
<form method="post" action="#">
            <p>Username</p>
            <input name="username" type="text" placeholder="Username"/>
            <p>Password</p>
            <input name="password" type="password" placeholder="Password"/>
            <p>Confirm password</p>
            <input name="password2" type="password" placeholder="Password"/>
            <br><br>
            <input type="submit" name="register_btn" value="Create user">
            <a href="index.php">Click here to log in</a>
        </form>


</div>







<!--
<form method="post" action="#">
	<table>
		<tr>
        	<td>Username</td>
            <td><input type="text" name="username" class="textInput"></td>
        </tr>
        <tr>
        	<td>Password</td>
            <td><input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
        	<td>Confirm Password</td>
            <td><input type="password" name="password2" class="textInput"></td>
        </tr>
        <tr>
        	<td>Create User</td>
            <td><input type="submit" name="register_btn" value="Register"></td>
        </tr>
	</table>
</form>

-->
</body>
</html>