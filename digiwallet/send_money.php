<?php
	include_once("menu.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title> DigiWallet </title>
	<style type="text/css">
		.formtable{
			font-family: monospace;
			font-size: 24px;
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
			width:125px;
			height:40px;
			font-size:24px;
			margin:16px;
			color:#ffffff;
			background-color:#005fff;
			border-radius:8px;
		}
	</style>
	<script>
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

			} else if(x>10000) {

				alert("Amount limit exceeded, Maximum amount: Rs 10,000/-");
				return false;

			} else 
				return true;

		}

		function add1000() {

			var x = document.getElementById('money').value;
			if(x == '')
				x = '0';
			x=parseInt(x);
			x+=1000;
			if(x > 10000){
				alert("Amount limit exceeded, Maximum amount: Rs 10,000/-");
				return;
			}
			document.getElementById('money').value = x;
			

		}

		function add1500() {

			var x = document.getElementById('money').value;
			if(x == '')
				x = '0';
			x=parseInt(x);
			x+=1500;
			if(x > 10000){
				alert("Amount limit exceeded, Maximum amount: Rs 10,000/-");
				return;
			}
			document.getElementById('money').value = x;

		}

		function add2000() {

			var x = document.getElementById('money').value;
			if(x == '')
				x = '0';
			x=parseInt(x);
			x+=2000;
			if(x > 10000){
				alert("Amount limit exceeded, Maximum amount: Rs 10,000/-");
				return;
			}
			document.getElementById('money').value = x;	
		}
			
	</script>
</head>
<body>
	<center><h1>Send money</h1></center>
	<br>
	<br>
	<br>
	<center>
		<form action="action_send_money.php" method="post">
		<table cellpadding="12" class="formtable">
			<tr>
				<td><b>Send To:</b></td>
				<td><input type="text" name="person" id="person" style="width: 500px" required> </td>
			</tr>
			<tr>
				<td><b>Amount:</b></td>
				<td><input type="text" name="money" id="money" style="width: 500px" required> </td>
			</tr>
			<tr>
				<td> </td>
				<td> <input type="button" onclick="add1000()" value="+₹1000" class="btn"> <input type="button" onclick="add1500()" value="+₹1500" class="btn"> <input type="button" onclick="add2000()" value="+₹2000" class="btn"> </td>
			</tr>
			<tr>
				<td> </td>
				<td><center> <input type="submit" onclick="return check()" value="Send" class="btn"> </center></td>
			</tr>
		</table>
		</form>
	</center>
</body>
</html>