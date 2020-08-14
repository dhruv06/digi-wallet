<?php
	
	session_start();
	$emailid = $_SESSION['admin'];
	include_once("dbcon.php");

	$tid = $_GET['id'];
	//echo $tid;
	//$float = (float) preg_replace('/[^0-9.]/', '', $strNonNumeric);
	
	$qry1 = "SELECT Email1,Amount FROM transactions WHERE TransactionID='$tid'";
	$result=mysqli_query($con,$qry1);
	$row=mysqli_fetch_assoc($result);
	$amount = $row['Amount'];
	$email = $row['Email1'];
	$qry2 = "SELECT Wallet FROM users WHERE Email='$email'";
	$result=mysqli_query($con,$qry2);
	$row=mysqli_fetch_assoc($result);
	$wallet = $row['Wallet'];
	$amount = (float) preg_replace('/[^0-9.]/', '', $amount);
	$wallet = (float) preg_replace('/[^0-9.]/', '', $wallet);
	$wallet = $wallet + $amount;
	$qry3 = "UPDATE users SET Wallet = '$wallet' WHERE Email='$email'";
	mysqli_query($con,$qry3);
	$qry4 = "UPDATE transactions SET Status = 'Successful' WHERE Email1='$email'";
	mysqli_query($con,$qry4);
	$qry5 = "DELETE FROM add_money_requests WHERE TransactionID='$tid'";
	mysqli_query($con,$qry5);
	echo "<script> alert('Request approved successfully'); window.location.href='request_addmoney.php' </script>";

?>