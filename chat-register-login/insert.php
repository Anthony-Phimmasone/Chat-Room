<?php
session_start();
$uname = $_SESSION['username'];
$msg = $_REQUEST['msg'];

$con = mysqli_connect('cs.umw.edu','sberming','','F17-CPSC348-01_sberming');
mysqli_select_db('chatbox', $con);

mysqli_query("INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')");

$result1 = mysqli_query("SELECT * FROM logs ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}
