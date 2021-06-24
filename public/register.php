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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- HEADER -->
	<header>
		<!-- LOGO -->
		<div id="logo"></div>

		<!-- SEARCH BAR -->
		<div class="search" id="SearchPhonessss" >
	        <form class="form-inline" action="/action_page.php" method="post">
	          <input class="form-control mr-sm-1 mx-2" id="search-Phone" type="text" placeholder="Search Phone here" autocomplete="off">
	          <button class="btn btn-secondary" id="submitSearch" type="submit" name="searchPhones" style="background-color: lightgrey; border: 0;"><i class="fa fa-search" style="font-size: 20px; color: black;"></i></button>
	        </form>	
	        <div id="dropdown-phones"></div>
    	</div>
	</header>

	<nav class="navbar">
		<a href="index.php"><b>HOME</b></a>
		<a href="brands.php"><b>BRANDS</b></a>
		<a href="store.php"><b>STORE</b></a>
		<a href="discussion.php"><b>DISCUSSION</b></a>
		<a href="contactus.php"><b>CONTACT US</b></a>
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
		<div id="logofooter"></div>

		<div id="contactus">
			<p id="connect">Get connected with us!</p>
			<a href="https://www.twitter.com"> <img src="images/twitterlogo.png" class="icon twitter"> </a>
			<a href="https://www.instagram.com"> <img src="images/iglogo.png" class="icon ig"> </a>
			<a href="https://www.youtube.com"> <img src="images/youtubelogo.png" class="icon youtube"> </a>
		</div>
	</footer>
	
</body>
</html>