
<?php

require_once('class.phpmailer.php');

	 echo $contact_name = $_POST['contact_name'];
	 echo $contact_email = $_POST['contact_email'];
	 echo $contact_text = $_POST['contact_text'];



$username= $contact_name;
$password='laborator223';


// Mesajul
$message = $contact_text;

// În caz că vre-un rând depășește 70 de caractere, trebuie să utilizăm
// wordwrap()
$message = wordwrap($message, 70, "\r\n");


$mail = new PHPMailer(true); 

$mail->IsSMTP();

try {
 
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true; 

  $to='neferu_maria@yahoo.com';
  $nume='10 minute email';
echo $password;
  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 465;                   
  $mail->Username   = $username;  			// GMAIL username
  $mail->Password   = $password;            // GMAIL password
  $mail->AddReplyTo($contact_name, 'Admirator secret');
  $mail->AddAddress($to, $nume);
 
  $mail->SetFrom($contact_name, 'Admirator secret');
  $mail->Subject = 'Form - Contact';
  $mail->AltBody = 'To view this post you need a compatible HTML viewer!'; 
  $mail->MsgHTML($message);
  $mail->Send();
  
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //error from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //error from anything else!
}
?>





<form action = "sendmail.php" method="POST">
		Name:<br><input type="text" name="contact_name"><br><br>
		Email address:<br><input type="text" name="contact_email"><br><br>
		Message:<br>
				<textarea name="contact_text" rows="6" cols="30"></textarea><br><br>
				<input type="submit" value="Send">
				
</form>				