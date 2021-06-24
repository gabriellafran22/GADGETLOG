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

	if(isset($_POST["send"]))
	{
		if(contactus($_POST) > 0 ){
			echo "<script>
					alert('Thank you for your feedback!');
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
	<link rel="stylesheet" href="css/contactus.css">
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
		<a href="contactus.php" class="active"><b>CONTACT US</b></a>
	</nav>  
	
	<!-- SECTION -->
	<section>
		<div class="section">	
			<div class="ads"> <h3>ADVERTISEMENT</h3> <br> </div>
			<div class="words">
				<h2> Leave your questions, feedbacks, <br> or inquiries below! </h2>  <br>
				<p> Tell us if we made a mistake including: </p>
				<ul>
					<li>Link errors</li>
					<li>Misinformation on specifications</li>
					<li>Misspelled brands, specification, and etc</li>	
				</ul>
				<p> Website upgrade: </p>
				<ul>
					<li>Feature ideas</li>
					<li>Color suggestions</li>
					<li>etc</li>
				</ul> <br>
		
				<form class="cntcus" method="post">
					<label for="salutation">SALUTATION 
						<p> : </p> 
						<select name="salutation">
							<option value="Mr." selected>Mr.</option>
							<option value="Mrs.">Mrs.</option>
							<option value="Ms.">Ms.</option>
						</select>
					</label> <br>
					
					<label for="name"> NAME 
						<p> : </p> 
						<input type="text" name="name" id="name" maxlength="30" required>
					</label> <br>

					<label for="subject">SUBJECT 
						<p> : </p> 
						<input type="text" name="subject" id="subject" maxlength="30" required>
					</label> <br>

					<label for="email">EMAIL 
						<p> : </p> 
						<input type="email" name="email" id="email" maxlength="100" required>
					</label> <br>

					<label for="MESSAGE">MESSAGE 
						<p> : </p> 
						<textarea cols="47" rows="10" name="message" id="message" maxlength="500" required></textarea>
					</label> <br>

					<div class="buttons">
						<button type="reset" name="clear" value="CLEAR" class="button">CLEAR</button>
						<button type="submit" class="button" name="send">SEND</button>
					</div>
				</form>
			</div>
			
			<div class="about">
				<br>
				<h3>ABOUT US</h3> <br>
				<p> Hi, we are 3 students from Bunda Mulia University. </p>
				<p>The main purpose of this website is to fulfill our web programming project. Our goal of making this website is to make people easily search detailed information about certain devices from different kinds of brands.</p>
				<p> Feel free to write your thoughts, ideas, critique, suggestions, and etc. We do appriciate every single one of your feedbacks :)</p>
				<p> We will continue to create better performances for our website and give you the latest information on newest devices.</p>
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
