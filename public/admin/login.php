<?php  
	require 'adminfunction.php';

	if(isset($_POST["submit"])){
		if(admin_login($_POST["username"], $_POST["password"]) > 0) {
			header("Location: admin.php");
			exit;
		} else {
			echo "<script>
				  alert('Wrong username or password');
				  </script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Admin</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container">
 	<h2>Admin Login</h2>
	<form id="loginForm" method="post">
	    <div class="form-group">
	       	<label for="username">Username: </label>
	        <input type="text" class="form-control" id="username" name="username">
	    </div>
	    <div class="form-group">
	      	<label for="password">Password: </label>
	      	<input type="password" class="form-control" id="password" name="password">
	    </div>
	    <button type="submit" class="btn btn-primary" name="submit">Login</button>
	</form>
</div>

</body>
</html>