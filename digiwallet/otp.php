	<?php

	session_start();	
    //update action
$df=isset($_GET['temp'])? $_GET['temp']:'0';
if($df==0){
$sub="For Signup Here Is Your Otp" ;
$to=$_POST['email'];
$_SESSION["uname"]=$_POST['username'];
$_SESSION["pass"]=$_POST['password'];
$_SESSION["rpass"]=$_POST['repeatpassword'];
$_SESSION["city"]=$_POST['city'];
$_SESSION["state"]=$_POST['state'];
$_SESSION["country"]=$_POST['country'];
$_SESSION["email"]=$_POST['email'];
$_SESSION["mno"]=$_POST['mobileno'];
$_SESSION["gender"]=$_POST['gender'];
$_SESSION["dob"]=$_POST['dob'];

$con=rand(1000,9999);
$_SESSION["con"]=$con;
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username ='stproject1234@gmail.com';                 // SMTP username
$mail->Password = 'StProject1234';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('shahviram', 'Mailer');                  
//$mail->AddBCC($opt1[$i], "");
$mail->addAddress($to, 'Viram Shah');
     // Add a recipient
$mail->Subject = $sub;
$mail->Body    = $con;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//$mail->addAddress('ellen@example.com');               // Name is optional
  // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
if(!$mail->send()) {
    echo "<script>alert('Problem')</script>",$mail->ErrorInfo;
    
} else {
    echo "<script>alert('Message has been sent')</script>";
}
}	


?>
<html>
<head>
<style>

/* Full-width input fields */
input[type=text], input[type=password],input[type=email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

</style>
<script>
</script>
</head>
<body>
<center>
<div style="width:50%">
<form action="check.php" method="post" onsubmit="return true" name="signupform" style="border:1px solid #ccc">
<div class ="container">
   <label><b>Enter OTP</b></label>
    <input type="text" placeholder="Enter OTP" name="wotp" required>
</div>
<div class="clearfix">
<button type="reset" class="cancelbtn">Cancel</button>
<button type="submit" class="signupbtn">Signup</button>
</div>
</form>
</div>
</center>
</body>
</html>
