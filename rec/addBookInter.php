<?php include'bootstrap.php' ?>
<script type="text/javascript" src="../js/form.js"></script>
	<div class="container">
		<div class="row">
		<h3 class="text-center">Add New Book</h3>
		<div class="col-sm-12" style="margin-bottom: 149px;margin-top: 25px;">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="card">
					<div class="card-container">
						<form class="form-horizontal" name="addNewBook-form" method="POST" action="../php/insertBook.php" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-sm-3">
									<label for="bookName" class="control-label">Book Name:</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="bookName" class="form-control" placeholder="Book Name" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="category" class="control-label">Category:</label></span>
								</div>
								<div class="col-sm-9">
									<select name="category" class="form-control" required>
										<option value="1">Architecture</option>
										<option value="2">Art And Culture</option>
										<option value="3">Forest</option>
										<option value="4">Sports</option>
										<option value="5">Astrology</option>
										<option value="6">Business</option>
										<option value="7">Economics</option>
										<option value="8">Low Books</option>
										<option value="9">Tourism</option>
										<option value="10">Yoga</option>
										<option value="11">Religion</option>
										<option value="12">Management</option>
										<option value="13">Terrorism</option>
										<option value="14">Tracking</option>
										<option value="15">Fiction</option>
										<option value="16">Comics</option>
										<option value="17">Computer</option>
										<option value="18">Cooking</option>
										<option value="19">Science</option>
										<option value="20">Compititive Exam</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="bookDes" class="control-label">Description:</label>
								</div>
								<div class="col-sm-9">
									<textarea name="bookDes" class="form-control" placeholder="Description" rows="5" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="publisher" class="control-label">Publisher:</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="publisher" class="form-control" placeholder="Publisher" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="edition" class="control-label">Publish Year:</label>
								</div>
								<div class="col-sm-9">
									<input type="number" name="edition" class="form-control" placeholder="Publish Year" required>
								</div>
							</div>
							<div class="form-group" id="isbn">
								<div class="col-sm-3">
									<label for="isbn" class="control-label">ISBN:</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="isbn" class="form-control" placeholder="ISBN" onkeyup="checkISBN(this.value);" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="pages" class="control-label">Pages of book:</label>
								</div>
								<div class="col-sm-9">
									<input type="number" name="pages" class="form-control" placeholder="pages of book" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="price" class="control-label">Sell Price:</label>
								</div>
								<div class="col-sm-9">
									<input type="number" name="price" class="form-control" placeholder="price" step="0.01" min="0.01" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label class="control-label" for="image">Book Image:</label>
								</div>
								<div class="col-sm-9">
									<input type="file" name="image" id="image" class="form-control" required>

								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="stock" class="control-label">Stock Remain:</label>
								</div>
								<div class="col-sm-9">
									<input type="number" name="stock" class="form-control" placeholder="stock remain" min="0" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-primary btn-block" type="submit" id="add"><span class="fa fa-plus"></span>&nbsp;&nbsp;&nbsp;Add Book</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>	
		</div>
		<button class="btn btn-info btn-lg" onclick="history.back();" style="margin-bottom: 10px;"><span class="fa fa-arrow-left"></span>&nbsp;&nbsp;&nbsp;Back</button>
	</div>
<?php include'footer.php' ?>
	