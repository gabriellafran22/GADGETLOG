<?php
require 'adminfunction.php';

require '../phonebrand.php';

if(!isset($_SESSION['admin_name'])){
	header("Location: login.php");
	exit;
}

if ( isset($_POST["addgagdet"])) {
	if(addGadget($_POST) > 0){
		echo "
			<script>
				alert('Phone has been Added successfully!');
			</script>
		";
	} else {
		echo "
			<script>
				alert('Failed to add phone!');
			</script>
		";
	}
}

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
					<i class="fas fa-folder-plus" id="active"></i>
					<p id="active"> Add Gadget </p>
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
        <form method="post" enctype="multipart/form-data">
        	<div id="phonedetails">
        		<label for="phonename">Phone name:</label>
        		<input autocomplete="off" type="text" name="phonename" placeholder="phone name" required>
        	
        		<label for="brand">Choose a brand: 
				</label>	
					<select name="brand" style="height: 30px; margin: auto 20px;">
						<option id="select" value="" selected="">None</option>
						<option value="Apple">Apple</option>
						<option value="Huawei">Huawei</option>
						<option value="Samsung">Samsung</option>
						<option value="Xiaomi">Xiaomi</option>
					</select>
        		
				<label for="phoneimg">Phone image:</label>
				<input autocomplete="off" type="file" name="phoneimg" required>

				<label for="rating">Ratings:</label>
        		<input autocomplete="off" type="number" name="rating" placeholder="rating" step="0.5" max="5" min="0">
        	</div>


        	<div id="specs">
        		<div>
	        		<h4 id="category">Network</h4>
	        		<label for="technology" id="subcategory">Technology</label>
	        		<input autocomplete="off" type="text" name="technology" id="specsfill" placeholder="Technology">
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Launch</h4>
	        		<label for="status" id="subcategory">Status</label>
	        		<textarea type="text" name="status" id="specsfill" placeholder="Status"></textarea> 
	        		<!-- <input autocomplete="off" type="text" name="status" id="specsfill" placeholder="Status"> -->
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Body</h4>
	        		<label for="dimension" id="subcategory">Dimensions</label>
	        		<input autocomplete="off" type="text" name="dimension" id="specsfill" placeholder="Dimensions">
        		</div>

        		<div>
	        		<label for="weight" id="subcategory">Weight</label>
	        		<input autocomplete="off" type="text" name="weight" id="specsfill" placeholder="Weight">
        		</div>

        		<div>
	        		<label for="build" id="subcategory">Build</label>
	        		<input autocomplete="off" type="text" name="build" id="specsfill" placeholder="Build">
        		</div>

        		<div>
	        		<label for="SIM" id="subcategory">SIM</label>
	        		<textarea type="text" name="SIM" id="specsfill" placeholder="SIM"></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Display</h4>
	        		<label for="displaytype" id="subcategory">Type</label>
	        		<input autocomplete="off" type="text" name="displaytype" id="specsfill" placeholder="Type">
        		</div>

        		<div>
	        		<label for="size" id="subcategory">Size</label>
	        		<input autocomplete="off" type="text" name="size" id="specsfill" placeholder="Size">
        		</div>


        		<div>
	        		<label for="resolution" id="subcategory">Resolution</label>
	        		<input autocomplete="off" type="text" name="resolution" id="specsfill" placeholder="Resolution">
        		</div>

        		<div>
	        		<label for="protection" id="subcategory">Protection</label>
	        		<textarea type="text" name="protection" id="specsfill" placeholder="Protection"></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Platform</h4>
	        		<label for="OS" id="subcategory">OS</label>
	        		<input autocomplete="off" type="text" name="OS" id="specsfill" placeholder="OS">
        		</div>

        		<div>
	        		<label for="chipset" id="subcategory">Chipset</label>
	        		<input autocomplete="off" type="text" name="chipset" id="specsfill" placeholder="Chipset">
        		</div>


        		<div>
	        		<label for="CPU" id="subcategory">CPU</label>
	        		<input autocomplete="off" type="text" name="CPU" id="specsfill" placeholder="CPU">
        		</div>

        		<div>
	        		<label for="GPU" id="subcategory">GPU</label>
	        		<input autocomplete="off" type="text" name="GPU" id="specsfill" placeholder="GPU">
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Memory</h4>
	        		<label for="cardslot" id="subcategory">Card slot</label>
	        		<input autocomplete="off" type="text" name="cardslot" id="specsfill" placeholder="Card slot">
        		</div>

        		<div>
	        		<label for="internal" id="subcategory">Internal</label>
	        		<input autocomplete="off" type="text" name="internal" id="specsfill" placeholder="Internal">
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Main Camera</h4>
	        		<label for="mainmodules" id="subcategory">Modules</label>
	        		<textarea type="text" name="mainmodules" id="specsfill" placeholder="Modules"></textarea>
        		</div>

        		<div>
	        		<label for="mainfeatures" id="subcategory">Features</label>
	        		<input autocomplete="off" type="text" name="mainfeatures" id="specsfill" placeholder="Features">
        		</div>

        		<div>
	        		<label for="mainvideo" id="subcategory">Video</label>
	        		<textarea type="text" name="mainvideo" id="specsfill" placeholder="Video"></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Selfie Camera</h4>
	        		<label for="selfiemodules" id="subcategory">Modules</label>
	        		<textarea type="text" name="selfiemodules" id="specsfill" placeholder="Modules"></textarea>
        		</div>

        		<div>
	        		<label for="selfiefeatures" id="subcategory">Features</label>
	        		<input autocomplete="off" type="text" name="selfiefeatures" id="specsfill" placeholder="Features">
        		</div>

        		<div>
	        		<label for="selfievideo" id="subcategory">Video</label>
	        		<textarea type="text" name="selfievideo" id="specsfill" placeholder="Video"></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Sound</h4>
	        		<label for="loudspeaker" id="subcategory">Loudspeaker</label>
	        		<textarea type="text" name="loudspeaker" id="specsfill" placeholder="Loudspeaker"></textarea>
        		</div>

        		<div>
	        		<label for="mmjack" id="subcategory">3.5mm jack</label>
	        		<input autocomplete="off" type="text" name="mmjack" id="specsfill" placeholder="3.5mm jack">
        		</div>
				<hr>
        		<div>
	        		<h4 id="category">Comms</h4>
	        		<label for="WLAN" id="subcategory">WLAN</label>
	        		<input autocomplete="off" type="text" name="WLAN" id="specsfill" placeholder="WLAN">
        		</div>

        		<div>
	        		<label for="bluetooth" id="subcategory">Bluetooth</label>
	        		<input autocomplete="off" type="text" name="bluetooth" id="specsfill" placeholder="Bluetooth">
        		</div>
        		<div>
	        		<label for="GPS" id="subcategory">GPS</label>
	        		<input autocomplete="off" type="text" name="GPS" id="specsfill" placeholder="GPS">
        		</div>

        		<div>
	        		<label for="NFC" id="subcategory">NFC</label>
	        		<input autocomplete="off" type="text" name="NFC" id="specsfill" placeholder="NFC">
        		</div>

        		<div>
	        		<label for="radio" id="subcategory">Radio</label>
	        		<input autocomplete="off" type="text" name="radio" id="specsfill" placeholder="Radio">
        		</div>

        		<div>
	        		<label for="USB" id="subcategory">USB</label>
	        		<input autocomplete="off" type="text" name="USB" id="specsfill" placeholder="USB">
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Features</h4>
	        		<label for="sensors" id="subcategory">Sensors</label>
	        		<textarea type="text" name="sensors" id="specsfill" placeholder="Sensors"></textarea>
        		</div>
        		<hr>
        		<div>
	        		<h4 id="category">Battery</h4>
	        		<label for="batterytype" id="subcategory">Type</label>
	        		<input autocomplete="off" type="text" name="batterytype" id="specsfill" placeholder="Type">
        		</div>

        		<div>
	        		<label for="charging" id="subcategory">Charging</label>
	        		<textarea type="text" name="charging" id="specsfill" placeholder="Charging"></textarea>
        		</div>
	        	
        	</div>

	        <button type="submit" name="addgagdet" id="addbtn">Add Gadget</button>
        </form>
	</div>
</body>
</html>


