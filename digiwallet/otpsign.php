<!DOCTYPE html>
<html>
<head>
	<title>DIGIWALLET</title>
	<style type="text/css">
		.formtable{
			font-family: monospace;
			font-size: 16px;
		}
		fieldset{
			box-shadow: 10px 10px 5px gray;
		}
		input{
			border-radius:4px;
			font-family:monospace;
		}
		.btn{
			width:75px;
			height:30px;
			font-size:16px;
			margin:16px;
			color:#ffffff;
			background-color:#005fff;
			border-radius:8px;
		}
	</style>
</head>
<body>
	
	<br>OTP has been sent to your email id<br>

	<form action="action_otpsign.php" method="post">
		<fieldset>
			<table class="formtable" cellpadding="12">
				<tr>
					<td>OTP :</td>
					<td><input type="number" name="otp"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit_otp" class="btn"></td>
					<td><a href="otpresend.php">Resend OTP</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>