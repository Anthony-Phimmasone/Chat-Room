<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db('chatbox', $con);

$result1 = mysqli_query("SELECT * FROM logs ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}
