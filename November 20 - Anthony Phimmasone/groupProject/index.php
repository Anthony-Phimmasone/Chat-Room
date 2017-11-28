<?php

session_start();

if(!isset($_SESSION['username'])) {
?>
<form name="form2" action="login.php" method="post">
<table border="1" align="center">
 <link rel="stylesheet" href="chat.css">
<div class="header">
<h1></h1>
</div>

<tr>
<td>Username: </td>
<td><input type="text" name="username"></td>
</tr>

<tr>
<td>Password: </td>
<td><input type="password" name="password"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Login"></td>
</tr>

<tr>
<td colspan="2"><a href="register.php">Create an account</a></td>
</tr>

</table>
</form>


<?php
exit;
}

?>

<html>
<head>
<title>Chat Room</title>

<script
  src="jquery-3.2.1.min.js"
</script>

<script>

function submitChat() {
	if(form1.msg.value == '') {
		alert("Enter your message!!!");
		return;
	}
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert.php?msg='+msg,true);
	xmlhttp.send();

}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});

</script>


</head>
<body>
<form name="form1">
Your Chatname: <b><?php echo $_SESSION['username']; ?></b> <br />
Your Message: <br />
<textarea name="msg"></textarea><br />
<a href="#" onclick="submitChat()">Send</a><br /><br />

<a href="logout.php">Logout</a><br /><br />

</form>
<div id="chatlogs">
LOADING CHATLOG...
</div>

</body>