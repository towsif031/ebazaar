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
    // $cart = $_SESSION['cart'];
    $cart=[ ];
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }
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
                    <table class="cart-table account-table table table-bordered" style="background: #ADA996;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
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
                                    <?php if($ordr['orderstatus'] != 'Cancelled'){ ?>
                                    | <a href="cancel-order.php?id=<?php echo $ordr['id']; ?>">Cancel</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <br>
                    <br>
                    <br>

                    <div class="ma-address">
                        <h3>My Account Details</h3>
                        <p>The following information will be used on the checkout page by default.</p>

                        <div class="row">
                            <div class="col-md-6">
                                <h4>Details <a href="update-details.php">Edit</a></h4>

                                <?php
                                    $csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.phone, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
                                    $cres = mysqli_query($connection, $csql);
                                    if(mysqli_num_rows($cres) == 1){
                                        $cr = mysqli_fetch_assoc($cres);
                                        echo "<p>". $cr['firstname'] ." ". $cr['lastname'] ."</p>";
                                        echo "<p>". $cr['address1'] ."</p>";
                                        echo "<p>". $cr['address2'] ."</p>";
                                        echo "<p>". $cr['city'] ."</p>";
                                        echo "<p>". $cr['state'] ."</p>";
                                        echo "<p>". $cr['country'] ."</p>";
                                        echo "<p>". $cr['company'] ."</p>";
                                        echo "<p>". $cr['zip'] ."</p>";
                                        echo "<p>". $cr['phone'] ."</p>";
                                        echo "<p>". $cr['email'] ."</p>";
                                    }
								?>
                            </div>

                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>