<?php 
include'bootstrap.php';
include'top.php';
 ?>
 <?php 
	require_once'../php/config.php';
	//if get new item from other place
	//the new is the unique key to different your items
	@$new = $_GET['new'];
	if($new){
		//if no session cart yet set a session for cart	
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
			$_SESSION['items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}
		//if got cart then assign the item into the cart
		//the cart use associative array
		if(isset($_SESSION['cart'][$new])){
			$_SESSION['cart'][$new]++;
		}else{
			$_SESSION['cart'][$new] = 1;
		}
		//sum total price and item for all item in the cart
		if(is_array($_SESSION['cart'])){
			$_SESSION['items'] = 0;
			$_SESSION['total_price'] = '0.00';
			foreach ($_SESSION['cart'] as $isbn => $qty) {
				$sql = "SELECT book_price FROM book WHERE book_isbn = '$isbn'";
				$result = $conn->query($sql);
				if($result){
					$item = $result->fetch_object();
					$item_price = $item->book_price;
					$_SESSION['total_price'] += $item_price*$qty;
				}
				$_SESSION['items'] += $qty;
			}
		}
	}
	//if user change the quantity and press the save button
	if(isset($_POST['save'])){
		//check the array
		foreach ($_SESSION['cart'] as $isbn => $qty) {
			//if post come d text is 0 unset it else 
			//the assosiative array value change with the key
			if($_POST[$isbn] == '0'){
				unset($_SESSION['cart'][$isbn]);
			}else{
				$_SESSION['cart'][$isbn] = $_POST[$isbn];
			}
		}
		//check the session is array or not ,erm say real here can use isset ok le
		if(is_array($_SESSION['cart'])){
			$_SESSION['items'] = 0;
			$_SESSION['total_price'] = '0.00';
			foreach ($_SESSION['cart'] as $isbn => $qty) {
				$sql = "SELECT book_price FROM book WHERE book_isbn = '$isbn'";
				$result = $conn->query($sql);
				if($result){
					$item = $result->fetch_assoc();
					$item_price = $item['book_price'];
					$_SESSION['total_price'] += $item_price*$qty;
				}
				$_SESSION['items'] += $qty;
			}
		}
	}
	//check what ur array contain by using this script below(that comman one)
	//print_r($_SESSION['cart']);
	//if the session is set le and count the associative array
	//the array_count_values function will count the associative array with same key got how many time
	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
 ?>
<div class="col-sm-10 col-sm-offset-1 text-right" style="margin-bottom: 20px;">
	<div class="cart">
		<h3 class="text-center">Shopping Cart</h3>
		<table class="table">
			<form name="cart" action="shopping_cart.php" method="POST">
				<thead>
					<tr class="colored">
						<th class="text-center">Item</th>
						<th class="text-center">Price</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Total</th>
					</tr>
				</thead>
				<tbody>
					<!--show all item in the cart session-->
					<?php 
						foreach ($_SESSION['cart'] as $isbn => $qty) {
							$sql2 = "SELECT book_name,book_isbn,book_price FROM book WHERE book_isbn = '$isbn'";
							$result2 = $conn->query($sql2);
							if($result2){
								$row = $result2->fetch_assoc();
					?>
					<tr>
						<td class="text-left"><img src="../img/books/<?php echo $row['book_isbn'] ?>.jpg" width="50" height="80">&nbsp;<?php echo $row['book_name']; ?></td>
						<td class="text-center">RM&nbsp;<?php echo number_format($row['book_price'],2); ?></td>
						<td class="text-center"><input type="text" name="<?php echo $isbn; ?>" value="<?php echo $qty; ?>" size="3"></td>
					</tr>
					<?php
							}		
						}
					 ?>
					<tr class="colored">
						<th></th>
						<th></th>
						<th class="text-center"><?php echo $_SESSION['items']; ?></th>
						<th class="text-center">RM&nbsp;<?php echo number_format($_SESSION['total_price'],2); ?></th>
					</tr>
					<tr>
						<td class="text-right" colspan="4">
							<button class="btn btn-lg colored" name="save">Save Change</button>
						</td>
					</tr>
				</tbody>
			</form>
		</table>
		<button class="btn btn-lg colored" onclick="window.location='showAllBook.php'">Continue Shopping</button>
		<button class="btn btn-lg colored" onclick="window.location='checkout.php'">Go to check out</button>
	</div>
</div>
<?php 
	}else{
	//tell user no item in shopping cart
?>
<p>There are no items in your cart.</p>
<p>Click <a href="showAllBook.php">here</a> to continue shopping</p>
<?php 
	}
	$conn->close();	
 include'footer.php'; 
?>