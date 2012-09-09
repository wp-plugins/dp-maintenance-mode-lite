<?php
	/*
		Newsletter Subscription
	*/

if($_POST['name']!='' && $_POST['email']!='' && $_POST['message']!=''){
	$email = stripslashes($_POST['email']);
	$name = stripslashes($_POST['name']);
	$message = stripslashes($_POST['message']);
	$to_email = stripslashes($_POST['to_email']);
	$subject ="Contact Form";
	
	$message_email = "Contact Form: \r\n";
	$message_email .= "Name: ".$name."\r\n";
	$message_email .= "Email: ".$email."\r\n";
	$message_email .= "Message: ".$message."\r\n";
	
	$headers = 'From: '.$email . "\r\n".'Reply-to: '.$newsletter_email."\r\n".'X-Mailer: PHP/'. phpversion();

	if(mail($to_email,$subject,$message_email,$headers)==true){	
		die('ok');
	}else{
		die(0);
	}
}
?>