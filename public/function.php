<?php  
	session_start();
	$koneksi = mysqli_connect("127.0.0.1:3307", "gadgetlog", "Gadgetlog.1", "gadgetlog");

	function query($query) {
		global $koneksi;
		$result = mysqli_query($koneksi, $query);
		$rows = [];
		while ( $row = mysqli_fetch_array($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function login($data)
	{
		global $koneksi;

		$username = $data["username"];
		$password = $data["password"];

		$result = mysqli_query($koneksi, "SELECT * FROM account WHERE username = '$username' AND type='user' ");
		if(!empty($result))  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;
                          $_SESSION["username"] = $username;  
                          $_SESSION["login"] = true;
                     }  
                     else  
                     {  
                          //return false;  
                          echo "<script>alert('Wrong username/password')</script>";  
                     }  
                }  
           }  
           else  
           {  
                echo "<script>alert('Wrong username/password')</script>"; 
           }  
	}

	function register($data){
		global $koneksi;

		$email = htmlspecialchars($data["email"]);
		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($koneksi, $data["password"]);
		$password_conf = mysqli_real_escape_string($koneksi, $data["password_conf"]);

		$result = mysqli_query($koneksi, "SELECT username FROM account WHERE username='$username'");

		if(mysqli_fetch_assoc($result)){
			echo "<script>
					alert('username is already exist');
				  </script>";
			return false;
		}

		if($password !== $password_conf){
			echo "<script>
					alert('Confirm Password must be same with password');
				  </script>";
			return false;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);
		mysqli_query($koneksi, "INSERT INTO account VALUES('', '$username', '$password', '$email','user')");

		return mysqli_affected_rows($koneksi);
	}

	function contactus($data){
		global $koneksi;
		
		$salutation = $data["salutation"];
		$name = htmlspecialchars($data["name"]);
		$subject = htmlspecialchars($data["subject"]);
		$email = htmlspecialchars($data["email"]);
		$message = htmlspecialchars($data["message"]);
		

		$result = mysqli_query($koneksi, "INSERT INTO contactus VALUES ('', '$salutation', '$name', '$subject', '$email', NOW(),'$message', '')");

		return mysqli_affected_rows($koneksi);
	}

	// create discussion
	function createDis($data){
		global $koneksi;

		$username = $_SESSION["username"];
		$dataUser = mysqli_query($koneksi, "SELECT userid FROM account WHERE username='$username'");
		$userid = $dataUser->fetch_array()[0];
		$brand = $_GET["brand"];
		$topic = mysqli_escape_string($koneksi, htmlspecialchars($data["topic"]));
		$problem = mysqli_escape_string($koneksi, htmlspecialchars($data["problem"]));		

		$query = "INSERT INTO discussion VALUES ('', $userid ,'$brand', '$topic', '$problem', NOW(), 0)";
		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

	// create comment
	function createCom($data){
		global $koneksi;

		$username = $_SESSION["username"];
		$dataUser = mysqli_query($koneksi, "SELECT userid FROM account WHERE username='$username'");
		$userid = $dataUser->fetch_array()[0];

		$comment = $data["comment"];
		$discussionid = $data["discussionid"];
		// var_dump($userid);

		$query = "INSERT INTO comment VALUES ($discussionid, $userid , '$comment', NOW())";
		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

	function hapus($discussionid){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM discussion WHERE discussionid= $discussionid");

		return mysqli_affected_rows($koneksi);
	}

	//search discussion
	function searchDis($problem, $brand){
		$query = "SELECT * FROM discussion WHERE brand='$brand' AND (topic LIKE '%$problem%' OR problem LIKE '%$problem%')";
		return query($query);
	}
?>

