<?php
require 'adminfunction.php';

if(!isset($_SESSION['admin_name'])){
	header("Location: login.php");
	exit;
}

if ( isset($_POST["updategadget"])) {
	if(updateGadget($_POST) > 0){
		echo "
			<script>
				alert('Succesfully changes!');
			</script>
			";
	} else {
		echo "
			<script>
				alert('Fail to changes!');
			</script>
			";
	}
}

global $koneksi;
$temp = $_GET['phoneid'];
$phone = query("SELECT * FROM phone WHERE phoneid = $temp")[0];
$spec = query("SELECT * FROM phoneSpecification WHERE phoneid = $temp")[0];

$temp = $phone['phonebrandid'];
$tmp = mysqli_query($koneksi, "SELECT name FROM phonebrand WHERE phonebrandid='$temp'");
$brand = $tmp->fetch_array()[0];


?>
<!DOCTYPE html>
<html>
<head>
    <title>GADGETLOG ADMIN</title>
    <link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/addgadget.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="addGadgetFuckingShit.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script>
        var click = 0;
        function clicktoggle() {
            if(click%2==1) {
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
					<i class="far fa-edit" id="active"></i>
					<p id="active"> Update Gadget </p>
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
        <form method="post" enctype="multipart/form-data">
        	<div id="phonedetails">
        		<label for="phonename">Phone name:</label>
        		<input type="text" name="phonename" required  value="<?= $phone['phonename']?>">
        	
        		<label for="brand">Choose a brand: 
				</label>	
					<select name="brand" style="height: 30px; margin: auto 20px;">
						<option id="select"  value="<?= $brand ?>" selected=""> <?= $brand ?></option>
						<option value="Apple">Apple</option>
						<option value="Huawei">Huawei</option>
						<option value="Samsung">Samsung</option>
						<option value="Xiaomi">Xiaomi</option>
					</select>
        		
				<label for="phoneimg">Phone image:</label>
				<input type="file" name="phoneimg">

				<label for="rating">Ratings:</label>
        		<input type="number" name="rating" step="0.5" max="5" min="0" value="<?= $phone['rating']?>">

				<img src="../images/phones/<?= $brand ?>/<?=  $phone['phoneimg']?>" width="50%">
				<input type="hidden" name="gambarLama" value="<?= $phone['phoneimg']; ?>">
        	</div>


        	<div id="specs">
        		<div>
	        		<h4 id="category">Network</h4>
	        		<label for="technology" id="subcategory">Technology</label>
	        		<input type="text" name="technology" id="specsfill" value="<?= $spec['technology']?>">
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Launch</h4>
	        		<label for="status" id="subcategory">Status</label>
	        		<textarea type="text" name="status" id="specsfill"><?= $spec['status']?></textarea> 
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Body</h4>
	        		<label for="dimension" id="subcategory">Dimensions</label>
	        		<input type="text" name="dimension" id="specsfill" value="<?= $spec['dimension']?>">
        		</div>

        		<div>
	        		<label for="weight" id="subcategory">Weight</label>
	        		<input type="text" name="weight" id="specsfill" value="<?= $spec['weight']?>">
        		</div>

        		<div>
	        		<label for="build" id="subcategory">Build</label>
	        		<input type="text" name="build" id="specsfill" value="<?= $spec['build']?>">
        		</div>

        		<div>
	        		<label for="SIM" id="subcategory">SIM</label>
	        		<textarea type="text" name="SIM" id="specsfill"><?= $spec['SIM']?></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Display</h4>
	        		<label for="displaytype" id="subcategory">Type</label>
	        		<input type="text" name="displaytype" id="specsfill" value="<?= $spec['displaytype']?>">
        		</div>

        		<div>
	        		<label for="size" id="subcategory">Size</label>
	        		<input type="text" name="size" id="specsfill" value="<?= $spec['size']?>">
        		</div>


        		<div>
	        		<label for="resolution" id="subcategory">Resolution</label>
	        		<input type="text" name="resolution" id="specsfill" value="<?= $spec['resolution']?>">
        		</div>

        		<div>
	        		<label for="protection" id="subcategory">Protection</label>
	        		<textarea type="text" name="protection" id="specsfill"><?= $spec['technology']?></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Platform</h4>
	        		<label for="OS" id="subcategory">OS</label>
	        		<input type="text" name="OS" id="specsfill" value="<?= $spec['OS']?>">
        		</div>

        		<div>
	        		<label for="chipset" id="subcategory">Chipset</label>
	        		<input type="text" name="chipset" id="specsfill" value="<?= $spec['chipset']?>">
        		</div>


        		<div>
	        		<label for="CPU" id="subcategory">CPU</label>
	        		<input type="text" name="CPU" id="specsfill" value="<?= $spec['CPU']?>">
        		</div>

        		<div>
	        		<label for="GPU" id="subcategory">GPU</label>
	        		<input type="text" name="GPU" id="specsfill" value="<?= $spec['GPU']?>">
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Memory</h4>
	        		<label for="cardslot" id="subcategory">Card slot</label>
	        		<input type="text" name="cardslot" id="specsfill" value="<?= $spec['cardslot']?>">
        		</div>

        		<div>
	        		<label for="internal" id="subcategory">Internal</label>
	        		<input type="text" name="internal" id="specsfill" value="<?= $spec['internal']?>">
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Main Camera</h4>
	        		<label for="mainmodules" id="subcategory">Modules</label>
	        		<textarea type="text" name="mainmodules" id="specsfill"><?= $spec['mainmodules']?></textarea>
        		</div>

        		<div>
	        		<label for="mainfeatures" id="subcategory">Features</label>
	        		<input type="text" name="mainfeatures" id="specsfill" value="<?= $spec['mainfeatures']?>">
        		</div>

        		<div>
	        		<label for="mainvideo" id="subcategory">Video</label>
	        		<textarea type="text" name="mainvideo" id="specsfill"><?= $spec['mainvideo']?></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Selfie Camera</h4>
	        		<label for="selfiemodules" id="subcategory">Modules</label>
	        		<textarea type="text" name="selfiemodules" id="specsfill"><?= $spec['selfiemodules']?></textarea>
        		</div>

        		<div>
	        		<label for="selfiefeatures" id="subcategory">Features</label>
	        		<input type="text" name="selfiefeatures" id="specsfill" value="<?= $spec['selfiefeatures']?>">
        		</div>

        		<div>
	        		<label for="selfievideo" id="subcategory">Video</label>
	        		<textarea type="text" name="selfievideo" id="specsfill"><?= $spec['selfievideo']?></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Sound</h4>
	        		<label for="loudspeaker" id="subcategory">Loudspeaker</label>
	        		<textarea type="text" name="loudspeaker" id="specsfill"><?= $spec['loudspeaker']?></textarea>
        		</div>

        		<div>
	        		<label for="mmjack" id="subcategory">3.5mm jack</label>
	        		<input type="text" name="mmjack" id="specsfill" value="<?= $spec['mmjack']?>">
        		</div>
				<hr>
        		<div>
	        		<h4 id="category">Comms</h4>
	        		<label for="WLAN" id="subcategory">WLAN</label>
	        		<input type="text" name="WLAN" id="specsfill" value="<?= $spec['WLAN']?>">
        		</div>

        		<div>
	        		<label for="bluetooth" id="subcategory">Bluetooth</label>
	        		<input type="text" name="bluetooth" id="specsfill" value="<?= $spec['bluetooth']?>">
        		</div>
        		<div>
	        		<label for="GPS" id="subcategory">GPS</label>
	        		<input type="text" name="GPS" id="specsfill" value="<?= $spec['GPS']?>">
        		</div>

        		<div>
	        		<label for="NFC" id="subcategory">NFC</label>
	        		<input type="text" name="NFC" id="specsfill" value="<?= $spec['NFC']?>">
        		</div>

        		<div>
	        		<label for="radio" id="subcategory">Radio</label>
	        		<input type="text" name="radio" id="specsfill" value="<?= $spec['radio']?>">
        		</div>

        		<div>
	        		<label for="USB" id="subcategory">USB</label>
	        		<input type="text" name="USB" id="specsfill" value="<?= $spec['USB']?>">
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Features</h4>
	        		<label for="sensors" id="subcategory">Sensors</label>
	        		<textarea type="text" name="sensors" id="specsfill"><?= $spec['sensors']?></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Battery</h4>
	        		<label for="batterytype" id="subcategory">Type</label>
	        		<input type="text" name="batterytype" id="specsfill" value="<?= $spec['batterytype']?>">
        		</div>

        		<div>
	        		<label for="charging" id="subcategory">Charging</label>
	        		<textarea type="text" name="charging" id="specsfill"><?= $spec['charging']?></textarea>
        		</div>
	        	
        	</div>

	        <button type="submit" name="updategadget" id="addbtn">Update</button>
        </form>
	</div>
</body>
</html>