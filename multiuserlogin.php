<?php

$servername = "localhost";
$username = "root";
$password = "lab223";
$dbname = "multiuserlogin";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if(isset($_POST['Login'])) {
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$usertype = $_POST['usertype'];
	$query = "SELECT * FROM `multiuserlogin` WHERE 
			username='".$user."' and password = '".$pass."' and usertype = '".$usertype."'";
	
	
$result = mysqli_query($conn, $query);			
if($result)
{
	while($row = mysqli_fetch_array($result))
	{
		echo'<script type = "text/javascript">alert("you are login successfully and you are logined as '.$row['usertype'].'")</script>';
		
	}
	
	if($usertype=="admin")
	{
		?>
		
		<script type = "text/javascript">
		window.location.href = "admin.php"</script>
		
		<?php
		
	}else{
		?>
		<script type = "text/javascript">
		window.location.href = "user.php"</script>
		
		<?php
		}
		
		
		
	}
	
}
	


?>

<html>
<head>

<meta charset = "utf-8">

<title> Login </title>

</head>


<body>
<h2 style=" color:white;"> LOGIN </h2>
<form method = "post" style="color:white">

	<table>
		<tr style="color:white">
			<td> Username : <input type = "text" name = "user" placeholder="enter your username" </td>
		</tr>

		<tr style="color:white">
			<td> Password : <input type = "text" name = "pass" placeholder="enter your password" </td>
			
		</tr>
		
		<tr style="color:white">
			<td>
				Select user type: 
				<select name= "usertype">
					<option value = "admin" > admin </option>
					<option value = "user" > user </option>
				</select>
			</td>
		</tr>
		
		<tr style="color:white">
			<td> <input type = "submit" name = "Login" value = "Login"</td>
		</tr>
	</table>
	
</body>
</html>
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

		
		

		
			