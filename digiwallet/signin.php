<!DOCTYPE html>
<html>
<head>
	<title>SIGNIN</title>
	<link rel="stylesheet" type="text/css" href="h_bar.css">
	<style type="text/css">
		.formtable{
			font-family: monospace;
			font-size: 16px;
		}
		.navbar{
			font-size: 100px;
		}
		fieldset{
			box-shadow: 10px 10px 5px gray;
		}
		input{
			border-radius:4px;
			font-family:monospace;
			font-size: 16px;
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
	<div class="topnav">
		<a href="signin.php" class="active">Signin</a>
		<a href="signup.php">SignUp</a>
		<a href="adminsignin.php">Admin Signin</a>
	</div>
	<form action="action_signin.php" method="post">
		<fieldset>
			<table cellpadding="5" class="formtable">
				<tr>
					<td>Email id : </td>
					<td><input type="email" name="emailid" required></td>
				</tr>
				<tr>
					<td>Password : </td>
					<td><input type="password" name="password" id="password" required></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit_signin" value="SignIn" class="btn" style="margin-left:75px "></td>
				</tr>
				<tr>
					<td colspan="2"><a href="forgot_password.php">Forgot Password?</td>
				</tr>
				<tr>
					<td colspan="2"><a href="signup.php">New User? Signup</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>