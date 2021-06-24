<?php  
	require 'function.php';
	$searchPhone = $_GET["ph"];
	$phones = query("SELECT * FROM phone WHERE phonename LIKE '%$searchPhone%'");
	$phoneid = $_GET["phoneid2"];
?>

<?php foreach ($phones as $phone): ?>
	<a href="compare.php?phoneid1=<?= $phone['phoneid']; ?>&phoneid2=<?= $phoneid; ?>">
	<div class="dPhone1-items">
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