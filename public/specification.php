<?php
require "function.php";

    if(isset($_POST["login"])){
        if(login($_POST) > 0){
        } else {
            echo mysqli_error($koneksi);
        }
    }

    $tmp = $_GET['phoneid'];
    $phone = query("SELECT * FROM phone WHERE phoneid = $tmp")[0];
    $spec = query("SELECT * FROM phonespecification WHERE phoneid = $tmp")[0];
    // buat manggil brand nya ni yg bwh
    $tmp = $phone['phonebrandid'];
    $phonebrand = query("SELECT * FROM phonebrand WHERE phonebrandid = $tmp")[0];

    function seperateLinestoArray($string)
    {
        $separator = "\r\n";
        $result = [];
        $line = strtok($string, $separator);

        while ($line !== false) {
            $result[] = $line;
            $line = strtok($separator);
        }

        return $result;
    }
?>

<html>
<head>
    <title>GADGETLOG</title>
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/specification.css">
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
		<a href="discussion.php"><b>DISCUSSION</b></a>
		<a href="contactus.php"><b>CONTACT US</b></a>
	</nav>  

    <section>
        <div class="product">
            <div class="image">
                <img src='<?php echo "images/phones/".$phonebrand['name']."/".$phone['phoneimg']?>'>
            </div>
            <div class="namerating">
                <div class="name">
                    <h3>
                        <img src='<?php echo "images/".lcfirst($phonebrand['name'])."logo.png"?>' width="40px">
                        <?php echo $phone['phonename']?>
                    </h3>
                </div>
                <div class="rating">
                    <?php $temp = $phone['rating'];
                        while ($temp > 1) { ?>
                        <i class="fa fa-star"></i>
                    <?php $temp = $temp - 1; } ?>
                    <?php if ($temp == 1) {?>
                        <i class="fa fa-star"></i>
                    <?php } else { ?>
                        <i class="fa fa-star-half-o"></i>
                    <?php } ?>
                    <?php echo $phone['rating'] ?> 
                </div>
                <!-- ni compare jg lom bs -->
                <div class="compareButton">
                    <button id="compare" onclick="window.open('compare.php?phoneid1=<?=$_GET['phoneid']?>&phoneid2=0', '_self');">Compare</button>
                </div>
            </div>
            <div class="shop">
                <h3>Shop here</h3>
                <button class="shopButton" id="official" onclick="window.open('<?php echo $phonebrand['officialstore'] ?>')">
                    Official Store
                </button>
                <?php if ($phonebrand['tokopedia'] != NULL) { ?>
                    <button class="shopButton" id="tokopedia" onclick="window.open('<?php echo $phonebrand['tokopedia'] ?>')">
                    Tokopedia
                    </button>
                <?php } ?>
                <?php if ($phonebrand['shopee'] != NULL) { ?>
                    <button class="shopButton" id="shopee" onclick="window.open('<?php echo $phonebrand['shopee'] ?>')">
                    Shopee
                    </button>
                <?php } ?>
                <?php if ($phonebrand['blibli'] != NULL) { ?>
                    <button class="shopButton" id="blibli" onclick="window.open('<?php echo $phonebrand['blibli'] ?>')">
                    Blibli
                    </button>
                <?php } ?>
            </div>
        </div>

        <div class="specs">
            <h2>TECHNICAL SPECIFICATION</h2>
            <div class="section">
            <h4>Network</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">Technology</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['technology']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Launch</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">Status</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['status']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Body</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">Dimensions</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['dimension']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Weight</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['weight']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Build</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['build']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">SIM</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['SIM']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Display</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">Type</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['displaytype']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Size</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['size']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Resolution</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['resolution']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Protection</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['protection']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Platform</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">OS</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['OS']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Chipset</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['chipset']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">CPU</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['CPU']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">GPU</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['GPU']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Memory</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">Card Slot</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['cardslot']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Internal</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['internal']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Main Camera</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">Modules</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['mainmodules']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Features</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['mainfeatures']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Video</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['mainvideo']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Selfie Camera</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">Modules</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['selfiemodules']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Features</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['selfiefeatures']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Video</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['selfievideo']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Sound</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">Loudspeaker</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['loudspeaker']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">3.5mm jack</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['mmjack']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Comms</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">WLAN</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['WLAN']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Bluetooth</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['bluetooth']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">GPS</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['GPS']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">NFC</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['NFC']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Radio</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['radio']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">USB</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['USB']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Features</h4>
                <div class="inner-section">
                    <div class="part">
                        <div class="property">Sensors</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['sensors']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h4>Battery</h4>
                <div class="inner-section" style="border-bottom: 0;">
                    <div class="part">
                        <div class="property">Type</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['batterytype']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
                    <div class="part">
                        <div class="property">Charging</div>
                        <div class="value">
                            <?php
                            foreach(seperateLinestoArray($spec['charging']) as $line)
                                echo "<p>$line</p>";
                            ?>
                        </div>
                    </div>
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