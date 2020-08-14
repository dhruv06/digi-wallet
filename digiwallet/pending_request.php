<?php
	include_once("menu.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="h_bar.css">
	<style type="text/css">
		.apart{
			margin-left:12px;
			margin-right:12px;
		}
		p{
			text-align:center;
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
	<div class="topnav"style="margin-left:350px;padding:12px">
		<a href="newdebt.php" class="apart">New debt</a>
		<a href="pending_request.php"  class="active" class="apart">Pending Request</a>
		<a href="myborrow.php" class="apart">My borrow</a>
		<a href="mylend.php" class="apart">My lend</a>
	</div>
	<br>


<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once('dbcon.php');

	$qry = "SELECT * FROM debt WHERE Email2 = '$emailid' AND Confirm = 0";

	$result = mysqli_query($con,$qry);

	if(mysqli_num_rows($result) == 0){
		echo "<p>No pending requests</p>";
	}
	else{
		echo '<center>';
		echo '<table cellpadding="10" style="margin-top:25px">';
		echo '<tr>';
			echo '<th>Sr.No</th>';
			echo '<th>EmailID</th>';
			echo '<th>Amount</th>';
			echo '<th>Type</th>';
			echo '<th></th>';
		echo '</tr>';

		$i = 0;
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			$id = $row['ID'];
			echo '<tr>';
				echo '<td>' . $i .'</td>';
				echo '<td>' .$row["Email1"] .'</td>';
				echo '<td>₹' .$row["Money"]. '</td>';

				if($row["Mine"]==1){
					echo '<td>Lend Request</td>';
				}
				else{
					echo '<td>Borrow Request</td>';
				}

				echo '<td><a href="approve_request.php?id='. $id .'"><button class="approvebtn">Approve</button></a></td>';
			echo '</tr>';

		}	
		
		echo '</table>';
		echo '</center>'; 
	}

?>


</body>
</html>