<?php require_once "../config/connect.php"; ?>
<?php include 'inc/header.php'; ?>
<?php //include 'inc/nav.php'; ?>
</div>
</header>
<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog">
        <div class="container">
            <div class="row">
                <div class="page_header text-center">
                    <h2>Login</h2>
                    <p>Admin Login</p>
                </div>
                <div class="col-md-12">
                    <div class="row shop-login">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="box-content">
                                <!--<h3 class="heading text-center">I'm a Returning Customer</h3>-->
                                <div class="clearfix space40"></div>
                                <form class="logregform">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Username or E-mail Address</label>
                                                <input type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix space20"></div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <a class="pull-right" href="#">(Lost Password?)</a>
                                                <label>Password</label>
                                                <input type="password" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix space20"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="remember-box checkbox">
                                                <label for="rememberme">
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