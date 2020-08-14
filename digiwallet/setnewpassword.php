<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once("dbcon.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>DIGIWALLET</title>
		<script type="text/javascript">
		
		function validationform(){

			var passwd = document.getElementById("newpass").value;
			var cpasswd = document.getElementById("cnewpass").value;

			if(passwd.length < 8){
				alert("Password length must be atleast 8");
				document.getElementById("newpass").focus();
				return false;
			}
			if(passwd.length != cpasswd.length){
				alert("Password and Confirm password are different");
				document.getElementById("cnewpass").focus();
				return false;
			}
		return true;
		}

		function move(score) {

			var elem = document.getElementById("myBar");
			if (score > 80)
        		elem.style.backgroundColor="green";
    		else if (score > 30)
        		elem.style.backgroundColor="yellow";
    		else
        		elem.style.backgroundColor="red";
  			frame();
  			function frame() {
  			elem.style.width = score + '%'; 
  			}
		}
		
		function scorePassword() {
			var pass=document.getElementById("newpass").value;
    		var score = 0;
    		if (!pass)
        		document.getElementById("p").innerHTML="Password NULL!";

	    // award every unique letter until 5 repetitions
		    var letters = new Object();
		    for (var i=0; i<pass.length; i++) {
		        letters[pass[i]] = (letters[pass[i]] || 0) + 1;
		        score += 5.0 / letters[pass[i]];
		    }

		    // bonus points for mixing it up
		    var variations = {
		        digits: /\d/.test(pass),
		        lower: /[a-z]/.test(pass),
		        upper: /[A-Z]/.test(pass),
		        nonWords: /\W/.test(pass),
		    }

		    variationCount = 0;
		    for (var check in variations) {
		        variationCount += (variations[check] == true) ? 1 : 0;
		    }
		    score += (variationCount - 1) * 10;

		    score=parseInt(score);
		    move(score);
		    if (score > 80)
		        document.getElementById("p").innerHTML="Password Strong!";
		    else if (score > 30)
		        document.getElementById("p").innerHTML="Password Medium!";
		    else
		        document.getElementById("p").innerHTML="Password Weak!";
		}

	</script>
		<style type="text/css">
			input{
			border-radius:4px;
			font-size: 20px;
			font-family:monospace;
			width:350px;
			}
			.btn{
				width:350px;
				height:40px;
				font-size:20px;
				color:#ffffff;
				background-color:#005fff;
				border-radius:8px;
			}
			body{
				font-size:20px;
			}
			input{
				width:400px;
			}
		</style>
</head>
<body>
	<center><h1>Set New password</h1>

	<form action="action_setnewpassword.php" method="post">
			<table cellpadding="12">
				<tr>
					<td>New Password</td>
					<td><input type="password" name="newpass" id="newpass" onkeydown="scorePassword()" required></td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
						<div id="myProgress" style="width:400px">
							<div id="myBar" style="width:400px;background-color: lightgrey;height:8px"></div>
						</div>
						<p id="p"></p>
					</td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="cnewpass" id="cnewpass" required></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Set Password" onclick="return validationform()" class="btn"></td>
				</tr>
			</table>
	</form>
	</center>
</body>
</html>