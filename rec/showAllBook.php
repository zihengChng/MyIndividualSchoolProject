<?php 
include'bootstrap.php';
include'top.php';
?>
<div class="col-sm-2 col-xs-3">
<?php include'category.php'; ?>
</div>
<div class="col-sm-9 col-xs-8 col-xs-offset-1">
	<table class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<th>No.</th>
				<th>Book Name</th>
				<th>Category</th>
				<th>Publisher</th>
				<th>ISBN</th>
				<th>Price</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				require_once'../php/config.php';
				$no=0;
				$sql = "SELECT b.book_name,b.book_cate,c.cat_name,b.book_publisher,b.book_isbn,b.book_price	 FROM book b INNER JOIN category c WHERE b.book_cate = c.cat_id AND b.book_stock > 0 ORDER BY cat_id";
				$result2 = $conn->query($sql);
				$count = $result2->num_rows;
				while ($row2 = $result2->fetch_assoc()) {
					++$no;
			 ?>
			 <tr>
			 	<td><?php echo $no; ?></td>
			 	<td width="25%"><a href="viewBookDetail.php?q=<?php echo $row2['book_isbn']; ?>"><?php echo $row2['book_name'] ?></a></td>
			 	<td><a href="viewcategory.php?q=<?php echo $row2['book_cate']; ?>"><?php echo $row2['cat_name']; ?></a></td>
			 	<td><?php echo $row2['book_publisher']; ?></td>
			 	<td><?php echo $row2['book_isbn']; ?></td><td>RM&nbsp;<?php echo $row2['book_price']; ?></td>
			 	<td><img src="../img/books/<?php echo $row2['book_isbn']?>.jpg" width="80px" height="100px"></td>
			 </tr>
			 <?php 
			 	}
			 	$conn->close();
			  ?>
		</tbody>
	</table>
</div>
<?php include'footer.php'; ?>