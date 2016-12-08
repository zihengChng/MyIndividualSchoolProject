<div class="table-responsive">
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
								<th>Stock Remain</th>
								<th>Function</th>
							</tr>
						</thead>
						<tbody>
<?php 
require_once'config.php';

$keyword = $_POST['hint'];

//$sql = "SELECT book_name FROM book WHERE book_name LIKE '%$keyword%'";
$sql = "SELECT b.book_name,c.cat_name,b.book_publisher,b.book_isbn,b.book_price,b.book_stock FROM book b INNER JOIN category c WHERE b.book_cate = c.cat_id AND b.book_name LIKE '%$keyword%' ORDER BY cat_name";
$no = 0;
$result3 = $conn->query($sql);
while ($row3 = $result3->fetch_assoc()) {
++$no;
?>
<tr>
	<td><?php echo $no; ?></td>
	<td width="25%"><?php echo $row3['book_name'] ?></td>
	<td><?php echo $row3['cat_name']; ?></td>
	<td><?php echo $row3['book_publisher']; ?></td>
	<td><?php echo $row3['book_isbn']; ?></td>
	<td>RM&nbsp;<?php echo $row3['book_price']; ?></td>
	<td><img src="../img/books/<?php echo $row3['book_isbn']; ?>.jpg" width="130px" height="150px"></td>
	<td ><?php echo $row3['book_stock']; ?></td>
	<td>
		<button class="btn btn-info btn-xs" onclick="window.location='../rec/viewBookAdmin.php?q=<?php echo $row2['book_isbn']; ?>'"><span class="fa fa-eye fa-lg"></span></button>
		<button class="btn btn-primary btn-xs"><span class="fa fa-pencil-square-o fa-lg" onclick="window.location='../rec/editBookInter.php?q=<?php echo $row2['book_isbn']; ?>'"></span></button>
		<button class="btn btn-danger btn-xs" onclick="var b = <?php echo $row2['book_stock']; ?>;if(b!=0){alert('Still left some stock can\'t delete this book');}else{var a = confirm('Are your sure want to delete this book?');if(a){window.location = '../php/deleteBook.php?q=<?php echo $row2['book_isbn']; ?>';}}"><span class="fa fa-trash-o fa-lg"></span></button>
	</td>
</tr>
<?php 
	}
$conn->close();
?>
</tbody>
</table>
</div>