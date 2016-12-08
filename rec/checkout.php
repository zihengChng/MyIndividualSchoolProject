<?php 
include'bootstrap.php';
include'top.php';
require_once'../php/config.php';
//if the session is set and count the associative array
if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
 ?>
 <div class="col-sm-10 col-sm-offset-1 text-right" style="margin-bottom: 20px;">
 	<div class="cart">
		<h3 class="text-center">Shopping Cart</h3>
		<table class="table">
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
					<td class="text-left"><?php echo $row['book_name']; ?></td>
					<td class="text-center">RM&nbsp;<?php echo number_format($row['book_price'],2); ?></td>
					<td class="text-center"><?php echo $qty; ?></td>
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
				<?php 
					if(isset($_SESSION['member'])){
						$discount = $_SESSION['total_price']*0.20;
						$_SESSION['total_price'] = $_SESSION['total_price']*0.80;
				?>
				<tr>
					<td>Member Discount</td>
					<td></td>
					<td></td>
					<td>RM &nbsp;<?php echo number_format($discount,2); ?></td>
				</tr>
				<tr class="colored">
					<th>After Discount</th>
					<th></th>
					<th class="text-center"><?php echo $_SESSION['items']; ?></th>
					<th class="text-center">RM&nbsp;<?php echo number_format($_SESSION['total_price'],2); ?></th>
				</tr>
				<?php
					}
				 ?>
			</tbody>
		</table>
		<br>
		<form class="form-horizontal" action="../php/purchase.php" method="POST">
			<div class="col-sm-12 colored" style="margin-bottom: 10px;">
				<h4 class="text-center">Your Detail</h4>
			</div>
			<?php 
				if(isset($_SESSION['member'])){
					$member = $_SESSION['member'];
					$sql3 = "SELECT * FROM member WHERE email = '$member'";
					$result3 = $conn->query($sql3);
					if($result3){
						$row3 = $result3 -> fetch_assoc();
						$mName = $row3['name'];
						$mAddress = $row3['address'];
						$mState = $row3['state'];
					}
				}
			 ?>
			<div class="form-group">
				<div class="col-sm-3">
					<label class="control-label" for="name">Name :</label>
				</div>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="name" value="<?php if(isset($mName)){echo $mName;} ?>" maxlength="40" size="40" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3">
					<label class="control-label" for="address">Address :</label>
				</div>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="address" value="<?php if(isset($mAddress)){echo $mAddress;} ?>" maxlength="40" size="40" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3">
					<label class="control-label" for="state">State :</label>
				</div>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="state" value="<?php if(isset($mState)){echo $mState;} ?>" maxlength="20" size="40" required>
				</div>
			</div>
			<div class="col-sm-12 colored" style="margin-bottom: 10px;">
				<h4 class="text-center">Shipping Address(leave blank if same as above)</h4>
			</div>
			<div class="form-group">
				<div class="col-sm-3">
					<label class="control-label" for="shipping_name">Name :</label>
				</div>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="shipping_name" value="" maxlength="40" size="40">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3">
					<label class="control-label" for="shipping_address">Address :</label>
				</div>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="shipping_address" value="" maxlength="40" size="40">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3">
					<label class="control-label" for="shipping_state">State :</label>
				</div>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="shipping_state" value="" maxlength="20" size="40">
				</div>
			</div>
			<div class="text-center">
				<button class="btn btn-lg colored" type="submit">Purchase</button>
			</div>
		</form>
		<p class="text-center">Print Screen For Backup The Record.</p>
		<p class="text-center">Press Purchase to confirm your purchase.</p>
		<div class="text-center">
			<button class="btn btn-lg colored" onclick="window.location='showAllBook.php'">Continue Shopping</button>
		</div>
	</div>
</div>
<?php 
	}else{
?>
<h2 class="text-center">There are no items in your cart</h2>
<?php		
	}
	$conn->close();
	include'footer.php';
?>