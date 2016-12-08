<?php 

require_once'config.php';

$name = mysqli_real_escape_string($conn,$_POST['regisname']);
$email = mysqli_real_escape_string($conn,$_POST['regisemail']);
$password = mysqli_real_escape_string($conn,md5($_POST['regispassword']));
$age = mysqli_real_escape_string($conn,$_POST['regisage']);
$gender = mysqli_real_escape_string($conn,$_POST['regisgender']);
$address = mysqli_real_escape_string($conn,$_POST['regisaddress']);
$state = mysqli_real_escape_string($conn,$_POST['regisstates']);

$sql = "INSERT INTO login (email,password,type_id) VALUES('$email','$password','1');";
$sql .= "INSERT INTO member (name,age,gender,email,address,state) VALUES ('$name','$age','$gender','$email','$address','$state')";

if($conn->multi_query($sql)){
	echo "Success";
	echo "<script>alert('Successfully Register! Will direct you to login page');window.location='../rec/logininterface.php'</script>";
}else{
	echo $sql."<br>".$conn->error;
}

 ?>