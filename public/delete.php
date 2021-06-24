<?php
	require 'function.php';
	 
	if(!isset($_SESSION["login"])){
		header("Location: home.php");
		exit;
	}
	
	$discussionid = $_GET["discussionid"];
	$brand = $_GET["brand"];

	if( hapus($discussionid) > 0 ){
		echo "
			<script>
				alert('Discussion Delete Successful!');
				document.location.href = 'discussarea.php?brand=$brand';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Discussion Delete Failed!');
				document.location.href = 'discussarea.php?brand=$brand';
			</script>
		";
	}
?>