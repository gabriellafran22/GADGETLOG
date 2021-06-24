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
    			<form method="post">
    				<input type="hidden" name="phoneID" value="<?php echo $row['phoneid'] ?>">
    				<button onclick="if(!confirm('Are you sure you want to delete this phone?')) return false" type="submit" name="deletebtn" id="btn">Delete</button>
    			</form>
    		</td>
    	</tr>
	    	<?php $i++ ?>
			<?php } ?>
    </tbody>
 </table>