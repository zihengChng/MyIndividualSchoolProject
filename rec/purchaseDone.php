<?php 
	include'bootstrap.php';
	include'top.php';
?>
<h1>Your Purchase is done.Will ship to you in 7 workdays</h1>
<h1>Thank You For Your Purchase</h1>
<h1>You will be redirect to home page in 3 seconds.If it doesn't redirect automatic <a href="<?php if(isset($_SESSION['member'])){echo "memberMain.php";}else{echo "../index.php";} ?>">click here</a></h1>
<!--this will auto redirect the user to the url-->
<meta http-equiv="refresh" content="3; url=<?php if(isset($_SESSION['member'])){echo "memberMain.php";}else{echo "../index.php";} ?>">