<?php if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
{
?>
      <a href="logout.php">Logout</a>
<?php }else{ ?>
     <a href="login.php">Login</a>
     
<?php } ?>