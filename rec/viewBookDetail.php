<?php 
include'bootstrap.php';
include'top.php';
 ?>
<div class="col-sm-2 col-xs-3">
<?php include'category.php'; ?>
</div>
<div class="col-sm-9 col-xs-8 col-xs-offset-1">
	<div class="panel panel-default">
		<h3 class="text-center">Book Detail</h3>
		<div class="panel-heading">
<?php 
require_once'../php/config.php';
$id = $_GET['q'];

$sql = "SELECT b.book_name,b.book_cate,c.cat_name,b.book_descrip,b.book_publisher,b.book_edition,b.book_isbn,b.book_page,b.book_price,b.book_stock FROM book b INNER JOIN category c WHERE b.book_cate = c.cat_id AND b.book_isbn = '$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
 ?>
 			<h4 class="text-center"><?php echo $row['book_name']; ?></h4>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr>
					<td width="20%"><strong>Book Image</strong></td>
					<td class="text-center"><img src="../img/books/<?php echo $row['book_isbn']?>.jpg"></td>
				</tr>
				<tr>
					<td><strong>Category</strong></td>
					<td><a href="viewcategory.php?q=<?php echo $row['book_cate']; ?>"><?php echo $row['cat_name']; ?></a></td>
				</tr>
				<tr>
					<td><strong>Book Description</strong></td>
					<td><?php echo $row['book_descrip']; ?></td>
				</tr>
				<tr>
					<td><strong>Publisher</strong></td>
					<td><?php echo $row['book_publisher']; ?></td>
				</tr>
				<tr>
					<td><strong>Publish Year</strong></td>
					<td><?php echo $row['book_edition']; ?></td>
				</tr>
				<tr>
					<td><strong>ISBN</strong></td>
					<td><?php echo $row['book_isbn']; ?></td>
				</tr>
				<tr>
					<td><strong>Pages</strong></td>
					<td><?php echo $row['book_page']; ?></td>
				</tr>
				<tr>
					<td><strong>Price</strong></td>
					<td>RM&nbsp;<?php echo $row['book_price']; ?></td>
				</tr>
			</table>
		</div>
		<div class="panel-footer">
			<div class="text-left">
				<button class="btn btn-info btn-lg" onclick="history.back();"><span class="fa fa-arrow-left"></span>&nbsp;&nbsp;&nbsp;Back</button>
				<button class="btn btn-primary btn-lg" onclick="window.location='shopping_cart.php?new=<?php echo $row['book_isbn']; ?>'"><span class="fa fa-shopping-cart fa-lg" onclick=""></span>&nbsp;&nbsp;&nbsp;Put To Shopping Cart</button>
			</div>
		</div>
<?php 
 }
 $conn->close();
?>
	</div>
</div>
<?php include'footer.php' ?>