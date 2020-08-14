<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once("dbcon.php");

	$imgfile = rtrim($emailid,".com");
	$imgfile = $imgfile . "*";
	$target_dir = "uploads/";
	$target_file = $target_dir . $imgfile;

	$result = glob($target_file);

	if(sizeof($result)!=0){
		unlink($result[0]);
	}

	echo "<script>alert('Profile picture removed Sucessfully')</script>";
	echo "<script>window.location.href='profile.php'</script>";

?>