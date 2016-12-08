<!DOCTYPE html>
<html>
<head>
	<?php 
		session_start();
		//the _SERVER['REQUEST_URI'] will get the whole URL down.
		//the basename() function let it left the blablabl.php or blablabla.html
		$_SESSION['filename'] = basename($_SERVER['REQUEST_URI']);
		//echo "<script>alert(\"".$_SESSION['filename']."\")</script>";
		function checkURL(){
			if($_SESSION['filename'] =='index.php' || $_SESSION['filename'] == 'WebDevelopmentProject'){
				echo "";
			}else{
				echo '../';
			}
		}
		function homeLinkURL(){
			if(!isset($_SESSION['member'])){
				echo "index.php";
			}else{
				echo 'memberMain.php';
			}	
		}
		function checkURL2(){
			if($_SESSION['filename'] =='index.php' || $_SESSION['filename'] == 'WebDevelopmentProject'){
				echo "rec/";
			}else{
				echo '';
			}
		}
		if(!isset($_SESSION['items'])){
			$_SESSION['items'] = 0;
		}
		if(!isset($_SESSION['total_price'])){
			$_SESSION['total_price'] = '0.00';
		}
	?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php checkURL(); ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php checkURL(); ?>css/myStyle.css">
	<link rel="icon" type="image/png" href="<?php checkURL(); ?>img/webIcon/MyIcon.png">
	<script src="<?php checkURL(); ?>js/jquery-3.1.1.js"></script>
	<script src="<?php checkURL(); ?>js/bootstrap.js"></script>
	<script src="<?php checkURL(); ?>js/stickynavbar.js"></script>
	<script src="../js/checkPass.js"></script>
	<title>Zh Book Store</title>
</head>
<body id="top">
	<div class="body-margin">