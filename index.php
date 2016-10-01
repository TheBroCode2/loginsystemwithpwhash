<?php		error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>

<!doctype HTML>
<html>
    
    <head>
        <title>Simple log-in</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    
    <body>
        <div class="box">
        <form method="post" action="index.php">
            <p>Username</p>
            <input name="username" type="text" placeholder="Username"/>
            <p>Password</p>
            <input name="password" type="password" placeholder="Password"/>
            <br><br>
            <input type="submit" name="submit" value="Log-in">
            <a href="create.php">Create a user!</a>
        </form>
          <a id="iffail" href="http://nikolajdommergaard.dk/login2/user.php">Click here if the automatic redirect after login HAS FAILED.</a> 
        </div>
        <?php
if (isset($_POST['submit'])) {
    require_once("connection.php");
	
	
	
	
	
	
 	
	$user = filter_input(INPUT_POST, 'username'); 
	$passinput = filter_input(INPUT_POST, 'password'); 
    
    $sql = "SELECT id, password FROM brugere WHERE username = ?";
   

$stmt = $dbCon->prepare($sql);
$stmt->bind_param('s', $user);
$stmt->execute();

$stmt->bind_result($uid, $pwHash);

    if($stmt->fetch()){		
        $passinput = $passinput;
		$pwHash = $pwHash;
		
	
		
		if (password_verify($passinput, $pwHash)) {
			$_SESSION['username'] = $user;
		$_SESSION['id'] = $uid;
		header("location: http://nikolajdommergaard.dk/login2/user.php");
		} else {
			echo 'Login Failed';
		}
 	}	
 }

?>
<br>
<br>
     
       
        
        

    </body>
    
</html>