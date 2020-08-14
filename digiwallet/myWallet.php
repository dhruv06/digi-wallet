<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once("dbcon.php");
	include_once("menu.php");

	echo '<script>';
		echo 'function getbalance(){';	
				$qry = "SELECT `Wallet` FROM `users` WHERE `Email`='$emailid'";
				$result = mysqli_query($con,$qry);
				$row = mysqli_fetch_assoc($result);
				$balance = $row['Wallet'];
				$balance = "₹".$balance;
				//echo 'alert("' . $balance .'")';
			echo 'document.getElementById("walletdiv").innerHTML = "' . $balance .'"';
		echo '}';
	echo '</script>';
?>

<!DOCTYPE html>
<html>
<head>
	<title> DigiWallet </title>
	<style type="text/css">
		body{
			font-family:monospace;
			font-size: 16px;
		}
		td{
			width: 150px;
			text-align: center;
		}
		.specialdiv{
			height: 125px;
			width: 150px;
			border-radius: 50%;
			padding-top: 25px;
		}
		.specialdiv:hover {
			background-color: lightgrey;
		}
		.overlay {
		  position: absolute;
		  bottom: 0;
		  left: 0;
		  right: 0;
		  background-color: #008CBA;
		  overflow: hidden;
		  width: 100%;
		  height: 100%;
		  -webkit-transform: scale(0);
		  -ms-transform: scale(0);
		  transform: scale(0);
		  -webkit-transition: .3s ease;
		  transition: .7s ease;
		}

		.container {
  			position: relative;
  			width: 370px;
		}

		.container:hover .overlay {
		  -webkit-transform: scale(1);
		  -ms-transform: scale(1);
		  transform: scale(1);
		}

		.text {
		  color: white;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		  font-family: monospace;
		  font-size: 24px;
		}
		body {
		    transition: background-color .5s;
		}
	</style>
</head>
<body>
		<center> 
			<?php
				echo '<div class="container" id="walletdiv" style="margin-top: 25px;font-size:100px">'; 
					echo '<button onclick="getbalance()" style="cursor: pointer; border-radius: 25px;">';
						echo '<img src="wallet.png" height="200px" width="350px">';
						echo '<div class="overlay">';
	    					echo '<div class="text">Check Balance</div>';
	  					echo '</div>';
					echo '</button>';
				echo '</div> ';
			?>
		</center>
		<div align="center" style="margin-top: 45px;">
			<table cellpadding="16px" style="table-layout: fixed;"> 
				<tr>
					<td> 
						<a href="add_money.php" style="color: blue; text-decoration: none;"> 
							<div class="specialdiv"> 
								<img src="add money.png" height="75px;" width="75px;"><br>Add Money
				 	  		</div> 
				 	  	</a>
			 		</td> 
			 		<td>
			 		 	<a href="send_money.php" style="color: blue; text-decoration: none;">
			 		 		 <div class="specialdiv"> <img src="send money.png" height="75px;" width="75px;"><br> 
				 	  			 Send Money
				 	  		</div> 
				 	  	</a>
			 		</td> 
		 			<td> 
		 				<a href="newdebt.php" style="color: blue; text-decoration: none;">
		 					<div class="specialdiv"> <img src="my connections.png" height="75px;" width="75px;"><br> 
				 	  			 My Connections
				 	  		</div>
			 	  		</a>
			 		</td> 
		 			<td>
		 				<a href="transaction_history.php" style="color: blue; text-decoration: none;">
		 					<div class="specialdiv">
		 						<img src="transaction history.png" height="75px;" width="75px;"><br> 
				 	  			 Transaction History
				 	  		</div>
				 	  	</a>
			 		</td> 
		 		</tr> 
		 	</table> 
		 </div>
</body>
</html>