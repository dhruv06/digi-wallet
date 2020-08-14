<!DOCTYPE html>
<html>
<head>
	<title>ACTION_SIGNUP</title>
</head>
<body>

<?php

	session_start();

	include_once("dbcon.php");

	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$emailid = $_POST["emailid"];
	$gender = $_POST["gender"];
	$bdate = $_POST["bdate"];
	$mobile = $_POST["mobile"];
	$password = $_POST["password"];

	$x=rand(1000,9999);
	$flag = 1;

	
	
	$qry1 = "INSERT INTO `users` (`Email`, `FirstName`, `LastName`, `MobileNumber`, `DOB`, `Gender`, `Wallet` ,`OTP`) VALUES ('$emailid', '$fname', '$lname', '$mobile', '$bdate', '$gender', 0 ,$x )";

	$qry2 = "INSERT INTO `login_credentials` (`Email`, `Password`) VALUES ('$emailid', '$password')";

	if(mysqli_query($con,$qry1)){
		
		if(mysqli_query($con,$qry2)){
			echo "<script>alert('Account created successfully');</script>";
			$flag = 0;
		}	
		else{
			echo "<script>alert('Unknown Error');</script>";
			$flag = 1;
		}

	}
	else{
		echo "<script>alert('Account already exists');</script>";
		$flag = 1;
	}

	if($flag == 0){
		$_SESSION['user'] = $emailid;
		echo "<script>window.location.href='otpsign.php'</script>";
	}
	else{
		session_destroy();
		echo "<script>window.location.href='signup.php'</script>";
	}
?>


</body>
</html>

