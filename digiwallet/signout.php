<?php
	session_start();
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
	}
	if(isset($_SESSION['admin'])){
		unset($_SESSION['admin']);
	}
	session_destroy();
	echo "<script>alert('Signout Sucessful')</script>";
	echo "<script>window.location.href='signin.php'</script>";
?>