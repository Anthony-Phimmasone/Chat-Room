 <?php
 ?>

 <html>
  <head>
   <title>Chat Room</title>

	<script
  src="jquery-3.2.1.min.js"
  </script>

<script>
function submitChat() {
	if(form.username.value == '' || form.message.value == '') {
		alert("All Fields Are Required!");
		return;
	}
	var username = form.username.value;
	var message = form.message.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET','insert.php?username='+uname+'&message='+msg,true);
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
   
    <form name="form">
     Enter Your Name: <input type="text" name="username" /> <br />
     Your Message: <br />
    <textarea name="message"></textarea><br />

    <a href="#" onclick="submitChat()">Send</a><br /><br />
    </form>
   
     <div id="chatlogs">
      LOADING CHAT...
     </div>

   </body>
