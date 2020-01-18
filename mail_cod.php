<?php

require_once('class.phpmailer.php');
require_once('mail_config.php');

// Mesajul
$message = "Buna!\r\nSunt eu, un\r\nPocoLoco.";

// În caz că vre-un rând depășește 70 de caractere, trebuie să utilizăm
// wordwrap()
$message = wordwrap($message, 70, "\r\n");


$mail = new PHPMailer(true); 

$mail->IsSMTP();

try {
 
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true; 

  $to='lida.ghadamiyan@yahoo.com';
  $nume='10 minute email';
echo $password;
  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 465;                   
  $mail->Username   = $username;  			// GMAIL username
  $mail->Password   = $password;            // GMAIL password
  $mail->AddReplyTo('d1305113@urhen.com', 'Admirator secret');
  $mail->AddAddress($to, $nume);
 
  $mail->SetFrom('d1306073@urhen.com', 'Admirator secret');
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
