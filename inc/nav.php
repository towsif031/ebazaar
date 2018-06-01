<div class="menu-wrap" style="background: #0F2027;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
	<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
	<ul class="sf-menu">
		<li>
			<a href="http://localhost/eshop/index.php">Home</a>
		</li>
		<li>
			<a href="#">Products</a>
			<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
			<ul>

				<?php
					$catsql = "SELECT * FROM category";
					$catres = mysqli_query($connection, $catsql);
					while($catr = mysqli_fetch_assoc($catres)){
				?>

				<li><a href="index.php?id=<?php echo $catr['id']; ?>">
						<?php echo $catr['name']; ?></a></li>

				<?php } ?>

			</ul>
		</li>
		<li>
			<a href="#">My Account</a>
			<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
			<ul>
				<li><a href="http://localhost/eshop/my-account.php">My Orders</a></li>
				<li><a href="http://localhost/eshop/update-details.php">Update Details</a></li>
				<li><a href="http://localhost/eshop/logout.php">Logout</a></li>
			</ul>
		</li>
		<li>
			<a href="#">Contact</a>
		</li>
	</ul>

	<div class="header-xtra">
		<?php
			$cart=[ ];
			if(isset($_SESSION['cart'])){
				$cart = $_SESSION['cart'];
			}
		?>
		<div class="s-cart">
			<div class="sc-ico"><i class="fa fa-shopping-cart"></i><em>
					<?php echo count($cart); ?></em></div>

			<div class="cart-info">
				<small>You have <em class="highlight">
						<?php echo count($cart); ?> item(s)</em> in your shopping cart</small>
				<br>
				<br>
				
				<?php
                    // print_r($cart);
                    $total = 0;
                    foreach($cart as $key => $value){
                        // echo $key . " : " . $value['quantity'] . "<br>";
                        $navcartsql = "SELECT * FROM products WHERE id=$key";
                        $navcartres = mysqli_query($connection, $navcartsql);
                        $navcartr = mysqli_fetch_assoc($navcartres);
                ?>

				<div class="ci-item">
					<img src="admin/<?php echo $navcartr['thumb']; ?>" width="70" alt="" />
					<div class="ci-item-info">
						<h5><a href="single.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['name'], 0, 20); ?></a></h5>
						<p><?php echo $value['quantity']; ?> x <?php echo $navcartr['price']; ?> BDT</p>
						<div class="ci-edit">
							<!-- <a href="#" class="edit fa fa-edit"></a> -->
							<a href="delcart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
						</div>
					</div>
				</div>

				<?php
                        $total = $total + ($navcartr['price'] * $value['quantity']);
                    }
                ?>

				<div class="ci-total">Subtotal: <?php echo $total; ?> BDT</div>
				<div class="cart-btn">
					<a href="cart.php">View Cart</a>
					<a href="checkout.php">Checkout</a>
				</div>
			</div>
		</div>
		<?php //} ?>

		<div class="s-search">
			<div class="ss-ico"><i class="fa fa-search"></i></div>
			<div class="search-block">
				<div class="ssc-inner">
					<form>
						<input type="text" placeholder="Type Search text here...">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
</div>
</header>