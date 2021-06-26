<?php 
	require 'function.php';

	if(isset($_POST["login"])){
		if(login($_POST) > 0){
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
	<link rel="stylesheet" href="css/index.css">
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
	<nav class="navbar" id="spannavbar">
		<a href="index.php" class="active"><b>HOME</b></a>
		<a href="brands.php"><b>BRANDS</b></a>
		<a href="store.php"><b>STORE</b></a>
		<a href="discussion.php"><b>DISCUSSION</b></a>
		<a href="contactus.php"><b>CONTACT US</b></a>
	</nav>  

	<!-- SLIDESHOW -->
	<section id="container">
		<div id="slideshow" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#slideshow" data-slide-to="0" class="active"></li>
				<li data-target="#slideshow" data-slide-to="1"></li>
				<li data-target="#slideshow" data-slide-to="2"></li>
			</ul>

			<div class="carousel-inner" align="center">
				<div class="carousel-item active">
				  <img src="images/samsungs21.png" alt="samsungs21"> 
				</div>
				<div class="carousel-item">
				  <img src="images/iphone12.png" alt="iphone12">
				</div>
				<div class="carousel-item">
				  <img src="images/huaweip40.png" alt="huaweip40">
				 <!--  <div class="carousel-caption">
				    <h3>New York</h3>
				    <p>We love the Big Apple!</p>
				  </div>    -->
				</div>
			</div>

			<a class="carousel-control-prev" href="#slideshow" data-slide="prev" align="center">
				<span class="carousel-control-prev-icon"></span>
			</a>

			<a class="carousel-control-next" href="#slideshow" data-slide="next" align="center">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>

		<div id="undercarousel" class="undercarousel">
			<div id="ads">
				<h2 style="font-weight: bold; text-align: center; vertical-align: center;">ADVERTISEMENT</h2>
			</div>

			<div id="popularbanner">
				<div id="textbanner"> <center> <h3>POPULAR</h3> </center> 
				</div>
			</div>

			<div id="pembelian" class="pembelian">
			  <div class="pro" onclick=" window.open('specification.php?phoneid=12','_self')">
			    <img src="images/phones/Samsung/galaxys21.png">
			    <p>SAMSUNG GALAXY S21</p>
			  </div>
			  <div class="pro" onclick="window.open('specification.php?phoneid=15','_self')">
			    <img src="images/phones/Samsung/zfold2.png">
			    <p>SAMSUNG GALAXY Z FOLD 2</p>
			  </div>
			  <div class="pro" onclick="window.open('specification.php?phoneid=1','_self')">
			    <img src="images/phones/Apple/iphone12promax.png">
			    <p>IPHONE 12 PRO MAX</p>
			  </div>
			  <div class="pro" onclick="window.open('specification.php?phoneid=6','_self')">
			    <img src="images/phones/Huawei/matex.png">
			    <p>HUAWEI MATE X</p>
			  </div>
			  <!-- GAMBARNYA GNTI TAR -->
			  <div class="pro" onclick="window.open('specification.php?phoneid=8','_self')">
			    <img src="images/phones/Huawei/p40pro.png">
			    <p>HUAWEI P40 PRO</p>
			  </div>
			  <div class="pro" onclick="window.open('specification.php?phoneid=16','_self')">
			    <img src="images/phones/Xiaomi/mi10t.png" alt="">
			    <p>XIAOMI MI 10T</p>
			  </div>
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
