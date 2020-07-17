<?php
	if(!isset($_GET['name'])||strlen($_GET['name'])<1){
		die('Name parameter missing');
	}
	if(isset($_POST['logout'])){
		header('Location: index.php');
		return;
	}
	$names = array('Rock', 'Paper', 'Scissors');
	$human = isset($_POST['human'])?$_POST['human']+0:-1;
	$computer = rand(0,2);
	function check($c, $h){
		if($c===$h)
			return "Tie";
		else if($c==0 && $h==1){
			return "You Win";
		}
		else if($c==0 && $h==2){
			return "You Lose";
		}
		else if($c==1 && $h==0){
			return "You Lose";
		}
		else if($c==1 && $h==2){
			return "You Win";
		}
		else if($c==2 && $h==0){
			return "You Win";
		}
		else if($c==2 && $h==1){
			return "You Lose";
		}
		return false;

	}
	$result = check($computer, $human);

?>

<!DOCTYPE html>
<html>
<head>
<title>Ishika Mitra's Rock, Paper, Scissors Game</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Rock Paper Scissors</h1>
<?php
	if(isset($_REQUEST['name'])){
		
		echo "<p>Welcome: ";
		echo htmlentities($_REQUEST['name']);
		echo "<p>\n";

	}
?>
<form method="post">
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>
<pre>
<?php
	if($human==-1){
		print "Please select a strategy and press Play.\n";
	}
	else if($human==3){
		for($c=0;$c<3;$c++)
		{
			for($h=0;$h<3;$h++){
				$r = check($c, $h);
				print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
			}
		}
	}
	else{
		print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
	}

?>
</pre>

</div>
</body>
</html>