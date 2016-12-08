<?php 
require_once'config.php';

$name = mysqli_real_escape_string($conn,$_POST['bookName']);
$category = mysqli_real_escape_string($conn,$_POST['category']);
$description = mysqli_real_escape_string($conn,$_POST['bookDes']);
$publisher = mysqli_real_escape_string($conn,$_POST['publisher']);
$edition = mysqli_real_escape_string($conn,$_POST['edition']);
$isbn = mysqli_real_escape_string($conn,$_POST['isbn']);
$pages = mysqli_real_escape_string($conn,$_POST['pages']);
$price = mysqli_real_escape_string($conn,$_POST['price']);
$stock = mysqli_real_escape_string($conn,$_POST['stock']);

$target_dir = '../img/books/';
$target_file = $target_dir.basename($_FILES['image']['name']);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$tmp_name = $_FILES['image']['tmp_name'];
if($tmp_name==null){
	$check = false;
}else{
	$check = true;
}
if($_FILES['image']['name']!=''){
	if($check!=false){
		if($imageFileType != 'jpg'){
			echo "<script>alert('Sorry, only JPG is allowed');</script>";
			$uploadOk = 0;
		}else{
			$uploadOk = 1;
		}
	}
}else{
	$uploadOk=1;
}
$imagetype= $_FILES["image"]["type"];
$sql = "UPDATE book SET book_name='$name',book_cate='$category',book_descrip='$description',book_publisher='$publisher',book_edition='$edition',book_page='$pages',book_price='$price',book_stock='$stock' WHERE book_isbn = '$isbn'";
if($conn->query($sql)){
	if($uploadOk==0){
		echo "<script>alert('Sorry your file was not uploaded.');</script>";
	}else{
		echo "<script>alert('Books successfully edited');window.location.href='../rec/adminMain.php';</script>";
		if (move_uploaded_file($tmp_name, $target_dir.$isbn.".".$imageFileType)){
			move_uploaded_file($tmp_name, $target_file);
		}else{
			
		}
	}
}else{
	echo "<script>alert('Some error happen to edit book,will directed you back to show all book.');window.location.href='../rec/adminMain.php';</script>";
	//echo "Error: ".$sql. "<br>" .$conn->error;
}
$conn->close();
 ?>