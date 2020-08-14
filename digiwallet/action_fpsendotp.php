<?php

	session_start();

	include_once('dbcon.php');
	
	$emailid = $_POST['emailid'];
	$_SESSION['user'] = $emailid;

	$qry = "SELECT * FROM login_credentials WHERE Email='$emailid'";
	$result = mysqli_query($con,$qry);

	if(mysqli_num_rows($result)==0){
		if(isset($_SESSION['user'])){
			unset($_SESSION['user']);
		}
		session_destroy();
		echo "<script>alert('Invalid EmailID')</script>";
		echo "<script>window.location.href='forgot_password.php'</script>";
	}
	else{

		$qry1 = "SELECT * FROM forgot_password WHERE Email='$emailid'";
		$result1 = mysqli_query($con,$qry1);

		$x=rand(1000,9999);

		if(mysqli_num_rows($result1)==0){
			
			$qry2 = "INSERT INTO `forgot_password` (`Email`, `OTP`) VALUES ('$emailid', $x)";

			if(mysqli_query($con,$qry2)){
				echo "<script>alert('OTP has beet sent to your Email')</script>";
				echo "<script>window.location.href='fpcheckotp.php'</script>";
			}
			else{
				if(isset($_SESSION['user'])){
					unset($_SESSION['user']);
				}
				session_destroy();
				echo "<script>alert('Unknown Error')</script>";
				echo "<script>window.location.href='forgot_password.php'</script>";
			}

		}
		else{

			$qry3 = "UPDATE forgot_password SET OTP = $x WHERE Email='$emailid'";

			if(mysqli_query($con,$qry3)){
				echo "<script>alert('OTP has beet sent to your Email')</script>";
				echo "<script>window.location.href='fpcheckotp.php'</script>";
			}
			else{
				if(isset($_SESSION['user'])){
					unset($_SESSION['user']);
				}
				session_destroy();
				echo "<script>alert('Unknown Error')</script>";
				echo "<script>window.location.href='forgot_password.php'</script>";
			}			
		}
	}
?>
