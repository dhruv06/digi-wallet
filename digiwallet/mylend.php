<?php
	include_once("menu.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="h_bar.css">
	<title></title>
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
		.removebtn{
			background-color: red;
			padding:5px;
			border-width:1px;
			border-color: black;
			border-radius: 12px;
			cursor: pointer;
		}
		.removebtn:hover{
			background-color: white;	
		}
	</style>
</head>
<body>
	<div class="topnav" style="margin-left:350px;padding:12px">
		<a href="newdebt.php" class="apart">New debt</a>
		<a href="pending_request.php"  class="apart">Pending Request</a>
		<a href="myborrow.php" class="apart">My borrow</a>
		<a href="mylend.php"  class="active" class="apart" >My lend</a>
	</div>


<?php

	
	session_start();
	$emailid = $_SESSION['user'];
	include_once('dbcon.php');
	$qry = "SELECT * FROM debt WHERE ((Email1 = '$emailid' AND Mine = 0) OR (Email2 = '$emailid' AND Mine = 1)) AND Confirm = 1";

	$result = mysqli_query($con,$qry);

	if(mysqli_num_rows($result) == 0){
		echo "<p>No lend requests</p>";
	}
	else{

		echo '<center>';
		echo '<table cellpadding="8" style="margin-top:25px;text-align:center">';
		echo '<tr>';
			echo '<th>Sr.No</th>';
			echo '<th>EmailID</th>';
			echo '<th>Amount</th>';
			echo '<th style="width:70px"></th>';
		echo '</tr>';

		$i = 0;
		while($row = mysqli_fetch_assoc($result)){
			$i++;
			$id = $row['ID'];
			echo '<tr>';
				echo '<td>' . $i .'</td>';
				if($row["Mine"]==0){
					echo '<td>' .$row["Email2"] .'</td>';
					echo '<td>₹' .$row["Money"]. '</td>';
					echo '<td><a href="delete_request2.php?id=' .$id. '"><button class="removebtn">Remove</button></a></td>';
				}
				else{
					echo '<td>' .$row["Email1"] .'</td>';
					echo '<td>₹' .$row["Money"]. '</td>';
					echo '<td> - </td>';
				}
			echo '</tr>';

		}	
		
		echo '</table>'; 
		echo '</center>';

	}

?>



</body>
</html>