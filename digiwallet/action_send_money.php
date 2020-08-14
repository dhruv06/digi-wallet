	<?php

			session_start();
			include_once("dbcon.php");
			include_once("getdatetime.php");
			$emailid = $_SESSION['user'];
			$person = $_POST['person'];
			if($emailid == $person) {

				echo "<script>alert('You cannot send money to yourself')</script>";
				echo "<script>window.location.href='send_money.php'</script>";

			}
			$money = $_POST['money'];
			$qry = "SELECT Wallet FROM users WHERE Email='$emailid'";
			$result = mysqli_query($con,$qry);
			$row = mysqli_fetch_assoc($result);
			$wallet = $row['Wallet'];
			$money = (float) preg_replace('/[^0-9.]/', '', $money);
			$wallet = (float) preg_replace('/[^0-9.]/', '', $wallet);
			if($money>$wallet) {

				echo "<script>alert('Not enough money in the wallet')</script>";
				echo "<script>window.location.href='send_money.php'</script>";

			} else {

				$qry = "SELECT Wallet FROM users WHERE Email='$person'";
				$result = mysqli_query($con,$qry);
				if(mysqli_num_rows($result) == 0) {

					echo "<script>alert('Account non-existent')</script>";
					echo "<script>window.location.href='send_money.php'</script>";

				} else {

					$row = mysqli_fetch_assoc($result);
					$personwallet = $row['Wallet'];
					$personwallet = (float) preg_replace('/[^0-9.]/', '', $personwallet);
					$x = $personwallet+$money;
					$y = $wallet-$money;
					$qry = "UPDATE users SET Wallet = '$x' WHERE Email='$person'";
					mysqli_query($con,$qry);
					$qry = "UPDATE users SET Wallet = '$y' WHERE Email='$emailid'";
					mysqli_query($con,$qry);
					$tid;
					$length = 10;
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				    $charactersLength = strlen($characters);
				    $randomString = '';
				    for ($i = 0; $i < $length; $i++) {
				        $randomString .= $characters[rand(0, $charactersLength - 1)];
				    }

				    $tid = $randomString;

					$qry = "INSERT INTO `transactions` (`TransactionID`, `Email1`, `Email2`, `Amount`, `DateTime`, `Status`) VALUES ('$tid', '$emailid', '$person', '$money', '$datetime', 'successful');";
					mysqli_query($con,$qry);
					echo "<script> alert('Amount sent successfully') </script>";
					echo "<script>window.location.href='myWallet.php'</script>";

				}

			}

	?>
