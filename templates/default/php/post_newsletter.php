<?php
	/*
		Newsletter Subscription
	*/
@session_start();

require_once (dirname (__FILE__) . '/../../../mailchimp/miniMCAPI.class.php');

if(stripslashes($_POST['newsletter_email'])!=''){
	$newsletter_email = stripslashes($_POST['newsletter_email']);
	$to_email = stripslashes($_POST['to_email']);
	
	$subject ="Newsletter subscription";
	
	$message = "Newsletter Subscription: ".$newsletter_email;
	
	$headers = 'From: '.$newsletter_email . "\r\n".'Reply-to: '.$newsletter_email."\r\n".'X-Mailer: PHP/'. phpversion();
	
	@mail($to_email,$subject,$message,$headers);
	
	if($_SESSION['mailchimp_api'] != "" && $_SESSION['mailchimp_active']) {
		$mailchimp_class = new mailchimpSF_MCAPI($_SESSION['mailchimp_api']);
		
		$retval = $mailchimp_class->listSubscribe( $_SESSION['mailchimp_list'], $newsletter_email );

		if(!$mailchimp_class->errorCode){	
			die('ok');
		}else{
			die('0');
		}
	}
	die('ok');
}
?>