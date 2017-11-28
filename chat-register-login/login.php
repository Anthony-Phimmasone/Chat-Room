<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db('chatbox', $con);

$result = mysqli_query("SELECT * FROM users WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($result)){
	$res = mysqli_fetch_array($result);
	
	$_SESSION['username'] = $res['username'];
	echo "You are now Logged in. Click <a href='index.php'>here</a> to go back to main chat window.";
}

else{
	
	echo "No user found. Please go <a href='index.php'>back</a> and enter the correct login.<br>";
	echo "You may register a new account by clicking <a href='register.php'>here</a>.";
	
}

?>
