<?php

	session_start();
	include_once('dbcon.php');	
	$emailid = $_SESSION['user'];

	$qry = "SELECT * FROM forgot_password WHERE Email='$emailid'";
	$result = mysqli_query($con,$qry);
	$row = mysqli_fetch_assoc($result);
	$otp1 = $row['OTP'];

	$otp = $_POST['otp'];

	if($otp != $otp1){
		echo "<script>alert('Invalid OTP')</script>";
		echo "<script>window.location.href='fpcheckotp.php'</script>";		
	}
	else{
		echo "<script>alert('Set new password')</script>";
		echo "<script>window.location.href='setnewpassword.php'</script>";
	}

?>
