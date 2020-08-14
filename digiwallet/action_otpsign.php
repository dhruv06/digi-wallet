<?php
	
	session_start();
	$emailid = $_SESSION['user']; 

	include_once("dbcon.php");

	$x=rand(1000,9999);
	$otp = $_POST['otp'];

	$qry = "SELECT `OTP` from `users` WHERE `Email` = '$emailid'";

	$result = mysqli_query($con,$qry);

	$row = mysqli_fetch_assoc($result);

	if($row['OTP'] == $otp){
		$qry = "UPDATE `users` SET `OTP`= 0 WHERE `Email` = '$emailid'";
		if(mysqli_query($con,$qry)){
			echo "<script>alert('OTP verified sucessfully')</script>";
			echo "<script>window.location.href='myWallet.php'</script>";		
		}
		else{
			echo "<script>alert('Unknown Error')</script>";
			echo "<script>window.location.href='otpsign.php'</script>";		
		}	 
	}
	else{
		echo "<script>alert('Wrong OTP')</script>";
		echo "<script>window.location.href='otpsign.php'</script>";
	}


?>