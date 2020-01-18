<?php
$pic = "icon2.jpg";
?>

<style type="text/css">
body {
	background-image: url('<?php echo $pic;?>');
	height: 100%;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="container">
	<div class="row">
		<nav class="navbar navbar-inverse" role="navigation">
		  <div class="container">
			

        
        <div class="collapse navbar-collapse navbar-ex1-collapse">
			  <ul class="nav navbar-nav js-nav-add-active-class">
				<li ><a href="home.php">Home</a></li>
				<li ><a href="chitare_electrice.php">Electric guitars</a></li>
				
				<li class="active"><a href="contact.php">Contact</a></li>
				
			  </ul>
			  <ul class="nav navbar-nav navbar-right hidden-xs">
				<a type="button" class="navbar-btn btn btn-gradient-blue" am-latosans="bold" href="multiuserlogin.php">Log in</a>
			  </ul>
			</div>
			 </div>
			</nav>
		</div>
	
	
	
	
	
	
	
<form method = "post" action = "home.php" style="color:white"> 


<?php


$homepage = file_get_contents('https://www.bplans.com/musical_instrument_store_business_plan/products_and_services_fc.php');

$vector = explode('<div id="sample_plan_page_content">', $homepage);
//echo $vector[1];

$content = explode('</p>', $vector[1]); ///h3 id="3.4_Technology"

echo $content[0];

?>
	
	


	
	