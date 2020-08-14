<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once("dbcon.php");

	$qry = "SELECT * FROM users WHERE Email='$emailid'";

	$result = mysqli_query($con,$qry);
	$row = mysqli_fetch_assoc($result);

	$fn = $row['FirstName'];
	$ln = $row['LastName'];
	$mob = $row['MobileNumber'];
	$d = $row['DOB'];

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
	$propic = $_FILES['profilepicture']['name'];

	if(($fn == $firstname) && ($ln == $lastname) && ($mob == $mobile) && ($dob == $d) && !$propic){
		echo "<script>alert('Nothing is changed')</script>";
		echo "<script>window.location.href='profile.php'</script>";
	}
	else{

		$qry = "UPDATE `users` SET `FirstName` = '$firstname',`LastName`='$lastname',`MobileNumber`='$mobile',`DOB`='$dob' WHERE Email='$emailid'";

		mysqli_query($con,$qry);


		if($propic){


			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["profilepicture"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if(isset($_POST["submit_update"])) {

				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") { 
		    		echo "<script>alert('only jpg,jpeg and png formats are allowed')</script>";
				}
				else{

					
					$imgfile1 = rtrim($emailid,".com");
					$imgfile = $imgfile1 . ".*";
					$target_file = $target_dir . $imgfile;
					$ext = '.' . $imageFileType;
					
					$result = glob($target_file);

					if(sizeof($result)!=0){
						unlink($result[0]);
					}

					$target_file = $target_dir . $imgfile1 . $ext;

					if (move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $target_file)) {
			        	echo "<script>alert('Profile picture changed Sucessfully')</script>";
			    	} 
			    	else{
			        	echo "<script>alert('Profile picture not changed')</script>";
			    	}
				}	    	
			}
		}
		echo "<script>alert('Profile updated Sucessfully')</script>";
		echo "<script>window.location.href='profile.php'</script>";

	}

?>