<?php

	session_start();
	$emailid = $_SESSION['user'];
	include_once("dbcon.php");
	include_once("getdatetime.php");

	$money = $_POST['money'];

	$tid;
	$length = 10;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    $tid = $randomString;

	//echo $datetime;

	$qry1 = "INSERT INTO `add_money_requests` (`Email`, `Amount`, `TransactionID`) VALUES ('$emailid', '$money', '$tid')";

	$qry2 = "INSERT INTO `transactions` (`TransactionID`, `Email1`, `Email2`, `Amount`, `DateTime`, `Status`) VALUES ('$tid', '$emailid', '', '$money', '$datetime', 'pending')";

	if(mysqli_query($con,$qry1)){

		if(mysqli_query($con,$qry2)){

			echo "<script>alert('Request sent')</script>";
			echo "<script>window.location.href='myWallet.php'</script>";
		}
		else{
			
			echo "<script>alert('Problem with database')</script>";
			echo "<script>window.location.href='add_money.php'</script>";
		}
	}
	else{

		echo "<script>alert('Unknown error')</script>";
		echo "<script>window.location.href='add_money.php'</script>";
	}

?>