<?php
	include "phpmailer/PHPMailerAutoload.php";
	# require("phpmailer/class.phpmailer.php");

	$gmailUsername = "veocalimlim@gmail.com";
	$gmailPassword = "elevenunitedcrowns";

	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->Username = $gmailUsername;
	$mail->Password = $gmailPassword;
	$mail->IsHTML(true);
	#$mail->AddEmbeddedImage('calm.png', 'calm', 'calm.png'); # attach image, and later link to it using identfier calm

	$mail->SetFrom($gmailUsername, "Calm Flight");

	# FOR VERIFICATION
	$mail->Subject = 'Calm Flight Password Reset';
	# MESSAGE: 
	$mail->Body = "<div style = 'border: solid #ccc 2px; width: 650px; height: 550px; padding: 20px background: #f5f5db;'>
		<div style = 'background: #ccc; padding: 15px'>
			<center>
				<br><h2>Password Reset</h2>
			</center>
		</div>
		<p>
			<br>Hello $first_name, <br><br>
			You have requested password reset!<br>
			Please click this <a href = 'http://localhost/flight/reset.php?email=$email&code=$code'>link </a>to reset your password.      
		</p>
		
		<br><br><br>
		Thank you for being an asset to Calm Flight.<br><br>
		Sincerely,<br>
		The Calm Flight team
	</div>";
	$mail->AddAddress($email);

	if(!$mail->Send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else {
	    echo "<script>alert('Reset password has been sent.')</script>";
	}
?>