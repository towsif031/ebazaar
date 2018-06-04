<?php 
    session_start();
    require_once "../config/connect.php"; 

    if(isset($_POST) & !empty($_POST)){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        $count = mysqli_num_rows($result);
        if($count == 1){
            //echo "User exits! Create a seesion.";
            $_SESSION['email'] = $email;
            header('location: index.php');
        }else{
            $fmsg = "Invalid login credentials!";
        }
    }
    // include 'inc/header.php';
    //include 'inc/nav.php';
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ebazaar | Admin Login</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="js/isotope/isotope.css">
    <link rel="stylesheet" href="js/flexslider/flexslider.css">
    <link rel="stylesheet" href="js/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="js/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="js/owl-carousel/owl.transitions.css">
    <link rel="stylesheet" href="js/superfish/css/megafish.css" media="screen">
    <link rel="stylesheet" href="js/superfish/css/superfish.css" media="screen">
    <link rel="stylesheet" href="js/pikaday/pikaday.css">
    <link rel="stylesheet" href="css/settings-panel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/light.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- JS Font Script -->
    <script src="http://use.edgefonts.net/bebas-neue.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <!-- Modernizer -->
    <script src="js/modernizr.custom.js"></script>

</head>

<body class="multi-page">

    <div id="wrapper" class="wrapper">
        <!-- HEADER -->
        <!-- SHOP CONTENT -->
        <section id="content" style="height:700px; background: #bdc3c7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #2c3e50, #bdc3c7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
            <div class="content-blog">
                <div class="container">
                    <div class="row">
                        <div class="page_header text-center" style="margin-bottom:20px;">
                            <h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 40px;">Login</h2>
                            <p style="color: #fff; font-family: Arial, Helvetica, sans-serif; font-size: 14px;">as Admin</p>
                        </div>
                        <div class="col-md-12">
                            <div class="row shop-login">
                                <div class="col-md-6 col-md-offset-3">
                                    <?php
                            if(isset($fmsg)){?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo "$fmsg"; ?>
                                    </div>
                                    <?php } ?>
                                    <div class="box-content">
                                        <!--<h3 class="heading text-center">I'm a Returning Customer</h3>-->
                                        <div class="clearfix space40"></div>
                                        <form class="logregform" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label style="color: #fff; font-size: 20px;">E-mail Address</label>
                                                        <input type="email" name="email" value="" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix space20"></div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <a class="pull-right" href="#">(Lost Password?)</a>
                                                        <label style="color: #fff; font-size: 20px;">Password</label>
                                                        <input type="password" name="password" value="" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix space20"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="remember-box checkbox">
                                                        <label for="rememberme" style="color: #fff; font-size: 14px;">
                                                            <input type="checkbox" id="rememberme" name="rememberme">Remember
                                                            Me
                                                        </label>
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="button btn-md pull-right">Login</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'inc/footer.php' ?>