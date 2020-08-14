<!DOCTYPE html>
<html>
<head>
	<title>SIGNIN</title>
	<link rel="stylesheet" type="text/css" href="h_bar.css">

	<style type="text/css">
		#myProgress{
			width:	25%;
			background-color:#ddd;
		}
		#myBar{
			width:	0%;
			height: 30px;
			background-color:#4CAF50;
		} 
		.formtable{
			font-family: monospace;
			font-size: 16px;
		}
		.navbar{
			font-size: 100px;
		}
		fieldset{
			box-shadow: 10px 10px 5px gray;
		}
		input{
			border-radius:4px;
			font-family:monospace;
		}
		.btn{
			width:100px;
			height:30px;
			font-size:16px;
			margin:16px;
			color:#ffffff;
			background-color:#005fff;
			border-radius:8px;
		}
	</style>

	<script type="text/javascript">
		
		function validationform(){

			var numbers = /^[0-9]+$/;
			var mno = document.getElementById("mobile").value;
			var passwd = document.getElementById("password").value;
			var cpasswd = document.getElementById("cpassword").value;

			if(!mno.match(numbers)){
				alert("Enter numbers in Mobile No !!!");
				document.getElementById("mobile").focus();
				return false;	
			}
			if(mno.length != 10){
				alert("Invalid Mobile No !!!");
				document.getElementById("mobile").focus();
				return false;
			}
			if(passwd.length < 8){
				alert("Password length must be 8");
				document.getElementById("password").focus();
				return false;
			}
			if(passwd.length != cpasswd.length){
				alert("Password and Confirm password are different");
				document.getElementById("cpassword").focus();
				return false;
			}

			x = new Date();
			y = document.getElementById("bdate").value;
			var year = parseInt(y.slice(0,4));
			var month = parseInt(y.slice(5,7)) - 1;
			var date = parseInt(y.slice(8,10));
			var z = new Date(year,month,date);
			if(z>x) {
				alert("Invalid birthdate");
				return false;
			}
			if(year == x.getFullYear() && month == x.getMonth() && date == x.getDate()) {
				alert("Invalid birthdate");
				return false;
			}
			x.setFullYear(x.getFullYear()-13,x.getMonth(),x.getDate());
			if(z>x) {
				alert("You are not eligible");
				return false;
			}
			x.setFullYear(x.getFullYear()-115,x.getMonth(),x.getDate());
			if(z<x) {
				alert("Invalid birthdate");
				return false;
			}

		return true;
		}

		function move(score) {

			var elem = document.getElementById("myBar");
			if (score > 80)
        		elem.style.backgroundColor="green";
    		else if (score > 30)
        		elem.style.backgroundColor="yellow";
    		else
        		elem.style.backgroundColor="red";
  			frame();
  			function frame() {
  			elem.style.width = score + '%'; 
  			}
		}
		
		function scorePassword() {
			var pass=document.getElementById("password").value;
    		var score = 0;
    		if (!pass)
        		document.getElementById("p").innerHTML="Password NULL!";

	    // award every unique letter until 5 repetitions
		    var letters = new Object();
		    for (var i=0; i<pass.length; i++) {
		        letters[pass[i]] = (letters[pass[i]] || 0) + 1;
		        score += 5.0 / letters[pass[i]];
		    }

		    // bonus points for mixing it up
		    var variations = {
		        digits: /\d/.test(pass),
		        lower: /[a-z]/.test(pass),
		        upper: /[A-Z]/.test(pass),
		        nonWords: /\W/.test(pass),
		    }

		    variationCount = 0;
		    for (var check in variations) {
		        variationCount += (variations[check] == true) ? 1 : 0;
		    }
		    score += (variationCount - 1) * 10;

		    score=parseInt(score);
		    move(score);
		    if (score > 80)
		        document.getElementById("p").innerHTML="Password Strong!";
		    else if (score > 30)
		        document.getElementById("p").innerHTML="Password Medium!";
		    else
		        document.getElementById("p").innerHTML="Password Weak!";
		}



</script>
</head>

<body>
	<div class="topnav">
		<a href="signin.php">Signin</a>
		<a href="signup.php" class="active">SignUp</a>
		<a href="adminsignin.php">Admin Signin</a>
	</div>
	<form action="action_signup.php" method="post">
		<fieldset>
			<table class="formtable" cellpadding="5">
				<tr>
					<td>First Name : </td>
					<td><input type="text" name="fname" required></td>
				</tr>
				<tr>
					<td>Last Name : </td>
					<td><input type="text" name="lname" required></td>
				</tr>
				<tr>
					<td>Email id : </td>
					<td><input type="email" name="emailid" id="emailid" required></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						Male<input type="radio" name="gender" value="male" checked>
						Female<input type="radio" name="gender" value="female">
					</td>
				</tr>
				<tr>
					<td>Birthdate : </td>
					<td><input type="date" name="bdate" id="bdate" required></td>
				</tr>
				<tr>
					<td>Mobile : </td>
					<td><input type="text" name="mobile" id="mobile" required></td>
				</tr>
				<tr>
					<td>Password : </td>
					<td><input type="password" name="password" id="password" onkeydown="scorePassword()" required></td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
						<div id="myProgress" style="width:168px">
							<div id="myBar" style="width:168px;background-color: lightgrey;height:8px"></div>
						</div>
						<p id="p"></p>
					</td>
				</tr>
				<tr>
					<td>Confirm Password : </td>
					<td><input type="Password" name="cpassword" id="cpassword" required</td>
				</tr>
				<tr><td colspan="2"><input type="checkbox" name="t&c" id="t&C" required><a href="termsandconditions.php" target="_blank">Terms and Conditions</a></td></tr>
				<tr>
					<td><input type="submit" name="submit_signup" onclick="return validationform()" value="Register" class="btn"></td>
					<td><input type="reset" value="Reset" class="btn"></td>
				</tr>

			</table>
		</fieldset>
	</form>
</body>
</html>