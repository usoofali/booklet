<?php
	require("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="form.css">
	<style type="text/css">
		body{
			background: url('admincss/logo.png');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="header">
	<h2 style="color: blue" align="center">Computer Science Admin Login</h2>
</div>
	<form class="form" id="form" method="POST">
		<div class="form-control success">
			<i class="fas fa-user"></i>
			<input type="text" placeholder="Username" name="username">
		</div>
		<div class="form-control">
			<i class="fas fa-lock"></i>
			<input type="password" placeholder="Password" name="password">
		</div>
		<button type="submit" name="submit">Sign In</button>
	</form>
</div>
	
	<?php

		if (isset($_POST['submit'])) {
			$query="SELECT * FROM `admin` WHERE username='$_POST[username]' AND password='$_POST[password]'";
			$result=mysqli_query($con,$query);
			if (mysqli_num_rows($result)==1) {
				session_start();
				$_SESSION['AdminLoginId']=$_POST['username'];
				$_SESSION['fullname']=$_POST['fullname'];
			
				header("location: dashboard.php");
			}
			else {
				echo "<script>alert('Incorrect Login Details')</script>";
			}
		}
	?>
</body>
</html>