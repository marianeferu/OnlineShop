<?php

	if(isset($_POST['submit'])) {
		
		$name = $_POST['name'];
		$subject = $_POST['subject'];
		$mailForm = $_POST['mail'];
		$message = $_POST['message'];
		
		
		$mailTo = "neferu_maria@yahoo.com";
		$headers ="From: ".$mailForm;
		$txt = "You have received an e-mail from ".$name.".\n\n".$message;
		
		mail($mailTo,$subject,$txt,$headers);
		
		header("Location: contact.php?mailsend");
	}
	
?>