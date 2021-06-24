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

	$brand = query("SELECT * FROM phonebrand");
?>
<!DOCTYPE html>
<html>
<head>
	<title>GADGETLOG</title>
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/brands.css">
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
		<div class="search" id="SearchPhonessss">
	        <form class="form-inline" action="/action_page.php" method="post">
	          <input class="form-control mr-sm-1 mx-2" id="search-Phone" type="text" placeholder="Search Phone here" autocomplete="off" style="height: 28px !important; width: 230px;">
	          <button class="btn btn-secondary" id="submitSearch" type="submit" name="searchPhones" style="background-color: lightgrey; border: 0;"><i class="fa fa-search" style="font-size: 20px; color: black;"></i></button>
	        </form>	
	        <div id="dropdown-phones"></div>
    	</div>

		<!-- login -->
		<div class="dropdown" id="login" style="top: -100px;">
		<?php if (isset($_SESSION["login"])) : ?>
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
				<i class="fa fa-user-o" style="font-size: 36px; margin-top: 2px;"></i>
			</button>

	  		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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

	  		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
		<a href="brands.php" class="active"><b>BRANDS</b></a>
		<a href="store.php"><b>STORE</b></a>
		<a href="discussion.php"><b>DISCUSSION</b></a>
		<a href="contactus.php"><b>CONTACT US</b></a>
	</nav> 
	
	<!-- CONTENTS -->
	<section>
		<div class="dropdown">
			<ul type="none">
				<?php foreach ($brand as $row) { ?>	
				<li class="dropbtn"> <a><?= $row['name'] ?></a>
					<ul type="none" class="dropdown-content">
						<?php $temp = $row['phonebrandid'];
						$phone = query("SELECT * FROM phone WHERE phonebrandid = $temp");
							foreach ($phone as $row2) { ?>	
						<li>
							<a href="specification.php?phoneid=<?= $row2['phoneid'] ?>" target="_self">
								<?= $row2['phonename'] ?>		
							</a>
						</li>
						<?php } ?>
					</ul>
				</li>
			<?php } ?>
			</ul>
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