<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once("dbcon.php");

	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];

	$qry = "SELECT * FROM login_credentials WHERE Email='$emailid'";

	$result = mysqli_query($con,$qry);

	$row = mysqli_fetch_assoc($result);

	if($row['Password'] == $oldpass){

		$qry = "UPDATE login_credentials SET Password='$newpass' WHERE Email='$emailid'";
		mysqli_query($con,$qry);
		echo "<script>alert('Password Changed Successfully')</script>";
		echo "<script>window.location.href='myWallet.php'</script>";
	}
	else{
		echo "<script>alert('Invalid Old Password')</script>";
		echo "<script>window.location.href='change_password.php'</script>";
	}

?>