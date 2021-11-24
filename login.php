<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form method="POST" >
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="username" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
				<a href="register.php">Register</a>
            	<input type="submit" name="login" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>

	<?php
	$connect = mysqli_connect('mysql5037.site4now.net','a7c995_heroku','mysql1mysql1','db_a7c995_heroku');
	if(!$connect){
		echo("Kết nối thất bại");
	}
	if(isset($_POST['login']))
	{
		$username =$_POST['username'];
		$password = $_POST['password'];
		// Lựa từ bảng User cột username = username nhập từ form và password = password nhập từ form
		$sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
		// Thực thi truy vấn từ database
		$result = mysqli_query($connect, $sql);

		$check_login = mysqli_num_rows($result);

		if ($check_login==0) {
			echo "Password or username is incorrect";
			
		}
		else{
			echo"<script>window.open('index.php','_self')</script>";
		}


	}
?>
</body>
</html>
