<?php  
require 'function.php';
	if(isset($_POST["register"])){
		if(register($_POST) > 0){
			echo "<script>
						alert('successfully created new account!');
						window.location.href = 'index.php';
				  </script>";
		} else {
			echo mysqli_error($koneksi);
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Gadgetlog</title>
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/register.css">
	<link rel="stylesheet" href="plugins/bootstrap.min.css">
	<script src="plugins/jquery.min.js"></script>
	<script src="plugins/popper.min.js"></script>
	<script src="plugins/bootstrap.min.js"></script>

</head>
<body>
	<!-- HEADER -->
	<header>
		<!-- LOGO -->
		<figure class="onhover">
			<img  class="onhoverfront-image" src="images/logo.jpg">
			<img class="onhoverback-image" src="images/logo1.jpg"/>
		</figure>
	</header>

	<nav class="navbar">
		<a href="index.php">HOME</a>
		<a href="brands.php">BRANDS</a>
		<a href="store.php">STORE</a>
		<a href="discussion.php">DISCUSSION</a>
		<a href="contactus.php">CONTACT US</a>
	</nav> 

	<section>
		<div class="regis">
			<h2 style="margin-bottom: 40px; text-align: center;">Don't have an account? <br> Register here</h2>
			<form action="" method="post" class="item">
				<div>
					<label for="email">E-mail :</label>
					<input type="email" name="email" id="email" required>
				</div>
				<div>
					<label for="username">Username :</label>
					<input type="text" name="username" id="username" maxlength="30" required>
				</div>
				<div>
					<label for="password">Password :</label>
					<input type="password" name="password" id="password" required>
				</div>
				<div>
					<label for="password_conf">Confirm password :</label>
					<input type="password" name="password_conf" id="password_conf" required>
				</div>
				<button type="submit" name="register">Register</button>
			</form>
		</div>
	</section>

	<footer>
		<!-- LOGO -->
		<img src="images/logo.jpg">

		<!-- SOCIAL MEDIA -->
		<p id="connect">Get connected with us!</p>
		<a href="https://www.twitter.com"> <img src="images/twitterlogo.png" class="icon twitter"> </a>
		<a href="https://www.instagram.com"> <img src="images/iglogo.png" class="icon ig"> </a>
		<a href="https://www.youtube.com"> <img src="images/youtubelogo.png" class="icon youtube"> </a>
	</footer>
	
</body>
</html>