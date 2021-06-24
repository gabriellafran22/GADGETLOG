<?php

require "adminfunction.php";
if(!isset($_SESSION['admin_name'])){
	header("Location: login.php");
	exit;
}

	if($_GET["brands"] == 0){
        $phone = query("SELECT * FROM phone WHERE phonebrandid > 0");
    }
    else if($_GET["brands"] == 1){
        $phone = query("SELECT * FROM phone WHERE phonebrandid = 1");
    } else if($_GET["brands"] == 2){
        $phone = query("SELECT * FROM phone WHERE phonebrandid = 2");
    } else if($_GET["brands"] == 3){
        $phone = query("SELECT * FROM phone WHERE phonebrandid = 3");
    } else if($_GET["brands"] == 4){
        $phone = query("SELECT * FROM phone WHERE phonebrandid = 4");
    }

	if(isset($_POST["deletebtn"])){
	    if(deleteGadget($_POST) < 0){
	      echo mysqli_error($koneksi);
	    }
	    $b = $_GET['brands'];
	    header("location:deletegadget.php?brands=$b");
  	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>GADGETLOG ADMIN</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/browsegadget.css">
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

      	window.onload = function() {
		     document.getElementById('selectbrands').selectedIndex = <?php echo $_GET["brands"] ?>;
		}

	    function filtersel(range){
	    	document.location = 'deletegadget.php?brands=' + range;
	    }
  </script>
</head>
<body>

	<!-- HEADER -->
	<header>
		<!-- LOGO -->
		<img class="onhoverback-image" src="../images/logo1.jpg"/>
	</header>

	<!-- contents below header -->
	
	<!-- side navbar -->
	<nav id="sidenav">
		<div id="sidenavcomp" onclick="window.open('admin.php','_self')" style="padding-bottom: 10px;">
			<i class="fa fa-user-circle" style="margin-top: 29px; font-size: 30px;"></i>
			<p style="margin-top: 33px;"> <?php echo strtoupper($_SESSION['admin_name'])?> </p>
		</div> <hr>

		<div data-toggle="collapse" data-target="#gspecs" id="sidenavcomp" onclick="clicktoggle()">
			<i class="fas fa-mobile" id="active"></i>
			<p id="active"> Gadget Specs 
				<i class="fas fa-caret-down" style="margin-left: 8px; color: #0e93e3 !important;" id="toggle"></i>
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
					<i class="far fa-trash-alt" id="active"></i>
					<p id="active"> Delete Gadget </p>
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
		<div id="abovetable" style="padding-bottom: 5%;">	
			<h3>List of Gadgets</h3>			
			<form method="post">
				<div style="float: left;">
					<label for="brands" style="margin-right: 5px;">Choose a brand: 
						<select name="brands" onchange="filtersel(this.selectedIndex)"  id="selectbrands">
							<option id="select" value="select" selected="">None</option>
							<option value="Apple">Apple</option>
							<option value="Huawei">Huawei</option>
							<option value="Samsung">Samsung</option>
							<option value="Xiaomi">Xiaomi</option>
						</select>
					</label>
				</div>

				<div class="input-group" style="width: 400px; float: right;">
				  <input type="text" class="form-control" placeholder="Search phone name" name="searchPhone" id="searchPhone" autocomplete="off">
				  <div class="input-group-btn">
				    <button class="btn btn-default" type="submit" name="searchbtn" id="searchbtn"> <i class="glyphicon glyphicon-search"> </i>
				    </button>
				  </div>
				</div>
			</form>
		</div>
		
		<hr style="margin-top: 10px;">

		<div id="tablee">
			<table class="table table-bordered">
			    <thead>
					<tr>
						<th>No.</th>
						<th>Phone Name</th>
						<th>Brand</th>
						<th>Option</th>
					</tr>
			    </thead>
			    <tbody>
			    		<?php $i=1 ?>
						<?php foreach ($phone as $row) { ?>	
			    	<tr>
				    	<td><?php echo $i ?></td>
				    	<td><?php echo $row["phonename"] ?></td>
				    	<td><?php $temp = $row["phonebrandid"];
				    		$phonebrand = mysqli_query($koneksi, "SELECT name FROM phonebrand WHERE phonebrandid ='$temp'");
           					echo $phonebrand->fetch_array()[0];

				    	?></td>
			    		<td>
			    			<form method="post">
			    				<input type="hidden" name="phoneID" value="<?php echo $row['phoneid'] ?>">
			    				<button onclick="if(!confirm('Are you sure you want to delete this phone?')) return false" type="submit" name="deletebtn" id="btn">Delete</button>
			    			</form>
			    		</td>
			    	</tr>
				    	<?php $i++ ?>
						<?php } ?>
			    </tbody>
			 </table>
		</div>
	</div>
	
<script src="deletegadgetSearch.js"></script>
</body>
</html>


