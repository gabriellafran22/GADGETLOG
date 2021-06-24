<?php
require "adminfunction.php";

if(!isset($_SESSION['admin_name'])){
	header("Location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>GADGETLOG ADMIN</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	  <script>
      var click = 0;
      function clicktoggle(){
        if(click%2==1){
            document.getElementById("toggle").className = "fas fa-caret-down";
        } else {
            document.getElementById("toggle").className = "fas fa-caret-up";
        }
        click++;
      }
  </script>
</head>
<body>

	<!-- HEADER -->
	<header>
		<!-- LOGO -->
		<img class="onhoverback-image" src="../images/logo1.jpg"/>
		<?php  if($_SESSION['admin_name'] === "tonny") : ?>
			<a href="adminregister.php">Register</a>
		<?php endif ?>
	</header>

	<!-- contents below header -->
	
	<!-- side navbar -->
	<nav id="sidenav">
		<div id="sidenavcomp" onclick="window.open('admin.php','_self')" style="padding-bottom: 10px;">
			<i class="fa fa-user-circle" style="margin-top: 29px; font-size: 30px;" id="active"></i>
			<p style="margin-top: 33px;" id="active"> <?php echo strtoupper($_SESSION['admin_name'])?> </p>
		</div> <hr>

		<div data-toggle="collapse" data-target="#gspecs" id="sidenavcomp" onclick="clicktoggle()">
			<i class="fas fa-mobile"></i>
			<p> Gadget Specs 
				<i class="fas fa-caret-down" style="margin-left: 8px;" id="toggle"></i>
			</p>

			<!-- di klik baru mncul -->
			<div class="collapse" id="gspecs">
				<div style="border-bottom: 1px solid white;" onclick="window.open('browsegadget.php?brands=0','_self')">
					<i class="fas fa-list"></i>
					<p> Browse Gadget </p>
				</div>
				<div style="border-bottom: 1px solid white;" onclick="window.open('addgadget.php','_self')">
					<i class="fas fa-folder-plus"></i>
					<p> Add Gadget </p>
				</div>
				<div style="border-bottom: 1px solid white;" onclick="window.open('updategadget.php?brands=0','_self')">
					<i class="far fa-edit"></i>
					<p> Update Gadget </p>
				</div>
				<div onclick="window.open('deletegadget.php?brands=0','_self')">
					<i class="far fa-trash-alt"></i>
					<p> Delete Gadget </p>
				</div>
			</div>
		</div> <hr>

		<div onclick="window.open('feedbacks.php?filter=0','_self')" id="sidenavcomp">
			<i class="fas fa-comments"></i>
			<p> Feedbacks </p>
		</div> <hr>

		<div onclick="if(confirm('Are you sure?')) window.open('adminlogout.php','_self'); return false" id="sidenavcomp">
			<i class="fas fa-sign-out-alt"></i>
			<p> Logout </p>
		</div> <hr>

	</nav>

	<!-- contents -->
	<div id="contents">
		<div id="visitor">
			<i class="fas fa-users"></i>
			<h4><b>Total visitors:</b></h4>
			<h5>1271</h5>
		</div>

		<div  id="currlogin">
			<i class="fas fa-sign-in-alt"></i>
			<h4><b>Users Currently <br> Logged in:</b></h4>
			<h5>121</h5>
		</div>

		<div  id="avghour">
			<i class="fas fa-clock"></i>
			<h4><b>Average hours users spent:</b></h4>
			<h5>1.3 hours</h5>
		</div>

		<div id="texttt">
			<h4><b>Visitors based on country</b></h4>
		</div>

		<div id="world-map">
			<!-- https://mdbootstrap.com/docs/b4/jquery/admin/maps/world/ pengen ngambil dari situ tp kok gabisa w coba -->
			<img src="image/worldmap.jpg" height="200px">
		</div>
	</div>
	

</body>
</html>


