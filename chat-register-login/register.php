<?php

if(isset($_POST['submit'])) {

	$con = mysqli_connect('cs.umw.edu', 'sberming', 'Lemonade2', 'F17-CPSC348-01_sberming');
	mysqli_select_db('chatbox', $con);
	
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$pword2 = $_POST['password2'];
	
	if($pword != $pword2) {
		echo "Passwords do not match. <br>";
	}
	else {
		$checkexist = mysqli_query("SELECT username FROM users WHERE username = '$uname'");
		if(mysqli_num_rows($checkexist)){
			echo "Username already exists, Please select other username.<br>";
		}
		else {
			mysqli_query("INSERT INTO users (`username`,`password`) VALUES('$uname','$pword')" );
			
			echo "You are now registered. Click <a href='index.php'>here</a> to start chatting";
		}
		
	}

}

?>

<html>

<head>

<title></title>

</head>

<body>
<form name="form1" action="register.php" method="post">
<table border="1" align="center">

<tr>
<td>Enter your Username: </td>
<td><input type="text" name="username"></td>
</tr>

<tr>
<td>Enter your Password: </td>
<td><input type="password" name="password"></td>
</tr>

<tr>
<td>Repeat your Password: </td>
<td><input type="password" name="password2"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Register"></td>
</tr>


</table>
</form>

<body>
</html>
