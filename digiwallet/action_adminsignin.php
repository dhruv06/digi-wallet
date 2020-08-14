<?php

	session_start();
	include_once("dbcon.php");

	$emailid = $_POST['emailid'];
	$password = $_POST['password'];

	$qry = "SELECT * FROM `admins` WHERE `Email` = '$emailid' AND `Password` = '$password'";

	$result = mysqli_query($con,$qry);

	if(mysqli_num_rows($result) == 1){

		$_SESSION['admin'] = $emailid;
		echo "<script>window.location.href='admin_main.php'</script>";
	}
	else{

		echo "<script>alert('Invalid EmailID or password')</script>";
		echo "<script>window.location.href='adminsignin.php'</script>";
	}

?>