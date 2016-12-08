<?php include'bootstrap.php' ?>
<script type="text/javascript" src="../js/form.js"></script>
	<div class="container">
		<div class="row">
		<h3 class="text-center">Add New Book</h3>
		<div class="col-sm-12" style="margin-bottom: 149px;margin-top: 25px;">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="card">
					<div class="card-container">
						<form class="form-horizontal" name="editBook-form" method="POST" action="../php/editBook.php" enctype="multipart/form-data">
						<?php 
							require_once '../php/config.php' ;
							$id = $_GET['q'];
							$sql = "SELECT * FROM book WHERE book_isbn = '$id'";
							$result4 = $conn->query($sql);
							while($rows3=$result4->fetch_assoc()){
						 ?>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="bookName" class="control-label">Book Name:</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="bookName" class="form-control" placeholder="Book Name" value="<?php echo $rows3['book_name']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="category" class="control-label">Category:</label></span>
								</div>
								<div class="col-sm-9">
									<select name="category" class="form-control" required>
										<option value="1" <?php if($rows3['book_cate']==1){echo 'selected = "selected"';} ?> >Architecture</option>
										<option value="2" <?php if($rows3['book_cate']==2){echo 'selected = "selected"';} ?> >Art And Culture</option>
										<option value="3" <?php if($rows3['book_cate']==3){echo 'selected = "selected"';} ?> >Forest</option>
										<option value="4" <?php if($rows3['book_cate']==4){echo 'selected = "selected"';} ?> >Sports</option>
										<option value="5" <?php if($rows3['book_cate']==5){echo 'selected = "selected"';} ?> >Astrology</option>
										<option value="6" <?php if($rows3['book_cate']==6){echo 'selected = "selected"';} ?> >Business</option>
										<option value="7" <?php if($rows3['book_cate']==7){echo 'selected = "selected"';} ?> >Economics</option>
										<option value="8" <?php if($rows3['book_cate']==8){echo 'selected = "selected"';} ?> >Low Books</option>
										<option value="9" <?php if($rows3['book_cate']==9){echo 'selected = "selected"';} ?> >Tourism</option>
										<option value="10" <?php if($rows3['book_cate']==10){echo 'selected = "selected"';} ?> >Yoga</option>
										<option value="11" <?php if($rows3['book_cate']==11){echo 'selected = "selected"';} ?> >Religion</option>
										<option value="12" <?php if($rows3['book_cate']==12){echo 'selected = "selected"';} ?> >Management</option>
										<option value="13" <?php if($rows3['book_cate']==13){echo 'selected = "selected"';} ?> >Terrorism</option>
										<option value="14" <?php if($rows3['book_cate']==14){echo 'selected = "selected"';} ?> >Tracking</option>
										<option value="15" <?php if($rows3['book_cate']==15){echo 'selected = "selected"';} ?> >Fiction</option>
										<option value="16" <?php if($rows3['book_cate']==16){echo 'selected = "selected"';} ?> >Comics</option>
										<option value="17" <?php if($rows3['book_cate']==17){echo 'selected = "selected"';} ?> >Computer</option>
										<option value="18" <?php if($rows3['book_cate']==18){echo 'selected = "selected"';} ?> >Cooking</option>
										<option value="19" <?php if($rows3['book_cate']==19){echo 'selected = "selected"';} ?> >Science</option>
										<option value="20" <?php if($rows3['book_cate']==20){echo 'selected = "selected"';} ?> >Compititive Exam</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="bookDes" class="control-label">Description:</label>
								</div>
								<div class="col-sm-9">
									<textarea name="bookDes" class="form-control" placeholder="Description" rows="5" required><?php echo $rows3['book_descrip']; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="publisher" class="control-label">Publisher:</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="publisher" class="form-control" placeholder="Publisher" value="<?php echo $rows3['book_publisher']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="edition" class="control-label">Publish Year:</label>
								</div>
								<div class="col-sm-9">
									<input type="number" name="edition" class="form-control" placeholder="Publish Year" value="<?php echo $rows3['book_edition']; ?>"  required>
								</div>
							</div>
							<div class="form-group" id="isbn">
								<div class="col-sm-3">
									<label for="isbn" class="control-label">ISBN:</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="isbn" class="form-control" placeholder="ISBN" value="<?php echo $rows3['book_isbn']; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="pages" class="control-label">Pages of book:</label>
								</div>
								<div class="col-sm-9">
									<input type="number" name="pages" class="form-control" placeholder="pages of book" value="<?php echo $rows3['book_page']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="price" class="control-label">Sell Price:</label>
								</div>
								<div class="col-sm-9">
									<input type="number" name="price" class="form-control" placeholder="price" step="0.01" min="0.01" value="<?php echo $rows3['book_price']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label class="control-label" for="image">Book Image:</label>
								</div>
								<div class="col-sm-9">
									<input type="file" name="image" id="image" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="stock" class="control-label">Stock Remain:</label>
								</div>
								<div class="col-sm-9">
									<input type="number" name="stock" class="form-control" placeholder="stock remain" min="0" value="<?php echo $rows3['book_stock']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-primary btn-block" type="submit" id="add"><span class="fa fa-pencil-square-o"></span>&nbsp;&nbsp;&nbsp;Edit Book</button>
								</div>
							</div>
							<?php 
								}
								$conn->close();
							 ?>
						</form>
					</div>
				</div>
			</div>	
		</div>
		<button class="btn btn-info btn-lg" onclick="history.back();" style="margin-bottom: 10px;"><span class="fa fa-arrow-left"></span>&nbsp;&nbsp;&nbsp;Back</button>
	</div>
<?php include'footer.php' ?>