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

    if(isset($_POST) & !empty($_POST)){
        $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
        $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
        $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
        $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
        $address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
        $address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
        $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
        $zip = filter_var($_POST['zip'], FILTER_SANITIZE_NUMBER_INT);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        
        // update data in usermeta table
        $usql = "UPDATE usersmeta SET country='$country', firstname='$fname', lastname='$lname', company='$company', address1='$address1', address2='$address2', city='$city', state='$state', zip='$zip', phone=$phone WHERE uid='$uid'";
        $ures = mysqli_query($connection, $usql) or die(mysqli_error($connection));
        if($ures){
        }
    }

    $sql = "SELECT * FROM usersmeta WHERE uid=$uid";
    $res = mysqli_query($connection, $sql);
    $r = mysqli_fetch_assoc($res);
?>

<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog">
        <!-- <div class="text-center">
            <h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 30px;">Update Account Details</h2>
            <hr>
        </div> -->

        <form method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="billing-details">
                            <h3 class="uppercase" style="font-family: Arial, Helvetica, sans-serif; text-align: center; font-size: 30px;">Update Account Details</h3>
                            <hr>
                            <div class="space30"></div>
                            <label class="">Country </label>
                            <select name="country" class="form-control" required>
                                <option value="">select country</option>
                                <option value="AX">Aland Islands</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                            </select>
                            <div class="clearfix space20"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name </label>
                                    <input name="fname" class="form-control" placeholder="first name" value="<?php if(!empty($r['firstname'])){ echo $r['firstname']; }elseif(isset($fname)){ echo $fname; } ?>"
                                        type="text" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name </label>
                                    <input name="lname" class="form-control" placeholder="last name" value="<?php if(!empty($r['lastname'])){ echo $r['lastname']; }elseif(isset($lname)){ echo $lname; } ?>"
                                        type="text" required>
                                </div>
                            </div>
                            <div class="clearfix space20"></div>
                            <label>Company Name</label>
                            <input name="company" class="form-control" placeholder="company name (optional)" value="<?php if(!empty($r['company'])){ echo $r['company']; }elseif(isset($company)){ echo $company; } ?>"
                                type="text">
                            <div class="clearfix space20"></div>
                            <label>Address </label>
                            <input name="address1" class="form-control" placeholder="street address" value="<?php if(!empty($r['address1'])){ echo $r['address1']; }elseif(isset($address1)){ echo $address1; } ?>"
                                type="text" required>
                            <div class="clearfix space20"></div>
                            <input name="address2" class="form-control" placeholder="apartment, suite, unit etc. (optional)"
                                value="<?php if(!empty($r['address2'])){ echo $r['address2']; }elseif(isset($address2)){ echo $address2; } ?>"
                                type="text">
                            <div class="clearfix space20"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>City</label>
                                    <input name="city" class="form-control" placeholder="city" value="<?php if(!empty($r['city'])){ echo $r['city']; }elseif(isset($city)){ echo $city; } ?>"
                                        type="text" required>
                                </div>
                                <div class="col-md-4">
                                    <label>State</label>
                                    <input name="state" class="form-control" value="<?php if(!empty($r['state'])){ echo $r['state']; }elseif(isset($state)){ echo $state; } ?>"
                                        placeholder="state" type="text" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Postcode </label>
                                    <input name="zip" class="form-control" placeholder="postcode / zip" value="<?php if(!empty($r['zip'])){ echo $r['zip']; }elseif(isset($zip)){ echo $zip; } ?>"
                                        type="text" required>
                                </div>
                            </div>
                            <div class="clearfix space20"></div>
                            <label>Phone </label>
                            <input name="phone" class="form-control" id="billing_phone" placeholder="phone number" value="<?php if(!empty($r['phone'])){ echo $r['phone']; }elseif(isset($phone)){ echo $phone; } ?>" type="text" required>
                                
                            <div class="space30"></div>
                            <input type="submit" class="button btn-lg" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>

<?php include 'inc/footer.php' ?>