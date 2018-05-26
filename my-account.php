<?php
    ob_start();
    session_start();
    require_once "config/connect.php"; 

    if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
        header('location: login.php');
    }
    include 'inc/header.php';
    include 'inc/nav.php';

    $uid = $_SESSION['customerid'];
    $cart = $_SESSION['cart'];
?>

<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog content-account">
        <div class="container">
            <div class="row">
                <div class="page_header text-center">
                    <h2>My Account</h2>
                </div>
                <div class="col-md-12">
                    <h3>Recent Orders</h3>
                    <br>
                    <table class="cart-table account-table table table-bordered">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Payment Mode</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ordsql = "SELECT * FROM orders WHERE uid='$uid'";
                                $ordres = mysqli_query($connection, $ordsql);
                                while($ordr = mysqli_fetch_assoc($ordres)){
                            ?>
                            <tr>
                                <td>
                                    <?php echo $ordr['id']; ?>
                                </td>
                                <td>
                                    <?php echo $ordr['timestamp']; ?>
                                </td>
                                <td>
                                    <?php echo $ordr['orderstatus']; ?>
                                </td>
                                <td>
                                    <?php echo $ordr['paymentmode']; ?>
                                </td>
                                <td>
                                    <?php echo $ordr['totalprice']; ?> BDT
                                </td>
                                <td>
                                    <a href="view-order.php?id=<?php echo $ordr['id']; ?>">View</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <br>
                    <br>
                    <br>

                    <div class="ma-address">
                        <h3>My Addresses</h3>
                        <p>The following addresses will be used on the checkout page by default.</p>

                        <div class="row">
                            <div class="col-md-6">
                                <h4>Billing Address <a href="#">Edit</a></h4>
                                <p>
                                    Mohamed Salah<br>
                                    spyropress<br>
                                    Dhaka<br>
                                    Dhaka<br>
                                    TR05<br>
                                    342343<br>
                                    Bangladesh
                                </p>
                            </div>

                            <div class="col-md-6">
                                <h4>Shipping Address <a href="#">Edit</a></h4>
                                <p>
                                    Mohamed Salah<br>
                                    spyropress<br>
                                    Dhaka<br>
                                    Dhaka<br>
                                    TR05<br>
                                    342343<br>
                                    Bangladesh
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>