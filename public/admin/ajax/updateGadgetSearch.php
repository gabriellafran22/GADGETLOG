<?php 
require '../adminfunction.php';
$searchPhone = $_GET["phone"];
$phone = query("SELECT * FROM phone WHERE phonename LIKE '%$searchPhone%' AND phonebrandid > 0");
?>

<table class="table table-bordered">
    <thead>
		<tr>
			<th>No.</th>
			<th>Phone Name</th>
			<th>Brand</th>
			<th>Option</th>
		</tr>
    </thead>
    <tbody>
    		<?php $i=1 ?>
			<?php foreach ($phone as $row) { ?>	
    	<tr>
	    	<td><?php echo $i ?></td>
	    	<td><?php echo $row["phonename"] ?></td>
	    	<td><?php $temp = $row["phonebrandid"];
	    		$phonebrand = mysqli_query($koneksi, "SELECT name FROM phonebrand WHERE phonebrandid ='$temp'");
					echo $phonebrand->fetch_array()[0];

	    	?></td>
    		<td>
    			<button onclick="window.open('updategadgetEdit.php?phoneid=<?php echo $row["phoneid"] ?>','_self')" name="editbtn" id="btn">Edit</button>
    		</td>
    	</tr>
	    	<?php $i++ ?>
			<?php } ?>
    </tbody>
 </table>