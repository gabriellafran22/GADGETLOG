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

    	<!-- LOGIN/LOGOUT -->
    	<div class="dropdown" id="login">
		<?php if (isset($_SESSION["login"])) : ?>
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
				<i class="fa fa-user-o"></i>
			</button>

	  		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
	  			<div id="logout">
					<div>
						<p>Hi, <?php echo $_SESSION['username']; ?></p>
					</div> 
					<div>
						<button onclick="if(confirm('Are you sure?')) window.open('logout.php','_self'); return false"> Logout
						</button>
					</div>
				</div>
	  		</div>
		<?php else: ?>
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
	   			<i class="fa fa-sign-in"></i>
	  		</button>

	  		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
			    <form method="post" class="loginform">
			    	<div style="text-align: center;">
			    		<b>LOGIN</b>
			    	</div>
			    	<div>
			    		<label for="username">Username: </label>
			    		<input type="text" name="username" id="username">
			    	</div>
			    	<div>
			    		<label for="password">Password: </label>
			    		<input type="password" name="password" id="password">
			    	</div>
			    	<div>
			    		<input type="submit" name="login" value="Login" class="submit"> </input>
			    		<a href="register.php" id="reg"> Register </a>
			    	</div>
			    </form>
			  </div>
		<?php endif; ?>
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
				<img src="images/Applelogo.png">
				<?php if (isset($_SESSION["login"])): ?>
					<button onclick=" window.open('discussarea.php?brand=Apple','_self')" style="margin-top:125px;">BROWSE</button>
				<?php else: ?>
					<button onclick="alert('you must be login first')" style="margin-top:125px;">BROWSE</button>
				<?php endif ?>
			</div>
			<div>
				<img src="images/Huaweilogo.png">
				<?php if (isset($_SESSION["login"])): ?>
					<button onclick=" window.open('discussarea.php?brand=Huawei','_self')" style="margin-top:125px;">BROWSE</button>
				<?php else: ?>
					<button onclick="alert('you must be login first')" style="margin-top:125px;">BROWSE</button>
				<?php endif ?>
	
			</div>
			<div>
				<img src="images/Samsunglogo.png">
				<?php if (isset($_SESSION["login"])): ?>
					<button onclick=" window.open('discussarea.php?brand=Samsung','_self')" style="margin-top:125px;">BROWSE</button>
				<?php else: ?>
					<button onclick="alert('you must be login first')" style="margin-top:125px;">BROWSE</button>
				<?php endif ?>
			</div>
			<div>
				<img src="images/Xiaomilogo.png">
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
		<div id="logofooter"></div>

		<div id="contactus">
			<p id="connect">Get connected with us!</p>
			<a href="https://www.twitter.com"> <img src="images/twitterlogo.png" class="icon twitter"> </a>
			<a href="https://www.instagram.com"> <img src="images/iglogo.png" class="icon ig"> </a>
			<a href="https://www.youtube.com"> <img src="images/youtubelogo.png" class="icon youtube"> </a>
		</div>
	</footer>

	<script src="js/searchPhone.js"></script>

</body>
</html>
