<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once('dbcon.php');

	$id = $_GET['id'];

	$qry = "DELETE FROM debt WHERE ID = '$id'";

	if(mysqli_query($con,$qry)){
		echo "<script>alert('Request Deleted Sucessfully')</script>";
		echo "<script>window.location.href='mylend.php'</script>";
	}
	else{
		echo "<script>alert('Request not Deleted')</script>";
		echo "<script>window.location.href='mylend.php'</script>";
	}

?>