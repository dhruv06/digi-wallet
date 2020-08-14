<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once("dbcon.php");

	$newpass = $_POST['newpass'];

	$qry = "UPDATE login_credentials SET Password='$newpass' WHERE Email='$emailid'";
	mysqli_query($con,$qry);
	echo "<script>alert('Password Changed Successfully')</script>";

	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
	}
	session_destroy();

	echo "<script>window.location.href='signin.php'</script>";

?>