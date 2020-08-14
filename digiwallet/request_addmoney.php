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
		.approvebtn{
			background-color: lightgreen;
			padding:5px;
			border-width:1px;
			border-color: black;
			border-radius: 12px;
			cursor: pointer;
		}
		.approvebtn:hover{
			background-color: white;	
		}

	</style>
</head>
<body>
	<div class="topnav">
		<a href="request_addmoney.php" class="active">Request Add money</a>
		<a href="usersinfo.php">User information</a>
		<a href="transactioninfo.php">Transaction Information</a>
		<a href="signout.php">Signout</a>
	</div>

<?php

	session_start();
	include_once("dbcon.php");
	$emailid = $_SESSION['admin']; 

	$qry = "SELECT * FROM add_money_requests,transactions WHERE add_money_requests.TransactionID = transactions.TransactionID ORDER BY DateTime";

	$result = mysqli_query($con,$qry);


		echo '<br><br>';
	if(mysqli_num_rows($result) == 0){
		echo "<center>No pending add money requests</center>";
	}
	else{
		echo '<center>';
		echo '<table cellpadding="12">';
		echo '<tr>';
			echo '<th>Sr.No</th>';
			echo '<th>EmailID</th>';
			echo '<th>Amount</th>';
			echo '<th>TransactionID</th>';
			echo '<th>Date Time</th>';
			echo '<th></th>';
		echo '</tr>';

		$i = 0;
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			$tid  = $row["TransactionID"];
			echo '<tr>';
				echo '<td>' . $i .'</td>';
				echo '<td>' .$row["Email"] .'</td>';
				echo '<td>' .$row["Amount"]. '</td>';
				echo '<td>' .$row["TransactionID"]. '</td>';
				echo '<td>' .$row["DateTime"] .'</td>';
				echo '<td><a href="add.php?id='. $tid .'"><button class="approvebtn">Approve</button></a></td>';
			echo '</tr>';

		}	
		
	echo '</table>';
	echo '</center>';
		
	}

?>



</body>
</html>