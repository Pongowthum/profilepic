<!DOCTYPE html>
<html>
<head>
	<title>SIGN IN</title>
</head>
<body>
<form action="profilesignin.php" method="POST" enctype="multipart/form-data">
	<center><br><br><br><br>
	Username
	<input type="text" name="name" required="required">
	<br><br>
	Password
	<input type="password" name="pass" required="required">
	<br><br>
	<input type="file" name="profilepic" class="profilepic" id="profilepic" required="required">
	<br><br>
	<input type="submit" name="submit" value="Register">
	</center>
</form>
<center>
	<br><br>
	<a href="loginpic.php">LOGIN</a>
</center>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	$username=$_POST['name'];
	$password=$_POST['pass'];
	$filename=$_FILES["profilepic"]["name"];
	$con=mysqli_connect("localhost","root","","profilepicdemo");
	if(!empty($filename)){
		move_uploaded_file($_FILES["profilepic"]["tmp_name"],"pic/$username.jpeg");
			$insert_user="insert into profile (username,password,path) values('$username','$password','pic/$username.jpeg')";
			$query=mysqli_query($con,$insert_user);				
	echo "<script>alert('Registration success,Redirect to login page?')</script>";
	echo "<script>window.open('loginpic.php','_self')</script>";
}
else{
	echo "failed";
	echo "<script>alert('Registration failed!, Try again')</script>";
	echo "<script>window.open('profilesignin.php','_self')</script>";
		}
}
	
?>
