<?php 
	///shopping cart need session so we start for it
	session_start();
	require_once'config.php';
	$name = $conn->real_escape_string($_POST['name']);
	$address = $conn->real_escape_string($_POST['address']);
	$state = $conn->real_escape_string($_POST['state']);
	$shipping_name = $conn->real_escape_string($_POST['shipping_name']);
	$shipping_address = $conn->real_escape_string($_POST['shipping_address']);
	$shipping_state = $conn->real_escape_string($_POST['shipping_state']);
	$amount = $_SESSION['total_price'];
	//isset the cart session and those thing we need
	if((isset($_SESSION['cart'])) && (isset($name)) && (isset($address)) && (isset($state))){
		if(($shipping_name == "")&&($shipping_address == "")&&($shipping_state == "")){
			$shipping_name = $name;
			$shipping_address = $address;
			$shipping_state = $state;
		}
		$sql = "INSERT INTO customer (name,address,state) VALUES('$name','$address','$state')";
		$result = $conn->query($sql);
		if($result){
			echo "done(customer)";
		}else{
			echo "failed(customer)";
		}
		//this get the last AUTO_INCREMENT unique id from the last query
		$customerId = $conn->insert_id;
		$date = date("Y-m-d");
		$sql = "INSERT INTO orders (customer_id,amount,o_date,ship_name,ship_address,ship_state) VALUES ('$customerId','$amount','$date','$shipping_name','$shipping_address','$shipping_state')";
		$result = $conn->query($sql);
		if($result){
			echo "done(orders)";
		}else{
			echo "failed(orders)";
			echo $conn->error;
		}
		$ordersId = $conn->insert_id;
		foreach ($_SESSION['cart'] as $isbn => $quantity) {
			$sql = "SELECT book_price,book_stock FROM book WHERE book_isbn = '$isbn'";
			$result = $conn->query($sql);
			if($result){
				$row = $result->fetch_assoc();
				$item_price = $row['book_price'];
				$bSotck = $row['book_stock'];
			}
			$sql = "INSERT INTO order_items (id,isbn,item_price,quantity) VALUES ('$ordersId','$isbn','$item_price','$quantity')";
			$result = $conn->query($sql);
			if($result){
				echo "done(order_items)";
				$stock = $bSotck - $quantity;
				$sql = "UPDATE book SET book_stock=$stock WHERE book_isbn = '$isbn'";
				$result = $conn->query($sql);
				if($result){
					echo "done(update)";
				}else{
					echo "failed(update)";
				}
			}else{
				echo "failed(order_items)";
			}
		}
		unset($_SESSION['cart']);
		unset($_SESSION['items']);
		unset($_SESSION['total_price']);
		header("location:../rec/purchaseDone.php");
	}else{
		echo "<script>alert(Got some problem to done your purchse.Check does u fill all the thing that required?);window.history.back();<script>";
	}
 ?>