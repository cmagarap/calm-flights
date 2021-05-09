<?php
include_once("db_connect.php");
require 'PHPMailer/PHPMailerAutoload.php';

///////////////////////////////////////
// if(isset($_POST['register'])) {
//     if(isset($_POST['txtCaptcha']) and $_POST['txtCaptcha'] !=''){
//         if($_SESSION['captcha_text'] == $_POST['txtCaptcha']){
//         include('register.php');
//         }
//         else{
//             $message = "Captcha didn't match!";
//             echo "<script type='text/javascript'>alert('$message');</script>";
//         }					
//     }
// }

$fname = ucwords(trim($_POST['fname']));
$lname = ucwords(trim($_POST['lname']));
$email = $_POST['email'];
$pwd = md5($_POST['pwd']);
$status = "user";
$code = $generatedKey = sha1(mt_rand(10000,99999).time().$email);

///////////////////////////////////////


///////////////////////////////////////

$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; // 
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "veocalimlim@gmail.com";
$mail->Password = "elevenunitedcrowns";

///////////////////////////////////////

$result = mysqli_query($db_connect,"INSERT INTO users (fname, lname, email, password, code, status, active) 
VALUES ('$fname','$lname','$email', '$pwd', '$code', '$status', 0 )");

$link = "<a href='http://calmflights.x10host.com/flight/activate.php?activate?code=$code>link </a>";
$msg = "Welcome to CALM Flights! Kindly click this ".$link ." to activate your account!";

$mail->setFrom('veocalimlim@gmail.com', 'CALM Flights');
$mail->addAddress($email, $fname . " ". $lname);
$mail->Subject  = 'CALM Flights Account Activation';
//print_r($code);die();
$mail->Body     = '<div style = "border: solid #ccc 2px; width: 650px; height: 550px; padding: 20px background: #f5f5db;">
		<div style = "background: #ccc; padding: 15px">
			<center>
				<br><h2>Password Reset</h2>
			</center>
		</div>
		<p>
			<br>Hello, <br><br>
			Welcome to CALM Flights! Kindly click this <a href="localhost/flight/activate.php?code='.$code.'">link </a> to activate your account!
		</p>
		<br><br><br>
		Thank you for choosing Calm Flights. <br><br>
		Sincerely,<br>
		The Calm Flight team
		</div>
		';

if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}

///////////////////////////////////////
//print_r($result);die();

// if($result){
//     echo "<script>alert('Successfully registered your account!')";
// }
// else{
//     echo "<script>alert('Failed to register your account!')" . mysqli_error($db_connect);
// }
header("Location: index.php");


if($result){
    echo "<script>alert('Successfully registered your account!');";
    echo 'window.location.href="index.php" </script>';
}
else{
    echo "<script>alert('Failed to register your account!'); " . mysqli_error($db_connect);
    echo 'window.location.href="index.php" </script>';
}
?>