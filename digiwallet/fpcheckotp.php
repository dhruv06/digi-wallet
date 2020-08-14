<?php
	
	session_start();
	$emailid = $_SESSION['user'];
	include_once("dbcon.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>DIGIWALLET</title>
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
		</style>
</head>
<body>
	<center><h1>Forgot Password</h1>
	<br>
	<br>
	<br>
	
	<form action="action_fpcheckotp.php" method="post">
			<table cellpadding="12">
				<tr>
					<td>OTP :</td>
					<td><input type="number" name="otp" required></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit_fpotp" value="Check OTP" class="btn"></td>
				</tr>
			</table>
	</form>
	</center>

</body>
</html>