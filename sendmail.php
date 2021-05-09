<?php
include "phpmailer/PHPMailerAutoload.php";
$gmailUsername = "veocalimlim@gmail.com";//Gmail username to be use as sender(make sure that the gmail settings was ON or enable)
$gmailPassword = "elevenunitedcrowns";//Gmail Password used for the gmail 
error_reporting(0);
//////////////////////////////////////
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; // 
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = $gmailUsername;
$mail->Password = $gmailPassword;
/////////////////////////////////////


$mail->SetFrom($gmailUsername,"Calm Flight");
$mail->Subject = $_POST['form_subject'];
$mail->Body = "Location".$row['Location']; 
$mail->AddAddress($_POST['email']);

?>
