<script type="text/javascript" src="<?php checkURL(); ?>js/search.js" ></script>
<div class="container-fluid">
	<div class="container">
		<div class="row top-menu">
			<div class="col-sm-3 item">
				<a href="index.php"><img src="<?php checkURL(); ?>img/webIcon/MyLogo.png" alt="Welcome to ZH BookStore" width="80%"></a>
			</div>
			<div class="col-sm-4 item text-center">
				<form>
					<input type="text" name="search" onkeyup="<?php if($_SESSION['filename'] =='index.php' || $_SESSION['filename'] == 'WebDevelopmentProject'){echo "livesearch(this.value)";}else{echo 'livesearch2(this.value)';}?>" class="form-control">
					<div id="livesearch"></div>
				</form>
			</div>
			<div class="col-sm-offset-1 col-sm-4 item">
				<?php if(!(isset($_SESSION['member']))){
				?>
					<button class="btn btn-default" onclick="window.location = '<?php checkURL2(); ?>logininterface.php'"><span class="fa fa-sign-in visible-xs"></span><span class="hidden-xs">Log In</span></button>&nbsp;<button class="btn btn-default" onclick="window.location = '<?php checkURL2(); ?>registerinterface.php'"><span class="fa fa-user-plus visible-xs"></span><span class="hidden-xs">Register</span></button>
				<?php
				}else{
				?>
					<button class="btn btn-default" onclick="window.location = '../php/logout.php'"><span class="fa fa-sign-out visible-xs"></span><span class="hidden-xs">Log Out</span></button>
				<?php 
				} 
				?>
				<button class="btn colored" onclick="window.locaation = '<?php checkURL2(); ?>shopping_cart.php'">View ShoppingCart <span class="badge"><?php echo $_SESSION['items']; ?></span></button>
			</div>
		</div>
	</div>
</div>
<div class="navbar navbar-default menu">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-bar"><span class="fa fa-bars"></span></button>
		</div>
		<div class="collapse navbar-collapse" id="menu-bar">
			<div class="col-sm-offset-5">
				<ul class="nav navbar-nav menu-nav">
					<li><a href="<?php checkURL();homeLinkURL() ?>">Home</a></li>
					<li><a href="<?php checkURL2(); ?>shopping_cart.php">View Shopping Cart</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">