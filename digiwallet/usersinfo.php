<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="h_bar.css">
		<style type="text/css">
		body{
			font-family: monospace;
			font-size: 16px;
		}
		table{
			border-color: black;
			border-width: 2px;
			border-style: solid;
			border-collapse: collapse;
		}
		th{
			border-color: black;
			border-width: 2px;
			border-style: solid;
			background-color: lightblue;			
		}
		td{
			border-color: black;
			border-width: 2px;
			border-style: solid;
			background-color: lightgrey;	
		}
	</style>
</head>
<body>
	<div class="topnav">
		<a href="request_addmoney.php">Request Add money</a>
		<a href="usersinfo.php" class="active">User information</a>
		<a href="transactioninfo.php">Transaction Information</a>
		<a href="signout.php">Signout</a>
	</div>

<?php

	session_start();
	include_once("dbcon.php");
	$emailid = $_SESSION['admin']; 

	$qry = "SELECT * FROM users WHERE 1";

	$result = mysqli_query($con,$qry);


		echo '<br><br>';
	if(mysqli_num_rows($result) == 0){
		echo "<center>No Users in database</center>";
	}
	else{
		echo '<center>';
		echo '<table cellpadding="12">';
		echo '<tr>';
			echo '<th>Sr.No</th>';
			echo '<th>First name</th>';
			echo '<th>Last name</th>';
			echo '<th>EmailID</th>';
			echo '<th>Mobile number</th>';
			echo '<th>Gender</th>';
			echo '<th>Birthdate</th>';
			echo '<th>Wallet</th>';
		echo '</tr>';

		$i = 0;
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			echo '<tr>';
				echo '<td>' . $i .'</td>';
				echo '<td>' .$row["FirstName"] .'</td>';
				echo '<td>' .$row["LastName"]. '</td>';
				echo '<td>' .$row["Email"]. '</td>';
				echo '<td>' .$row["MobileNumber"] .'</td>';
				echo '<td>' .$row["DOB"] .'</td>';
				echo '<td>' .$row["Gender"] .'</td>';
				echo '<td>₹' .$row["Wallet"] .'</td>';
			echo '</tr>';

		}	
		
	echo '</table>';
	echo '</center>';
		
	}

?>



</body>
</html>