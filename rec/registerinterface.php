<?php 
	include'bootstrap.php';
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12" style="margin-bottom: 25px;">
			<div class="col-sm-4 col-sm-offset-5" >
				<a href="../index.php"><img src="<?php checkURL(); ?>img/webIcon/MyLogo.png" alt="Welcome to ZH BookStore" width="80%"></a>
			</div>	
		</div>
		<h3 class="text-center">Create new account</h3>
		<div class="col-sm-12" style="margin-bottom: 50px;margin-top: 25px;">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="card">
					<div class="card-container">
						<form class="form-horizontal" name="register-form" method="POST" action="../php/register.php">
							<div class="form-group">
								<div class="col-sm-3">
									<label for="regisname" class="control-label">Name:</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="regisname" class="form-control" placeholder="Name" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="regisemail" class="control-label">Email:</label>
								</div>
								<div class="col-sm-9">
									<input type="email" name="regisemail" class="form-control" placeholder="Email" required>
								</div>
							</div>
							<div class="form-group" id="pass1">
								<div class="col-sm-3">
									<label for="regispassword" class="control-label">Password:</label></span>
								</div>
								<div class="col-sm-9">
									<input type="password" id="regispassword" name="regispassword" class="form-control" placeholder="Password"
									onkeyup="checkPass();return false;" required>
								</div>
							</div>
							<div class="form-group" id="pass2">
								<div class="col-sm-3">
									<label for="regispassword2" class="control-label">Confirm Password:</label></span>
								</div>
								<div class="col-sm-9">
									<input type="password" id="regispassword2" name="regispassword2" class="form-control" placeholder="Password" onkeyup="checkPass();return false;" required>
								</div>
							</div>
							<span id="confirmMessage" class="help-block"></span>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="regisage" class="control-label">Age:</label>
								</div>
								<div class="col-sm-9">
									<input type="number" name="regisage" class="form-control" placeholder="Age" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="regisgender" class="control-label">Gender:</label>
								</div>
								<div class="col-sm-9">
									<select class="form-control" name="regisgender">
										<option value="1">Male</option>
										<option value="2">Female</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="regisaddress" class="control-label">Address:</label>
								</div>
								<div class="col-sm-9">
									<textarea name="regisaddress" class="form-control" placeholder="Address" rows="4" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="regisstates" class="control-label">State:</label>
								</div>
								<div class="col-sm-9">
									<select class="form-control" name="regisstates" required>
										<option value="Johor">Johor</option>
										<option value="Malacca">Malacca</option>
										<option value="Negeri Sembilan">Negeri Sembilan</option>
										<option value="Kedah">Kedah</option>
										<option value="Kelantan">Kelantan</option>
										<option value="Pahang">Pahang</option>
										<option value="Perak">Perak</option>
										<option value="Penang">Penang</option>
										<option value="Selangor">Selangor</option>
										<option value="Terengganu">Terengganu</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-primary btn-block" type="submit" id="regisbtn"><span class="fa fa-user-plus"></span>&nbsp;&nbsp;&nbsp;Register</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<br>
				<p>Already have an account? <a href="logininterface.php">Sign In Now!</a></p>
			</div>	
		</div>
	</div>
<?php include'footer.php'; ?>