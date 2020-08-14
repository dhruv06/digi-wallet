<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once('menu.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>DIGIWALLET</title>
</head>
<body>
	<center> <h1> DIGIWALLET </h1> </center>
	<br>
	<p style="margin-left: 200px;">
		Digiwallet is an EWallet based web application developed by three SVNIT students Viraj parmar, Amogh Agrawal and Rahul Lad in October, 2018.<br>
		It allows users to use a virtual wallet in which the users can add money(*upto ₹10,000/-) and<br>
		send money to others(*upto ₹10,000). <br>
		It also includes a unique feature namely My Connections in which the user can keep a record of his debt,<br>
		the people to whom he/she has lended money. <br>
		In case of any queries, please contact this Email Id - digiwallet.official@gmail.com or you may also call this <br>service mobile number 1234567890.
	</p>
</body>
</html>
