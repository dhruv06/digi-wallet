<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once('dbcon.php');

	$id = $_GET['id'];

	$qry = "UPDATE debt SET Confirm = 1 WHERE ID = $id";

	if(mysqli_query($con,$qry)){
		echo "<script>alert('Approval Sucessful')</script>";
		echo "<script>window.location.href='pending_request.php'</script>";
	}
	else{
		echo "<script>alert('Error in Approval')</script>";
		echo "<script>window.location.href='pending_request.php'</script>";
	}

?>