<?php
	if(isset($_POST['cancel'])){
		//redirect to index.php
		header("Location: index.php");
		return;
	}	

	$salt='XyZzy12*_';
	$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; //password is php123

	$fail = false; //stores failure message 

	if(isset($_POST['who']) && isset($_POST['pass'])){
		//check for empty fields
		if(strlen($_POST['who'])<1 || strlen($_POST['pass'])<1){
			$fail = "User name and password are required";
		}
		else{
			$check = hash('md5', $salt.$_POST['pass']);
			if($check == $stored_hash){
				//redirect user to game.php
				header("Location: game.php?name=".urldecode($_POST['who']));
				return;
			}
			else{
				$fail="Incorrect password";

			}
		}	
	}
//Now Start of View
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<title>Ishika Mitra's Login Page</title>
</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<?php
	if($fail!==false){
		echo('<p style="color:red;">'.htmlentities($fail)."</p>\n");
	}
?>
<form method="POST">
<label for="one">User Name</label>
<input type="text" name="who" id="one"><br/>
<label for="two">Password</label>
<input type="text" name="pass" id="two"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
For a password hint, view source and find a password hint
in the HTML comments.
<!-- Hint: The password is php123 -->
</p>
</div>
</body>
</html>
