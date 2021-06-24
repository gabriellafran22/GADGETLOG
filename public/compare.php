<?php 
	require 'function.php';

	if(isset($_POST["login"])){
		if(login($_POST) > 0){
		} else {
			echo mysqli_error($koneksi);
		}
	}
	$tmp1 = $_GET['phoneid1'];
	$phone1 = query("SELECT * FROM phone WHERE `phoneid` = $tmp1")[0];
	$spec1 = query("SELECT * FROM phonespecification WHERE phoneid = $tmp1")[0];
	$tmp1 = $phone1['phonebrandid'];
	$phonebrand1 = query("SELECT * FROM phonebrand WHERE phonebrandid = $tmp1")[0];

	$tmp2 = $_GET['phoneid2'];
	if($tmp2){
		$phone2 = query("SELECT * FROM phone WHERE `phoneid` = $tmp2")[0];
		$spec2 = query("SELECT * FROM phonespecification WHERE phoneid = $tmp2")[0];
		$tmp2 = $phone2['phonebrandid'];
		$phonebrand2 = query("SELECT * FROM phonebrand WHERE phonebrandid = $tmp2")[0];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Phone Compare</title>
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="css/compare.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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

	  		<div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
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

	  		  <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
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
		<a href="discussion.php"><b>DISCUSSION</b></a>
		<a href="contactus.php"><b>CONTACT US</b></a>
	</nav>  

	<section>
		<div class="specheader">
			<h1 class="compare">Compare</h1>
			<div class="phoneOne">
				<img src="<?php echo "images/phones/".$phonebrand1['name']."/".$phone1['phoneimg']?>" id="phoneimg">
				<div style="margin-bottom: 10px;">
					<img src="<?= "images/".$phonebrand1['name']."logo.png"?>" id="phoneLogo">
					<h7><b><?= $phone1['phonename']; ?></b></h7>
				</div>
				<form method="post">
					<input type="text" name="sPhone1" id="sPhone1" autocomplete="off">
					<input type="hidden" name="phoneid2" id="phoneid2" value="<?= $_GET['phoneid2']?>">
					<button type="submit" name="btnPhone1" id="btnPhone1">
					<i class="fa fa-search" style="font-size: 20px; color: black;"></i>
					</button>
				</form>
				<div id="d-phones1"></div>
			</div>

			<div class="phoneTwo">
				<?php if($tmp2) :?>
					<img src="<?php echo "images/phones/".$phonebrand2['name']."/".$phone2['phoneimg']?>" id="phoneimg">
				<?php else:?>
					<div id="phoneimg"></div>
				<?php endif;?>
				<div style="margin-bottom: 10px;">
					<?php if($tmp2) :?>
						<img src="<?= "images/".$phonebrand2['name']."logo.png"?>" id="phoneLogo">
						<h7><b><?= $phone2['phonename']; ?></b></h7>
					<?php else:?>
						<div id="phoneLogo"></div>
					<?php endif;?>
				</div>
				<form method="post">
					<input type="text" name="sPhone2" id="sPhone2" autocomplete="off">
					<input type="hidden" name="phoneid1" id="phoneid1" value="<?= $_GET['phoneid1']?>">
					<button type="submit" name="btnPhone2" id="btnPhone2">
						<i class="fa fa-search" style="font-size: 20px; color: black;"></i>
					</button>
				</form>
				<div id="d-phones2"></div>
			</div>
		</div>
		
		<div class="spec">
			<h3 class="detail">Network</h3>
			<h5 class="subdetail">Technology</h5>
			<p class="specOne">
				<?= $spec1['technology']; ?>
			</p>
			<p class="specTwo">
			<?php if($tmp2) :
					echo $spec2['technology'];
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Launch</h3>
			<h5 class="subdetail">Status</h5>
			<p class="specOne">
				<?= $spec1['status']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['status'];
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Body</h3>
			<h5 class="subdetail">Dimensions</h5>
			<p class="specOne">
				<?= $spec1['dimension']; ?>
			</p>
			<p class="specTwo">
			<?php if($tmp2) :
					echo $spec2['dimension'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Weight</h5>
			<p class="specOne">
				<?= $spec1['weight']; ?>
			</p>
			<p class="specTwo">
			<?php if($tmp2) :
					echo $spec2['weight'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Build</h5>
			<p class="specOne">
				<?= $spec1['build']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['build'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">SIM</h5>
			<p class="specOne">
				<?= $spec1['SIM']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['SIM'];
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Display</h3>
			<h5 class="subdetail">Type</h5>
			<p class="specOne">
				<?= $spec1['displaytype']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['displaytype'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Size</h5>
			<p class="specOne">
				<?= $spec1['size']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['size'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Resolution</h5>
			<p class="specOne">
				<?= $spec1['resolution']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['resolution'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Protection</h5>
			<p class="specOne">
				<?= $spec1['protection']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['protection'];
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Platform</h3>
			<h5 class="subdetail">OS</h5>
			<p class="specOne">
				<?= $spec1['OS']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['OS'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Chipset</h5>
			<p class="specOne">
				<?= $spec1['chipset']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['chipset'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">CPU</h5>
			<p class="specOne">
				<?= $spec1['CPU']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['CPU'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">GPU</h5>
			<p class="specOne">
				<?= $spec1['GPU']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['GPU'];
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Memory</h3>
			<h5 class="subdetail">Card Slot</h5>
			<p class="specOne">
				<?= $spec1['cardslot']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['cardslot'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Internal</h5>
			<p class="specOne">
				<?= $spec1['internal']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['internal'];
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Main Camera</h3>
			<h5 class="subdetail">Modules</h5>
			<p class="specOne">
				<?= $spec1['mainmodules']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['mainmodules'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Features</h5>
			<p class="specOne">
				<?= $spec1['mainfeatures']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['mainfeatures'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Video</h5>
			<p class="specOne">
				<?= $spec1['mainvideo']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2):
					echo $spec2['mainvideo']; 
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Selfie Camera</h3>
			<h5 class="subdetail">Modules</h5>
			<p class="specOne">
				<?= $spec1['selfiemodules']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['selfiemodules'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Features</h5>
			<p class="specOne">
				<?= $spec1['selfiefeatures']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['selfiefeatures'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Video</h5>
			<p class="specOne">
				<?= $spec1['selfievideo']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['selfievideo'];
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Sound</h3>
			<h5 class="subdetail">Loudspeaker</h5>
			<p class="specOne">
				<?= $spec1['loudspeaker']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['loudspeaker'];
				endif;?>
			</p>
		</div>	

		<div class="spec">
			<h5 class="subdetail">3.5mm jack</h5>
			<p class="specOne">
				<?= $spec1['mmjack']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['mmjack'];
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Comms</h3>
			<h5 class="subdetail">WLAN</h5>
			<p class="specOne">
				<?= $spec1['WLAN']; ?>	
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['WLAN'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Bluetooth</h5>
			<p class="specOne">
				<?= $spec1['bluetooth']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['bluetooth'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">GPS</h5>
			<p class="specOne">
				<?= $spec1['GPS']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['GPS'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">NFC</h5>
			<p class="specOne">
				<?= $spec1['NFC']; ?>
			</p>
			<p class="specTwo">
				<?php if($tmp2) :
					echo $spec2['NFC'];
				endif;?>
			</p>
		</div>
		
		<div class="spec">
			<h5 class="subdetail">Radio</h5>
			<p class="specOne">
				<?= $spec1['radio']; ?>
			</p>
			<p class="specTwo">
			<?php if($tmp2) :
					echo $spec2['radio'];
				endif;?>
			</p>
		</div>
		
		<div class="spec">
			<h5 class="subdetail">USB</h5>
			<p class="specOne">
				<?= $spec1['USB']; ?></p>
			<p class="specTwo">
			<?php if($tmp2) :
					echo $spec2['USB'];
				endif;?>
			</p>
		</div><hr>

		<div class="spec">
			<h3 class="detail">Features</h3>
			<h5 class="subdetail">Sensors</h5>
			<p class="specOne">
				<?= $spec1['sensors']; ?>
			</p>
			<p class="specTwo">
			<?php if($tmp2) :
					echo $spec2['sensors'];
				endif;?>
			</p>
		</div><hr>
		
		<div class="spec">
			<h3 class="detail">Battery</h3>
			<h5 class="subdetail">Type</h5>
			<p class="specOne">
				<?= $spec1['batterytype']; ?>
			</p>
			<p class="specTwo">
			<?php if($tmp2) :
					echo $spec2['batterytype'];
				endif;?>
			</p>
		</div>

		<div class="spec">
			<h5 class="subdetail">Charging</h5>
			<p class="specOne">
				<?= $spec1['charging']; ?>
			</p>
			<p class="specTwo">
			<?php if($tmp2) :
					echo $spec2['charging'];
				endif;?>
			</p>
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
	<script src="js/comparePhone2.js"></script>
	<script src="js/comparePhone1.js"></script>
	<script src="js/searchPhone.js"></script>
</body>
</html>