<?php include'rec/bootstrap.php'; ?>
<?php include'rec/top.php'; ?>
<?php include'rec/mainCarousel.php'; ?>
<div class="col-sm-2 col-xs-3">
	<table class="table table-bordered category">
		<thead>
			<tr>
				<th>Catogory</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			require_once 'php/config.php';
			$sql = 	"SELECT * FROM category ORDER BY cat_name";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
		 ?>
			<tr>
				<td><a href="rec/viewcategory.php?q=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a></td>
			</tr>
		<?php 
			}
		 ?>
		</tbody>
	</table>
</div>
<div class="col-sm-9 col-xs-8 col-xs-offset-1">
<?php include'rec/productCarouselIndex.php'; ?>
</div>
<?php include'rec/footer.php'; ?>