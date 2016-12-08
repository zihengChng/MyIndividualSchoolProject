<?php 
include'bootstrap.php'; 
include'../php/sessionAdmin.php';
?>
<script type="text/javascript" src="../js/search.js"></script>
	<div class="container-fluid">
		<h1 class="text-center">Books Overview</h1>
		<div class="row">
			<div class="col-sm-12 text-right" style="margin-right: 10px;margin-bottom: 10px;">
				<button class="btn btn-default" onclick="window.location = '../php/logout.php'"><span class="fa fa-sign-out visible-xs"></span><span class="hidden-xs">Log Out</span></button>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-5">
					<form name="admin-book-search" method="" action="">
						<div class="form-group">
							<input type="text" class="form-control" id="adminSearch" onkeyup="showBooksAdmin(this.value)" placeholder="search by book name">
						</div>
					</form>
				</div>
				<div class="text-right" style="margin-right: 10px;margin-bottom: 10px;">
					<button class="btn btn-primary" onclick="window.location = 'addBookInter.php'"><span class="fa fa-plus"></span>&nbsp;&nbsp;Add New Book</button>
				</div>
			</div>
			<div class="col-sm-12 adminTable">
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
								require_once'../php/config.php';
								$no=0;
								$sql = "SELECT b.book_name,c.cat_name,b.book_publisher,b.book_isbn,b.book_price,b.book_stock FROM book b INNER JOIN category c WHERE b.book_cate = c.cat_id ORDER BY cat_name";
								$result2 = $conn->query($sql);
								$count = $result2->num_rows;
								while ($row2 = $result2->fetch_assoc()) {
									++$no;
							 ?>
							<tr>
								<td><?php echo $no; ?></td>
								<td width="25%"><a href="viewBookAdmin.php?q=<?php echo $row2['book_isbn']; ?>"><?php echo $row2['book_name'] ?></a></td>
								<td><?php echo $row2['cat_name']; ?></td>
								<td><?php echo $row2['book_publisher']; ?></td>
								<td><?php echo $row2['book_isbn']; ?></td>
								<td>RM&nbsp;<?php echo $row2['book_price']; ?></td>
								<td><img src="../img/books/<?php echo $row2['book_isbn']?>.jpg" width="130px" height="150px"></td>
								<td ><?php echo $row2['book_stock']; ?></td>
								<td>
									<button class="btn btn-info btn-xs" onclick="window.location='viewBookAdmin.php?q=<?php echo $row2['book_isbn']; ?>'"><span class="fa fa-eye fa-lg"></span></button>
									<button class="btn btn-primary btn-xs"><span class="fa fa-pencil-square-o fa-lg" onclick="window.location='editBookInter.php?q=<?php echo $row2['book_isbn']; ?>'"></span></button>
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
			</div>
		</div>
	
<?php include'footer.php' ?>