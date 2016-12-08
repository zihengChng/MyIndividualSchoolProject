<div id="new-arrive-carousel" class="carousel slide widget widget-new-products product-carousel" data-interval="false">
	<div class="widget-title">
		<h2>New Arrives</h2>
		<a href="rec/showAllBook.php" class="more-link">More</a>
		<ol class="carousel-indicators">
			<li data-target="#new-arrive-carousel" data-slide-to="0" class="active">1</li>
			<li data-target="#new-arrive-carousel" data-slide-to="1">2</li>
			<li data-target="#new-arrive-carousel" data-slide-to="2">3</li>
			<li data-target="#new-arrive-carousel" data-slide-to="3">4</li>
		</ol>
		<a class="left carousel-control" href="#new-arrive-carousel" role="button" data-slide="prev"><</a>
		<a class="right carousel-control" href="#new-arrive-carousel" role="button" data-slide="next">></a>
	</div>
	<div class="widget-products">
		<div class="carousel-inner" rol="listbox">
			<?php 
				$sql = "SELECT book_name FROM book";
				$result = $conn->query($sql);
				$count = $result->num_rows;
				$maxNewItem = $count-20;
				for($count=1;$count<5;$count++){
					$maxNewItem += 4;
			?>
			<div class="item <?php if($count==1) {echo 'active';} ?>">
				<div class="row">
			<?php
					$sql = "SELECT book_name,book_publisher,book_price,book_isbn FROM book ORDER BY book_id LIMIT $maxNewItem,4";
					$result = $conn->query($sql);
					while ($row=$result->fetch_assoc()) {
					$member_price = $row['book_price']*0.80;
			?>
					<div class="col-sm-3 col-xs-6">
						<a href="rec/viewBookDetail.php?q=<?php echo $row['book_isbn']; ?>" class="product-image"><img src="img/books/<?php echo $row['book_isbn'];?>.jpg" height="150" width="150"></a>
						<div class="product-info">
							<h2 class="product-name"><a href="rec/viewBookDetail.php?q=<?php echo $row['book_isbn']; ?>"><?php echo $row['book_name']; ?></a></h2>
							<span class="auth"><b>Publisher: </b><?php echo $row['book_publisher']; ?></span>
							<div class="price-box">
								<span class="price-label">USUAL:</span>
								<span class="regular-price"><span class="price">RM <?php echo $row['book_price']; ?></span></span>
								<p class="member-price">
									<span class="price-label">MEMBER:</span>
									<span class="price">
										<span class="curreny-symbol">RM</span>
										<span><?php echo number_format($member_price,2) ?></span>
									</span>
								</p>
							</div>
						</div>
					</div>
			<?php
					}
			?>
				</div>
			</div>
			<?php
				}
			 ?>
		</div>
	</div>
</div>