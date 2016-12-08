<?php 
require_once 'config.php';
session_start();

$email = mysqli_real_escape_string($conn,$_POST['loginemail']);
$password = mysqli_real_escape_string($conn,md5($_POST['loginpassword']));

$sql = " SELECT * FROM login WHERE email =  '$email' AND password = '$password' ";
$result = $conn->query($sql);
$count = $result->num_rows;
if($count==1){
	$row = $result->fetch_assoc();
	$_SESSION['member'] = $row['email'];
	$_SESSION['type'] = $row['type_id'];
	if($row['type_id']==1){
		header('location:../rec/memberMain.php');
	}elseif($row['type_id']==2){
		header('location:../rec/adminMain.php');
	}
}else{
	$_SESSION['flash'] = "Wrong username or password.Please enter again.";
	header('location:../rec/logininterface.php');
}
$conn->close();
 ?>