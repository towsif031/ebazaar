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
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th></th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_GET['id']) & !empty($_GET['id'])){
                                    $oid = $_GET['id'];
                                }else{
                                    header('location: my-account.php');
                                }
                                $ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
                                $ordres = mysqli_query($connection, $ordsql);
                                $ordr = mysqli_fetch_assoc($ordres);

                                $orditemsql = "SELECT * FROM orderitems o JOIN products p WHERE o.orderid='$oid' AND o.pid=p.id";
                                $orditemres = mysqli_query($connection, $orditemsql);
                                while($orditemr = mysqli_fetch_assoc($orditemres)){
                            ?>
                            <tr>
                                <td>
                                    <a href="single.php?id=<?php echo $orditemr['pid']; ?>"><?php echo substr($orditemr['name'], 0, 25); ?></a>
                                </td>
                                <td>
                                    <?php echo $orditemr['pquantity']; ?>
                                </td>
                                <td>
                                    <?php echo $orditemr['productprice']; ?> BDT
                                </td>
                                <td></td>
                                <td>
                                    <?php echo $orditemr['productprice'] * $orditemr['pquantity']; ?> BDT
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Order Total
                                </td>
                                <td>
                                    <?php echo $ordr['totalprice']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Order Status
                                </td>
                                <td>
                                    <?php echo $ordr['orderstatus']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Order Placed On
                                </td>
                                <td>
                                    <?php echo $ordr['timestamp']; ?>
                                </td>
                            </tr>
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