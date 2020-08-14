<?php
	
	session_start();
	$emailid = $_SESSION['user'];
	include_once("dbcon.php");
	include_once("menu.php");

	$qry = "SELECT * FROM users WHERE Email='$emailid'";

	$result = mysqli_query($con,$qry);
	$row = mysqli_fetch_assoc($result);

	$firstname = $row['FirstName'];
	$lastname = $row['LastName'];
	$mobile = $row['MobileNumber'];
	$dob = $row['DOB'];
	//$dob = date("Y-m-d", strtotime($dob));
	$gender = $row['Gender'];

?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table{
			font-family: monospace;
			font-size: 20px;
		}
		input{
			font-family: monospace;
			font-size: 20px;	
		}
		#browse {
			display: none;
		}
	</style>
	<script type="text/javascript">
		function validationform(){

			var numbers = /^[0-9]+$/;
			var mno = document.getElementById("mobile").value;

			if(!mno.match(numbers)){
				alert("Enter numbers in Mobile No !!!");
				document.getElementById("mobile").focus();
				return false;	
			}
			if(mno.length != 10){
				alert("Invalid Mobile No !!!");
				document.getElementById("mobile").focus();
				return false;
			}

			x = new Date();
			y = document.getElementById("dob").value;
			var year = parseInt(y.slice(0,4));
			var month = parseInt(y.slice(5,7)) - 1;
			var date = parseInt(y.slice(8,10));
			var z = new Date(year,month,date);
			if(z>x) {
				alert("Invalid birthdate");
				return false;
			}
			if(year == x.getFullYear() && month == x.getMonth() && date == x.getDate()) {
				alert("Invalid birthdate");
				return false;
			}
			x.setFullYear(x.getFullYear()-13,x.getMonth(),x.getDate());
			if(z>x) {
				alert("You are not eligible");
				return false;
			}
			x.setFullYear(x.getFullYear()-115,x.getMonth(),x.getDate());
			if(z<x) {
				alert("Invalid birthdate");
				return false;
			}

		return true;
		}
	</script>
	
</head>
<body>

<?php

	$imgfile = rtrim($emailid,".com");
	$imgfile = $imgfile . "*";
	$target_dir = "uploads/";
	$target_file = $target_dir . $imgfile;

	$result = glob($target_file);

	if(sizeof($result)==0){
		$target_file = $target_dir . "default.png";
	}
	else{
		$target_file = $result[0];	
	}


	echo '<center>';
	echo '<div id="profilepicture">';
		echo '<img src="'.$target_file.'" style="height:200px;width:200px;border:5px solid black;border-radius:50%;">';
	echo '</div>';
		if(sizeof($result)!=0){
			echo '<a href="removepicture.php"><button>Remove Profile photo</button></a>';
		}
	echo '</center>';		

		echo '<center>';
		echo '<form action="updateprofile.php" method="post" enctype="multipart/form-data">';
				echo '<table cellpadding="12">';
					echo '<tr>';
						echo '<td>Change Profile Picture</td>';
						echo '<td><input type="file" name="profilepicture"></td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>EmailID</td>';
						echo '<td>'.$emailid.'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>First name</td>';
						echo '<td><input type="text" name="firstname" value="' . $firstname . '" required></td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Last name</td>';
						echo '<td><input type="text" name="lastname" value="'. $lastname .'" required></td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Mobile number</td>';
						echo '<td><input type="text" name="mobile" value="' .$mobile . '" required></td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Date of birth</td>';
						echo '<td><input type="date" name="dob" id="dob" value="'.$dob.'" required></td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Gender</td>';
						echo '<td>'.$gender.'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td colspan="2"><input type="submit" name="submit_update" value="Update" style="margin-left:150px" onclick="return validationform()"></td>';
					echo '</tr>';
				echo '</table>';
		echo '</form>';
	echo '</center>';

?>

</body>
</html>