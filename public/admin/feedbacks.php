<?php  
	require 'adminfunction.php';

	if(!isset($_SESSION['admin_name'])){
		header("Location: login.php");
		exit;
	}

	if($_GET["filter"] == 0){
		$contact = query("SELECT * FROM contactus ORDER BY contactusid DESC");
	}
	else if($_GET["filter"] == 1){
		$contact = query("SELECT * FROM contactus WHERE DATE(`date`)=CURDATE() ORDER BY contactusid DESC");
	} else if($_GET["filter"] == 2){
		$contact = query("SELECT * FROM contactus WHERE WEEK(`date`)=WEEK(CURDATE()) AND YEAR(`date`)=YEAR(CURDATE()) ORDER BY contactusid DESC");
	} else if($_GET["filter"] == 3){
		$contact = query("SELECT * FROM contactus WHERE MONTH(`date`)=MONTH(CURDATE()) AND YEAR(`date`)=YEAR(CURDATE()) ORDER BY contactusid DESC");
	} else if($_GET["filter"] == 4){
		$contact = query("SELECT * FROM contactus WHERE YEAR(`date`)=YEAR(CURDATE()) ORDER BY contactusid DESC");
	} else if($_GET["filter"] == 5){
		if(isset($_POST["filcus"])){
			$from = $_POST["from"];
			$to = $_POST["to"];
			$contact = query("SELECT * FROM contactus WHERE DATE(`date`) BETWEEN '$from' AND '$to' ORDER BY contactusid DESC");
		} else {
			$contact = [];
		}
	}

	if(isset($_POST["unread"])){
	    if(unread($_POST) < 0){
	      echo mysqli_error($koneksi);
	    }
	    $f = $_GET['filter'];
	    header("location:feedbacks.php?filter=$f");
  	}


	
?>
<html>
<head>
	<title>Feedbacks</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/feedbacks.css">
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
		     document.getElementById('selectfilter').selectedIndex = <?php echo $_GET["filter"] ?>;
		}

	    function filtersel(range){
	    	document.location = 'feedbacks.php?filter=' + range;
	    }
	</script>
</head>
<body>
	
	<!-- HEADER -->
	<header>
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
			<i class="fas fa-comments" id="active"></i>
			<p id="active"> Feedbacks </p>
		</div> <hr>

		<div onclick="if(confirm('Are you sure?')) window.open('adminlogout.php','_self'); return false" id="sidenavcomp">
			<i class="fas fa-sign-out-alt"></i>
			<p> Logout </p>
		</div> <hr>

	</nav>

		<!-- contents -->
	<div id="contents">
		<div id="abovetable">	
			<h3>Feedbacks from contact us</h3>			
			<form method="post">
				<label for="filter">Filter by: 
					<select name="filter" onchange="filtersel(this.selectedIndex)"  id="selectfilter">
						<option id="select" value="select" selected="">None</option>
						<option value="Today">Today</option>
						<option value="ThisWeek">This Week</option>
						<option value="ThisMonth">This Month</option>
						<option value="ThisYear">This Year</option>
						<option value="Custom">Custom</option>
					</select>
				</label>
				<?php 
					if($_GET["filter"] == 5) :?>
					<br>
					<label for="from">From:</label>
 					<input type="date" id="from" name="from">
 					<label for="to">To:</label>
 					<input type="date" id="to" name="to">
 					<button type="submit" name="filcus">Filter</button>
				<?php endif ?>
			</form>
		</div>
		<hr style="margin-top: 10px;">
		<div id="tablee">
			<table class="table table-bordered">
			    <thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Subject</th>
						<th>Email</th>
						<th>Message</th>
						<th>Date</th>
						<th>isRead</th>
					</tr>
			    </thead>
			    <tbody>
			    	<?php $i=1 ?>
					<?php foreach ($contact as $row) { ?>
					<tr>
						<td><?= $i; ?></td>
						<td><?= $row["salutation"]." ".$row["name"]; ?></td>
						<td><?= $row["subject"]; ?></td>
						<td><?= $row["email"]; ?></td>
						<td><?= $row["message"]; ?></td>
						<td><?= $row["date"]; ?></td>
						<?php if ($row["isread"] == false) : ?>
							<td>
								<form method="post">
									<input type="hidden" name="cid" value="<?php echo $row['contactusid'] ?>">
									<button type="submit" name="unread">Unread</button>
								</form>
							</td>
						<?php else: ?>
							<td>Read</td>
						<?php endif; ?>
					</tr>
					<?php $i++ ?>
					<?php } ?>
			    </tbody>
			 </table>
		</div>
	</div>

</body>
</html>