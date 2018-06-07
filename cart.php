<?php
    session_start();
    require_once "config/connect.php";
    include 'inc/header.php';
    include 'inc/nav.php';
    // $cart = $_SESSION['cart'];
    $cart=[ ];
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }
?>

<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog">
        <div class="container">
            <div class="row">
                <div class="page_header text-center">
                    <h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 40px;">Shop Cart</h2>
                </div>

                <!-- If cart is not empty -->
                <?php if(!empty($cart)) { ?>

                <div class="col-md-12">
                    <table class="cart-table table table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                // print_r($cart);
                                $total = 0;
                                foreach($cart as $key => $value){
                                    // echo $key . " : " . $value['quantity'] . "<br>";
                                    $cartsql = "SELECT * FROM products WHERE id=$key";
                                    $cartres = mysqli_query($connection, $cartsql);
                                    $cartr = mysqli_fetch_assoc($cartres);
                            ?>

                            <tr>
                                <td>
                                    <a class="remove" href="delcart.php?id=<?php echo $key; ?>"><i class="fa fa-times"></i></a>
                                </td>
                                <td>
                                    <a href="#"><img src="admin/<?php echo $cartr['thumb']; ?>" alt="" height="90"
                                            width="90"></a>
                                </td>
                                <td>
                                    <a href="single.php?id=<?php echo $cartr['id']; ?>">
                                        <?php echo substr($cartr['name'], 0, 30); ?></a>
                                </td>
                                <td>
                                    <span class="amount">
                                        <?php echo $cartr['price']; ?> BDT</span>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <?php echo $value['quantity']; ?>
                                    </div>
                                </td>
                                <td>
                                    <span class="amount">
                                        <?php echo ($cartr['price'] * $value['quantity']); ?> BDT</span>
                                </td>
                            </tr>

                            <?php
                                    $total = $total + ($cartr['price'] * $value['quantity']);
                                }
                            ?>

                            <tr>
                                <td colspan="6" class="actions">
                                    <div class="col-md-6">
                                        <!-- <div class="coupon">
                                            <label>Coupon:</label><br>
                                            <input placeholder="Coupon code" type="text"> <button type="submit">Apply</button>
                                        </div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cart-btn">
                                            <!-- <button class="button btn-md" type="submit">Update Cart</button> -->
                                            <a href="checkout.php" class="button btn-md">Checkout</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="cart_totals">
                        <div class="col-md-6 push-md-6 no-padding">
                            <h4 class="heading">Cart Totals</h4>
                            <table class="table table-bordered col-md-6">
                                <tbody>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount"><?php echo $total; ?> BDT</span></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping and Handling</th>
                                        <td>
                                            Free Shipping
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <td><strong><span class="amount"><?php echo $total; ?> BDT</span></strong> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php } else { ?>

                    <div>
                        <h2 style="text-align: center; font-size: 18px;">Your cart is empty!</h2>
                        <h2 style="text-align: center; font-size: 24px;">Lets have a look at our <a href="index.php">products</a>.</h2>
                    </div>
                    <div class="clearfix space70"></div>
                
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>