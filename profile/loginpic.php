<?php
if(isset($_POST['submit'])){
	$con=mysqli_connect("localhost","root","","profilepicdemo");
	$username=$_POST['name'];
	$password=$_POST['pass'];
	$res=mysqli_query($con,"select * from profile where username='$username'");
	$row=mysqli_fetch_array($res);
	if ($row['password']==$password) {
		echo "<center>WELCOME  ",$username;
		echo"<br>";
		echo "<img src=".$row['path']." width='300px' height='300px'></center>";
	}
else{
	echo "<script>alert('Incorrect username/password,Try again')</script>";
	echo "<script>window.open('loginpic.php','_self')</script>";
}
}
else {
	echo "<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action='loginpic.php' method='POST'>
	<center><br><br><br><br>
	Username
	<input type='text' name='name' required='required'>
	<br><br>
	Password
	<input type='Password' name='pass' required='required'>
	<br><br>
	<input type='submit' name='submit' value='Login'>
	<br><br>
	<a href='profilesignin.php'>Don't have an account?</a>
	</center>
</form>	
</body>
</html>
";
}
?>
