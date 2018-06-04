<?php
	session_start();
	require_once "../config/connect.php"; 

	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	include 'inc/header.php';
	include 'inc/nav.php';
?>

<div class="close-btn fa fa-times"></div>

<!-- SHOP CONTENT -->
<section id="content">
	<div class="content-blog">
		<div class="container">
			<div class="row">
				<div class="page_header text-center">
					<h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 40px;">Ebazaar : Admin</h2>
					<p>Wellcome To ADMIN panel</p>
				</div>
				<div class="col-md-12">
					<div class="row">
					</div>
					<div class="clearfix"></div>
					<!-- Pagination -->
					<div class="page_nav">
						<a href=""><i class="fa fa-angle-left"></i></a>
						<a href="" class="active">1</a>
						<a href="">2</a>
						<a href="">3</a>
						<a class="no-active">...</a>
						<a href="">9</a>
						<a href=""><i class="fa fa-angle-right"></i></a>
					</div>
					<!-- End Pagination -->
				</div>
			</div>
		</div>
	</div>
</section>

<div class="clearfix space70"></div>

<?php include 'inc/footer.php' ?>