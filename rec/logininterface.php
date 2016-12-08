<?php 
	include'bootstrap.php';
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12" style="margin-bottom: 25px;margin-top: 50px;">
			<div class="col-sm-4 col-sm-offset-5" >
				<a href="../index.php"><img src="<?php checkURL(); ?>img/webIcon/MyLogo.png" alt="Welcome to ZH BookStore" width="80%"></a>
			</div>	
		</div>
		<h3 class="text-center">Login</h3>
		<div class="col-sm-12" style="margin-bottom: 149px;margin-top: 25px;">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="card">
					<div class="card-container">
						<form class="form-horizontal" name="login-form" method="POST" action="../php/login.php">
							<div class="form-group">
								<div class="col-sm-3">
									<label for="loginemail" class="control-label">Email:</label>
								</div>
								<div class="col-sm-9">
									<input type="email" name="loginemail" class="form-control" placeholder="Email" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="loginpassword" class="control-label">Password:</label></span>
								</div>
								<div class="col-sm-9">
									<input type="password" name="loginpassword" class="form-control" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-primary btn-block" type="submit"><span class="fa fa-sign-in"></span>&nbsp;&nbsp;&nbsp;Login</button>
								</div>
							</div>
							<?php if(isset($_SESSION['flash'])){ ?>
							<p style="color: red;">
							<?php echo $_SESSION['flash']; ?>
							</p>
							<?php unset($_SESSION['flash']);} ?>
						</form>
					</div>
				</div>
				<br>
				<p>Don't have an account? <a href="registerinterface.php">Create An Account</a></p>
			</div>	
		</div>
	</div>
<?php include'footer.php'; ?>