<?php

	session_start();
	include_once("dbcon.php");
	include_once("menu.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title> DIGIWALLET </title>
	<style type="text/css">
		p{
			text-align:center;
		}
		table{
			margin-left: 300px;
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
	<center><h1>Transaction history</h1></center>
	<br>
	<br>
<?php

	$emailid = $_SESSION['user']; 

	$qry = "SELECT * FROM transactions WHERE Email1='$emailid' UNION SELECT * FROM transactions WHERE Email2='$emailid' ORDER BY DateTime DESC";

	$result = mysqli_query($con,$qry);

	if(mysqli_num_rows($result) == 0){
		echo "<p>No transaction history</p>";
	}
	else{

		echo '<table cellpadding="12">';
		echo '<tr>';
			echo '<th>Sr.No</th>';
			echo '<th>TransactionID</th>';
			echo '<th>Sent to</th>';
			echo '<th>Received from</th>';
			echo '<th>Credit</th>';
			echo '<th>Debit</th>';
			echo '<th>Date Time</th>';
			echo '<th>Status</th>';
		echo '</tr>';

		$i = 0;
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			$tid  = $row["TransactionID"];
			echo '<tr>';
			if($row["Email2"]=="") {

				echo '<td>' . $i .'</td>';
				echo '<td>' .$row["TransactionID"] .'</td>';
				echo '<td>-</td>';
				echo '<td>-</td>';
				echo '<td>₹' .$row["Amount"] .'</td>';
				echo '<td>-</td>';
				echo '<td>' .$row["DateTime"] .'</td>';
				echo '<td>' .$row["Status"] .'</td>';

			} else if($row["Email1"]==$emailid) {

				echo '<td>' . $i .'</td>';
				echo '<td>' .$row["TransactionID"] .'</td>';
				echo '<td>' .$row["Email2"]. '</td>';
				echo '<td>-</td>';
				echo '<td>-</td>';
				echo '<td>₹' .$row["Amount"] .'</td>';
				echo '<td>' .$row["DateTime"] .'</td>';
				echo '<td>' .$row["Status"] .'</td>';

			} else {

				echo '<td>' . $i .'</td>';
				echo '<td>' .$row["TransactionID"] .'</td>';
				echo '<td>-</td>';
				echo '<td>' .$row["Email1"]. '</td>';
				echo '<td>₹' .$row["Amount"] .'</td>';
				echo '<td>-</td>';
				echo '<td>' .$row["DateTime"] .'</td>';
				echo '<td>' .$row["Status"] .'</td>';

			}
			echo '</tr>';

		}	
		
	echo '</table>';

		
	}

?>



</body>
</html>