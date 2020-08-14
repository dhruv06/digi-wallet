<?php

	session_start();
	include_once("dbcon.php");

	$x=rand(1000,9999);
	$emailid = $_POST['emailid'];
	$password = $_POST['password'];

	$qry = "SELECT * from `login_credentials` WHERE `Email` = '$emailid' AND `Password` = '$password'";

	$result = mysqli_query($con,$qry);

	if(mysqli_num_rows($result) == 1){

		$qry = "SELECT * from `users` WHERE `Email` = '$emailid' AND `OTP` = 0";
		$result = mysqli_query($con,$qry);
		$_SESSION['user'] = $emailid;
		if(mysqli_num_rows($result) == 1){
			
			echo "<script>window.location.href='myWallet.php'</script>";
		}
		else{

			echo "<script>alert('Your account is not verified, Please verify your account')</script>";
			echo "<script>window.location.href='otpsign.php'</script>";
		}

	}
	else{
		echo "<script>alert('Invalid EmailID or Password')</script>";
		echo "<script>window.location.href='signin.php'</script>";
	} 

?>