<table class="table table-bordered category">
	<thead>
		<tr>
			<th>Catogory</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		require_once '../php/config.php';
		$sql = 	"SELECT * FROM category ORDER BY cat_name";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
	 ?>
		<tr>
			<td><a href="viewcategory.php?q=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a></td>
		</tr>
	<?php 
		}
	 ?>
	</tbody>
</table>