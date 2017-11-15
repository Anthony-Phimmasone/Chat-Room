<!DOCTYPE html>
<html>
	<title>Create Account</title>
	<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = $_POST["username"];
	$password = $_POST["password"];

	$passwordHash = password_hash($password, PASSWORD_BCRYPT);

	$mysqli = new mysqli("127.0.0.1", "usernameHere", "passwordHere", "F17-CPSC348-01_usernameHere");
	$sql = "INSERT INTO Users VALUES ('" . $mysqli->real_escape_string($username) . "', '$passwordHash')";
		if($mysqli->query($sql)){
			echo "<p>Your account has been created.</p>",
				"<p><a href='login.php'>Login</a></p></body></html>";
			die;
		} elseif ($mysqli->errno == 1062){
			echo "<p> user $username exists.",
				"Please choose another.</p>";
		}else{
			die("Error ($mysqli->errno) $mysqli->error");
		}
}
?>
		<form method="post" action="createAccount.php">
			<div>
			<label>Username: <input type="text" name="username" autofocus></label>
			</div>
			<div>
			<label>Password: <input type="password" name="password"></label>
			</div>
			<input type="submit" value="Create Account">

		</form>
	</body>
</html>
