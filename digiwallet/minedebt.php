<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once('dbcon.php');
	include_once('menu.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>DIGIWALLET</title>
	<link rel="stylesheet" type="text/css" href="h_bar.css">
	<style type="text/css">
		.apart{
			margin-left:12px;
			margin-right:12px;
		}
		.formtable{
			font-family: monospace;
			font-size: 24px;
			margin-top: 100px;
		}
		.navbar{
			font-size: 100px;
		}
		fieldset{
			box-shadow: 10px 10px 5px gray;
		}
		input{
			border-radius:4px;
			font-size: 24px;
			font-family:monospace;
		}
		.btn{
			width:400px;
			height:40px;
			font-size:24px;
			margin:16px;
			color:#ffffff;
			background-color:#005fff;
			border-radius:8px;
		}
	</style>
	<script type="text/javascript">
		function check() {

			var x = document.getElementById('money').value;

			x = parseInt(x);
			if(isNaN(x)){
				alert("Invalid amount");
				return false;
			}
			if(x<=0) {
				alert("Invalid amount");
				return false;
			} 
			return true;
		}

	</script>
</head>
<body>
	<div class="topnav" style="margin-left:350px;padding:12px">
		<a href="newdebt.php" class="apart">New debt</a>
		<a href="minedebt.php"  class="active" class="apart">Mine debt</a>
		<a href="pending_request.php"  class="apart">Pending Request</a>
		<a href="myborrow.php" class="apart">My borrow</a>
		<a href="mylend.php" class="apart">My lend</a>
	</div>
	<center>
		<form action="action_minedebt.php" method="post">
		<table cellpadding="12" class="formtable">
			<tr>
				<td><b>EmailID :</b></td>
				<td><input type="email" name="email" id="email" style="width: 500px" required> </td>
			</tr>
			<tr>
				<td><b>Amount :</b></td>
				<td><input type="text" name="money" id="money" style="width: 500px" required> </td>
			</tr>
			<tr>
				<td></td>
				<td><center> <input type="submit" onclick="return check()" value="MAKE MINE DEPT REQUEST" class="btn"> </center></td>
			</tr>
		</table>
		</form>
	</center>
</body>
</html>