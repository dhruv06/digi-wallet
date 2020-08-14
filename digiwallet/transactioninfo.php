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
		<a href="usersinfo.php">User information</a>
		<a href="transactioninfo.php" class="active">Transaction Information</a>
		<a href="signout.php">Signout</a>
	</div>

<?php

	session_start();
	include_once("dbcon.php");
	$emailid = $_SESSION['admin']; 

	$qry = "SELECT * FROM transactions WHERE Email2 <> '' ";

	$result = mysqli_query($con,$qry);


		echo '<br><br>';
		echo '<center><h1>Transfers</h1></center><br>';
	if(mysqli_num_rows($result) == 0){
		echo "<center>No Transfer in database</center>";
	}
	else{
		echo '<center>';
		echo '<table cellpadding="12">';
		echo '<tr>';
			echo '<th>Sr.No</th>';
			echo '<th>TransactionID</th>';
			echo '<th>Sender</th>';
			echo '<th>Receiver</th>';
			echo '<th>Amount</th>';
			echo '<th>DateTime</th>';
			echo '<th>Status</th>';
		echo '</tr>';

		$i = 0;
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			echo '<tr>';
				echo '<td>' . $i .'</td>';
				echo '<td>' .$row["TransactionID"] .'</td>';
				echo '<td>' .$row["Email1"]. '</td>';
				echo '<td>' .$row["Email2"]. '</td>';
				echo '<td>₹' .$row["Amount"] .'</td>';
				echo '<td>' .$row["DateTime"] .'</td>';
				echo '<td>' .$row["Status"] .'</td>';
			echo '</tr>';

		}	
		
	echo '</table>';
	echo '</center>';
		
	}

	$qry2 = "SELECT * FROM transactions WHERE Email2 = ''";

	$result2 = mysqli_query($con,$qry2);


		echo '<br><br>';
		echo '<center><h1>Add Money</h1></center><br>';
	if(mysqli_num_rows($result2) == 0){
		echo "<center>No Add money transactions in database</center>";
	}
	else{
		echo '<center>';
		echo '<table cellpadding="12">';
		echo '<tr>';
			echo '<th>Sr.No</th>';
			echo '<th>TransactionID</th>';
			echo '<th>EmailID</th>';
			echo '<th>Amount</th>';
			echo '<th>DateTime</th>';
			echo '<th>Status</th>';
		echo '</tr>';

		$i = 0;
		while($row2 = mysqli_fetch_assoc($result2)){
			$i++;
			echo '<tr>';
				echo '<td>' . $i .'</td>';
				echo '<td>' .$row2["TransactionID"] .'</td>';
				echo '<td>' .$row2["Email1"]. '</td>';
				echo '<td>₹' .$row2["Amount"] .'</td>';
				echo '<td>' .$row2["DateTime"] .'</td>';
				echo '<td>' .$row2["Status"] .'</td>';
			echo '</tr>';

		}	
		
	echo '</table>';
	echo '</center>';
		
	}

?>



</body>
</html>