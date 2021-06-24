<?php  
	require 'adminfunction.php';
	if($_SESSION['admin_name'] !== "tonny"){
		header("Location: login.php");
		exit;
	}

	if(isset($_POST["register"])){
		if(admin_regis($_POST) > 0){
			echo "<script>
					alert('successfully created new account!');
			      </script>";
		    header("Location: login.php");
		    exit;
	    } else {
			echo mysqli_error($koneksi);
	    }
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Admin</title>
	<link rel="stylesheet" href="css/register.css">
</head>
<body>

<div class="container">
	<h1>Admin Register</h1>
	<form class="regisForm" method="post">
	    <div class="form-group">
	       	<label for="username">Username: </label>
	        <input type="text" class="form-control" id="username" name="username">
	    </div>
	    <div class="form-group">
	      	<label for="password">Password: </label>
	      	<input type="password" class="form-control" id="password" name="password">
	    </div>
	    <div class="form-group">
	    	<label for="pass_conf">Confirm Password :</label>
	    	<input type="password" name="pass_conf" id="pass_conf">
	    </div>
	    <div class="form-group">
	    	<label for="email">Email :</label>
	    	<input type="email" name="email" id="email">
	    </div>
	    <button type="submit" class="btn btn-primary" name="register">Register</button>
	</form>
</div>

</body>
</html>