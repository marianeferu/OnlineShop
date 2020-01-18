<html>
<head>
<title>
GuitarShop
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><img src="icon.jpg" height="400" width="300"></center><br>

<div class="container">
	<div class="row">
		<nav class="navbar navbar-inverse" role="navigation">
		  <div class="container">
			

        
        <div class="collapse navbar-collapse navbar-ex1-collapse">
			  <ul class="nav navbar-nav js-nav-add-active-class">
				<li ><a href="home.php">Home</a></li>
				<li ><a href="chitare_electrice.php">Electric guitars</a></li>
				
				<li class="active"><a href="contact.php">Contact</a></li>
				<li class="visible-xs-block">Log in</li>
			  </ul>
			  
			</div>
			 </div>
			</nav>
		</div>
	
	<div class="paragraphs1">
		  <div class="row">
			<div class="span4">
				<div class="clearfix content-heading">
					<div class="shadow">GuitarShop Bucuresti</div>
					
					<div class="map">
						<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDAE1SA5B815cBhhBGKMjhYwwLmuWR6w18'></script>
						<div style='overflow:hidden;height:400px;width:520px;'>
						<div id='gmap_canvas' style='height:400px;width:520px;'>
						</div>
						<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
						</div> <a href='https://www.symptoma.ro/'>symptoma.ro</a>
						<script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=69356f6ee8263b829f03c50cdbcff9b22cf23213'></script>
						<script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(44.4351979,26.0996322),mapTypeId: google.maps.MapTypeId.ROADMAP};
						map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(44.4351979,26.0996322)});
						infowindow = new google.maps.InfoWindow({content:'<strong>GuitarShop</strong><br>Academiei nr 14<br> Bucharest<br>'});
						google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
					</div>
					
					<div class="infoc" style="color:white">
					Adresa: <div class="colorc"> Academiei nr14</div>
					Mijloace de transport: <div class="colorc">Metrou Unirii</div> <div class="colorc">Tramvaie: 1,23,27</div> <div class="colorc">Autobuze: 135, 634, 330</div>
					Telefon: <div class="colorc">0314564322</div>
					Program: <div class="colorc">Luni-Vineri: 09:00-21:00</div><div class="colorc">Weekend: 12:00-17:00</div>
					</div>
				</div>
			</div>
		  </div>
	</div>
</div>
</body>
</html>


<?php
$pic = "bg.jpg";
?>

<style type="text/css">
body {
background-image: url('<?php echo $pic;?>');

}
</style>



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





<form action = "contact.php" method="POST" >
		<h5 style="color:white">Name:</h5><br><input type="text" name="contact_name"><br><br>
		<h5 style="color:white"> Email address:</h5><br><input type="text" name="contact_email"><br><br>
		<h5 style="color:white">Message:</h5><br>
				<textarea name="contact_text" rows="6" cols="30"></textarea><br><br>
				<input type="submit" value="Send">
				
</form>				

















