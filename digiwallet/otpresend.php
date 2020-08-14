<?php
	
	session_start();
	$emailid = $_SESSION['user']; 

	include_once("dbcon.php");

	$x=rand(1000,9999);

	$qry = "UPDATE `users` SET `OTP`= $x WHERE `Email` = '$emailid'";

	if(mysqli_query($con,$qry)){
		echo "<script>alert('OTP has been resent to your emailid');</script>";
		echo "<script>window.location.href='otpsign.php'</script>";		
	}	
	else{
		echo "<script>alert('Unknown Error');</script>";
		echo "<script>window.location.href='otpsign.php'</script>";
	}


?>