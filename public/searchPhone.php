<?php  
	require 'function.php';
	$searchPhone = $_GET["phone"];
	$phones = query("SELECT * FROM phone WHERE phonename LIKE '%$searchPhone%'");
?>

<?php foreach ($phones as $phone): ?>
	<a href="specification.php?phoneid=<?= $phone['phoneid']; ?>">
	<div class="dropPhone-items">
		<?php 
			$brandId = $phone['phonebrandid'];
			$temp = mysqli_query($koneksi, "SELECT name from phonebrand WHERE phonebrandid=$brandId");
			$brandName = $temp->fetch_array()[0];
		?>
		<img src="images/phones/<?= $brandName; ?>/<?= $phone['phoneimg']; ?>" width="60px">
		<?= $phone['phonename']; ?>
	</div>
	</a>
<?php endforeach ?>