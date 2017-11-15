<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		die;
	}

	$username = $_SESSION["username"];
	echo "<p>Welcome, $username!</p>";
?>
