<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once('dbcon.php');

	$email = $_POST['email'];
	$amount = $_POST['money'];

	if($email == $emailid){
		echo "<script>alert('You cannot have dept on own')</script>";
		echo "<script>window.location.href='newdebt.php'</script>";		
	}
	else{

		$qry1 = "SELECT Email FROM login_credentials WHERE Email='$email'";

		$result1 = mysqli_query($con,$qry1);

		if(mysqli_num_rows($result1) == 0){
			echo "<script>alert('Given EmailID is not registerd')</script>";
			echo "<script>window.location.href='newdebt.php'</script>";	
		}
		else{

			$qry2 = "INSERT INTO `debt` (`Email1`, `Email2`, `Money`, `Confirm`,`Mine`) VALUES ('$emailid', '$email', '$amount', 0, 0)";
			
			if(mysqli_query($con,$qry2)){
				echo "<script>alert('New Debt Request Sent')</script>";
				echo "<script>window.location.href='newdebt.php'</script>";		
			}
			else{
				echo "<script>alert('Unknown Error')</script>";
				echo "<script>window.location.href='newdebt.php'</script>";
			}

		}
	}

?>