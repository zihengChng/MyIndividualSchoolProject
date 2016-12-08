<?php 

require_once 'config.php';

$sql = "CREATE TABLE login(
		id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		email VARCHAR(60) NOT NULL,
		password TEXT NOT NULL,
		type_id INT(4) NOT NULL)";

/*$sql .= "CREATE TABLE type(
		 id INT(4) PRIMARY KEY,
		 name VARCHAR(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL);";

$sql .= "CREATE TABLE member(
		 id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		 name VARCHAR(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
		 age INT UNSIGNED NOT NULL,
		 gender INT(2) NOT NULL,
		 email VARCHAR(60),
		 address TEXT NOT NULL,
		 city VARCHAR(20) NOT NULL
		 );";
$sql .= "CREATE TABLE customer(
		 id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		 name VARCHAR(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
		 address TEXT NOT NULL,
		 city VARCHAR(20) NOT NULL
		 );";
$sql = "CREATE TABLE orders(
		id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		customer_id INT UNSIGNED NOT NULL,
		amount float(6,2) NOT NULL,
		o_date date,
		ship_address TEXT,
		ship_city VARCHAR(20) NOT NULL
		);";		 
$sql .= "CREATE TABLE order_items(
		id INT UNSIGNED NOT NULL,
		isbn VARCHAR(13) NOT NULL,
		item_price FLOAT(6,2) NOT NULL,
		quantity MEDIUMINT(6) UNSIGNED NOT NULL)";*/
if($conn->query($sql)===true){
	echo "success";
}else{
	echo $sql."<br>".$conn->error;
}

 ?>