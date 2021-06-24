<?php 
	require 'function.php';

		if(isset($_POST["login"])){
			if(login($_POST) > 0){
					echo "<script>
					alert('successfully created new account!');
				  </script>";
			} else {
				echo mysqli_error($koneksi);
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>GADGETLOG</title>
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/discussion.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="plugins/bootstrap.min.css">
	<script src="plugins/jquery.min.js"></script>
	<script src="plugins/popper.min.js"></script>
	<script src="plugins/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- HEADER -->
	<header>
		<!-- LOGO -->
		<figure class="onhover">
			<img  class="onhoverfront-image" src="images/logo.jpg">
			<img class="onhoverback-image" src="images/logo1.jpg"/>
		</figure>

		<!-- search bar -->
		<div class="search">
			    <!-- search specification -->
    <div class="d-flex align-items-center">
      <div class="searchHeader">
        <form class="form-inline" action="/action_page.php">
          <input class="form-control mr-sm-1 mx-2" id="search-Phone" type="text" placeholder="Search Phone here" autocomplete="off" style="height: 28px !important; width: 230px;">
	          <button class="btn btn-secondary" id="submitSearch" type="submit" name="searchPhones" style="background-color: lightgrey; border: 0;"><i class="fa fa-search" style="font-size: 20px; color: black;"></i></button>
        </form>
        <div id="dropdown-phones"></div>
      </div>
		</div>

		<!-- login -->
		<div class="dropdown" id="login">
		<?php if (!isset($_SESSION["login"])) : ?>
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
	   			<i class="fa fa-sign-in" style=""></i>
	  		</button>

	  		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-left: -315px;">
			    <form method="post" class="loginform">
			    	<div style="text-align: center;">
			    		<b>LOGIN</b>
			    	</div>
			    	<div>
			    		<label for="username">Username: </label>
			    		<input type="text" name="username" id="username" style="position: absolute; right: 30px;">
			    	</div>
			    	<div>
			    		<label for="password">Password: </label>
			    		<input type="password" name="password" id="password" style="position: absolute; right: 30px;">
			    	</div>
			    	<div>
			    		<input type="submit" name="login" value="Login" class="submit"> </input>
			    		<a href="register.php" id="reg" style=" font-weight: normal; width: 80px !important;"> Register </a>
			    	</div>
			    </form>
			  </div>
		<?php else: ?>
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
	   			<i class="fa fa-user-o" style=""></i>
	  		</button>
	  		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-left: -155px;">
	  			<div id="logout">
					<div>
						<p>Hi, <?php echo $_SESSION['username'] ?></p>
					</div> 
					<div>
						<button onclick="if(confirm('Are you sure?')) window.open('logout.php','_self'); return false" style="font-weight: 400; font-size: 16px;"> Logout
						</button>
					</div>
				</div>
	  		</div>
		<?php endif ?>
		</div>
	</header>

	<!-- NAVIGATION BAR -->
	<nav class="navbar">
		<a href="index.php"><b>HOME</b></a>
		<a href="brands.php"><b>BRANDS</b></a>
		<a href="store.php"><b>STORE</b></a>
		<a href="discussion.php" class="active"><b>DISCUSSION</b></a>
		<a href="contactus.php"><b>CONTACT US</b></a>
	</nav>  
	
	<!-- SECTION -->
	<section>
		<p> START A DISCUSSION OR SEARCH YOUR PROBLEMS <br> FOR YOUR GADGET BRANDS HERE!</p>
		<div class="container">
			<div>
				<img src="images/applelogo.png">
				<?php if (isset($_SESSION["login"])): ?>
					<button onclick=" window.open('discussarea.php?brand=Apple','_self')" style="margin-top:125px;">BROWSE</button>
				<?php else: ?>
					<button onclick="alert('you must be login first')" style="margin-top:125px;">BROWSE</button>
				<?php endif ?>
			</div>
			<div>
				<img src="images/huaweilogo.png">
				<?php if (isset($_SESSION["login"])): ?>
					<button onclick=" window.open('discussarea.php?brand=Huawei','_self')" style="margin-top:125px;">BROWSE</button>
				<?php else: ?>
					<button onclick="alert('you must be login first')" style="margin-top:125px;">BROWSE</button>
				<?php endif ?>
	
			</div>
			<div>
				<img src="images/samsunglogo.png">
				<?php if (isset($_SESSION["login"])): ?>
					<button onclick=" window.open('discussarea.php?brand=Samsung','_self')" style="margin-top:125px;">BROWSE</button>
				<?php else: ?>
					<button onclick="alert('you must be login first')" style="margin-top:125px;">BROWSE</button>
				<?php endif ?>
			</div>
			<div>
				<img src="images/xiaomilogo.png">
				<?php if (isset($_SESSION["login"])): ?>
					<button onclick=" window.open('discussarea.php?brand=Xiaomi','_self')" style="margin-top:125px;">BROWSE</button>
				<?php else: ?>
					<button onclick="alert('you must be login first')" style="margin-top:125px;">BROWSE</button>
				<?php endif ?>
			</div>
		</div>
		
	</section>

	<!-- FOOTER -->
	<footer>
		<!-- LOGO -->
		<img src="images/logo.jpg">

		<!-- SOCIAL MEDIA -->
		<p id="connect">Get connected with us!</p>
		<a href="https://www.twitter.com"> <img src="images/twitterlogo.png" class="icon twitter"> </a>
		<a href="https://www.instagram.com"> <img src="images/iglogo.png" class="icon ig"> </a>
		<a href="https://www.youtube.com"> <img src="images/youtubelogo.png" class="icon youtube"> </a>
	</footer>

	<script src="js/searchPhone.js"></script>

</body>
</html>
