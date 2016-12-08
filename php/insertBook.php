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
echo $tmp_name;
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
	}else{
		echo "<script>alert('File is not an image.');</script>";
		$uploadOk = 0;
	}
}else{
	$uploadOk=1;
}
$imagetype= $_FILES["image"]["type"];
$sql = "INSERT INTO book (book_name,book_cate,book_descrip,book_publisher,book_edition,book_isbn,book_page,book_price,book_stock) VALUES ('$name','$category','$description','$publisher','$edition','$isbn','$pages','$price','$stock')";
if($uploadOk == 1){
	if($conn->query($sql)){
		if($uploadOk==0){
			echo "<script>alert('Sorry your file was not uploaded.');</script>";
		}else{
			if (move_uploaded_file($tmp_name, $target_dir.$isbn.".".$imageFileType)){
				//echo "<script>alert('New Books Added');window.location.href='../rec/adminMain.php';</script>";
				move_uploaded_file($tmp_name, $target_file);
			}else{
				//echo "<script>alert('No Books Added');window.location.href='../rec/adminMain.php';</script>";
			}
		}
	}else{
		echo "Error: ".$sql. "<br>" .$conn->error;
	}
}else{
	echo "<script>alert('Sorry your file was not uploaded.');window.location.href='../rec/adminMain.php';</script>";	
}
$conn->close();
 ?>