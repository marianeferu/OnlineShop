<?php

if(isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_text']))
	
	 echo $contact_name = $_POST['contact_name'];
	 echo $contact_email = $_POST['contact_email'];
	 echo $contact_text = $_POST['contact_text'];
	
	
	if(!empty($contact_name) && !empty($contact_email) && !empty($contact_text))
	{	
		$to = 'neferu_maria@yahoo.com';
		$subject = 'Contact form submitted';
		$body = $contact_name."\n".$contact_text;
		$headers = 'From: '.$contact_email;
		
		if(mail($to, $subject, $body, $headers))
		{
			echo 'Thank you!';
		}
		else {
			echo 'Sorry, an error occured.Please try again later.';
		}
		
	}
	
	else {
		echo 'All fields are required.';
	}
	
?>
