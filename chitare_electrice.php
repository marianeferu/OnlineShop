<?php

session_start();
$connect = mysqli_connect("localhost","root","lab223","online_shop");

?>
<html>
<head>

<title style="color:white"> Guitars shop </title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>


	
<div class="container" style="color:white">
	<div class="row">
		<nav class="navbar navbar-inverse" role="navigation">
		  <div class="container">
			

        
        <div class="collapse navbar-collapse navbar-ex1-collapse" style="color:white">
			  <ul class="nav navbar-nav js-nav-add-active-class">
				<li ><a href="home.php">Home</a></li>
				<li ><a href="chitare_electrice.php">Electric guitars</a></li>
			
				<li class="active"><a href="contact.php">Contact</a></li>
				
			  </ul>
			  
			</div>
			 </div>
			</nav>
		</div>	
	

<?php
	$query = "SELECT * FROM products ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-md-3">
            <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
            <div style="border: 1px solid magenta; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
            <img src="<?php echo $row["image"]; ?>" class="img-responsive">
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">$ <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Add to Bag">
            </div>
            </form>
            </div>
            <?php
		}
	}
	?>
 <div style="clear:both"; style="color:white";></div>
    <h2 style="color:white";>My Shopping Bag</h2>
    <div class="table-responsive" >
    <table class="table table-bordered" style="color:white"; >
    <tr style="color:white";>
    <th width="40%">Product Name</th>
    <th width="10%">Quantity</th>
    <th width="20%">Price Details</th>
    <th width="15%">Order Total</th>
    <th width="5%">Action</th>
    </tr>
    <?php
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
            <tr style="color:white";>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"] ?></td>
            <td>$ <?php echo $values["product_price"]; ?></td>
            <td>$ <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
            <td><a href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>
            </tr>
            <?php 
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		?>
        <tr style="color:white";>
        <td colspan="3" align="right">Total</td>
        <td align="right">$ <?php echo number_format($total, 2); ?></td>
        <td></td>
        </tr>
        <?php
	}
	?>
    </table>
	
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
  

   
if(isset($_SESSION['views'])) 
    $_SESSION['views'] = $_SESSION['views']+1; 
else
    $_SESSION['views']=1; 
      
echo"views = ".$_SESSION['views']; 
  


function getUniqueVisitorCount($ip)
{
   
    if(!isset($_SESSION['current_user']))
    {
        $file = 'counter.txt';
        if(!$data = @file_get_contents($file))
        {
            file_put_contents($file, base64_encode($ip));
            $_SESSION['visitor_count'] = 1;
        }
        else{
            $decodedData = base64_decode($data);
            $ipList      = explode(';', $decodedData);

            if(!in_array($ip, $ipList)){
              array_push($ipList, $ip);
              file_put_contents($file, base64_encode(implode(';', $ipList)));
            }
            $_SESSION['visitor_count'] = count($ipList);
        }
        $_SESSION['current_user'] = $ip;
    }
}


$ip = '192.168.1.210'; // $_SERVER['REMOTE_ADDR'];
getUniqueVisitorCount($ip);
echo '   Unique visitor count: ' . $_SESSION['visitor_count'];

 //session_destroy();
?>