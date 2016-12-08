<?php 
require_once('config.php');
if(isset($_SESSION['member'])){

}else{
	echo "<script>alert('The website you request just for member.')</script>";
	echo "<script>window.location='../index.php'</script>";
}
 ?>