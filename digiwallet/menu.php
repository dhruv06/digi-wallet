<!DOCTYPE html>
<html>
<head>
	<script>
	function openNav() {
	    document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
	    document.getElementById("mySidenav").style.width = "0";
	}
	</script>
	<style type="text/css">
		body{
			font-family:monospace;
			font-size: 16px;
		    transition: background-color .5s;
		}

		.sidenav {
		    height: 100%;
		    width: 0;
		    position: fixed;
		    z-index: 1;
		    top: 0;
		    left: 0;
		    background-color: white;
		    overflow-x: hidden;
		    transition: 0.5s;
		    padding-top: 60px;
		}

		.sidenav a {
		    padding: 8px 8px 8px 32px;
		    text-decoration: none;
		    font-size: 20px;
		    color: black;
		    display: block;
		    transition: 0.3s;
		}

		.sidenav a:hover {
		    color: blue;
		}

		.sidenav .closebtn {
		    position: absolute;
		    top: 0;
		    right: 25px;
		    font-size: 20px;
		    margin-left: 50px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 20px;}
		}
	</style>
</head>
<body>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="myWallet.php">home</a>
		  <a href="profile.php">profile</a>
		  <a href="add_money.php">Add Money</a>
		  <a href="send_money.php">Send Money</a>
		  <a href="newdebt.php">My Connections</a>
		  <a href="transaction_history.php">Transaction History</a>
		  <a href="change_password.php">Change password</a>
		  <a href="aboutus.php">about us</a>
		  <a href="signout.php">signout</a>
		</div>
		<span style="font-size:30px;cursor:pointer;float:left" onclick="openNav()">&#9776; menu</span>
</body>
</html>