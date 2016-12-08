<?php 
require_once'config.php';
$id = $_GET['q'];
$sql = "DELETE FROM book WHERE book_isbn = '$id'";
if($conn->query($sql)){
	echo "<script>alert('Successfully Delete')</script>";
	echo "<script>window.location='../rec/adminMain.php'</script>";
}

 ?>