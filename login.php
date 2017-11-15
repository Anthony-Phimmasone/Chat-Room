<html>
	<title>login</title>
	<body>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $mysqli = new mysqli("127.0.0.1", "usernameHere", "passwordHere", "F17-CPSC348-01_usernameHere");
	$sql = "SELECT username, password FROM Users WHERE username='" . $mysqli->real_escape_string($username) . "'";
	$result = $mysqli->query($sql);
	if(!$result){
		die("error");
	}
	elseif($result->num_rows == 0){
		echo "<p>incorrect username or password";
	}else{
		$row = $result->fetch_assoc();
		if(password_verify($password, $row["password"])){
			session_start();
			$_SESSION["username"] = $username;
			header("Location: index.php");
			die;
		}else{
			echo "<p>incorrect username or password";
		}
	}
}
?>

<form method="post" action="login.php">
                        <div>
                        <label>Username: <input type="text" name="username" autofocus></label>
                        </div>
                        <div>
                        <label>Password: <input type="password" name="password"></label>
                        </div>
                        <input type="submit" value="Login">

                </form>
	</body>
</html>
