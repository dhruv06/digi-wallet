<?php

	session_start();
	include_once("dbcon.php");
	$emailid = $_SESSION['admin'];
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="h_bar.css">
</head>
<body>	
	<div class="topnav">
		<a href="request_addmoney.php">Request Add money</a>
		<a href="usersinfo.php">User information</a>
		<a href="transactioninfo.php">Transaction Information</a>
		<a href="signout.php">Signout</a>
	</div>
</body>
</html>