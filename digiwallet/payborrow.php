<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once('dbcon.php');
	include_once('getdatetime.php');

	$id = $_GET['id'];

	$qry1 = "SELECT * FROM debt WHERE ID = $id";
	$result = mysqli_query($con,$qry1);
	$row = mysqli_fetch_assoc($result);
	$amount = $row['Money'];
	$temp = $row['Email1'];

	if($temp == $emailid){
		$receiver = $row['Email2'];
	}
	else{
		$receiver = $temp;
	}

	$qry2 = "SELECT Wallet FROM users WHERE Email='$emailid'";
	$result2 = mysqli_query($con,$qry2);
	$row2 = mysqli_fetch_assoc($result2);
	$sWallet = $row2['Wallet'];
	$amount = (float) preg_replace('/[^0-9.]/', '', $amount);
	$sWallet = (float) preg_replace('/[^0-9.]/', '', $sWallet);

	if($amount > $sWallet){
		echo "<script>alert('Not Enough Money in your Wallet')</script>";
		echo "<script>window.location.href='myborrow.php'</script>";
	}
	else{

	$sWallet = $sWallet - $amount;
	
	$qry3 = "SELECT Wallet FROM users WHERE Email='$receiver'";
	$result3 = mysqli_query($con,$qry3);
	$row3 = mysqli_fetch_assoc($result3);
	$rWallet = $row3['Wallet'];
	$rWallet = (float) preg_replace('/[^0-9.]/', '', $rWallet);

	$rWallet = $rWallet + $amount;

	$qry4 = "UPDATE users SET Wallet='$sWallet' WHERE Email='$emailid'";
	$qry5 = "UPDATE users SET Wallet='$rWallet' WHERE Email='$receiver'";

	if(mysqli_query($con,$qry4)){

		if(mysqli_query($con,$qry5)){

			$qry6 = "DELETE FROM debt WHERE ID=$id";

			if(mysqli_query($con,$qry6)){
				$tid;
				$length = 10;
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $charactersLength = strlen($characters);
			    $randomString = '';
			    for ($i = 0; $i < $length; $i++) {
			        $randomString .= $characters[rand(0, $charactersLength - 1)];
			    }

			    $tid = $randomString;

				$qry7 = "INSERT INTO `transactions` (`TransactionID`, `Email1`, `Email2`, `Amount`, `DateTime`, `Status`) VALUES ('$tid', '$emailid', '$receiver', '$amount', '$datetime', 'Successful')";

				mysqli_query($con,$qry7);

				echo "<script>alert('Amount sent Successfully')</script>";
				echo "<script>window.location.href='myborrow.php'</script>";

			}
			else{
				echo "<script>alert('Error in Database')</script>";
				echo "<script>window.location.href='myborrow.php'</script>";
			}
		}
		else{
			echo "<script>alert('Error in Database')</script>";
			echo "<script>window.location.href='myborrow.php'</script>";
		}
	}
	else{
		echo "<script>alert('Money not sent')</script>";
		echo "<script>window.location.href='myborrow.php'</script>";
	}
	}

?>