<?php
$connect = new mysqli("127.0.0.1", "usernameHere", "passwordHere", "F17-CPSC348-01_usernameHere");
mysql_select_db('chat', $connect);
$result = mysql_query("SELECT * FROM logs ORDER BY id DESC");
while($extract = mysql_fetch_array($result)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['message'] . "</span><br />";
}
