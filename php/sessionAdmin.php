<?php 
require_once('config.php');

$type_check=$_SESSION['type'];
if($type_check==2){

}else{
	echo "<script>alert('The website you request isn\'t for you.')</script>";
	echo "<script>window.location='../index.php'</script>";
}
 ?>