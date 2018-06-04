<?php
session_start();
require_once "../config/connect.php"; 

if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	header('location: login.php');
}

if(isset($_POST) & !empty($_POST)){
	$name = mysqli_real_escape_string($connection, $_POST['categoryname']);
	$sql = "INSERT INTO category (name) VALUES ('$name')";
	$res = mysqli_query($connection, $sql);
	if($res){
		$smsg = "Category Added Successfully";
	}else{
		$fmsg = "Failed to Add Category!";
	}
}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<div class="close-btn fa fa-times"></div>

<section id="content">
	<div class="content-blog">
		<div class="page_header text-center" style="margin-bottom:20px;">
			<h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 30px;">Add a new Category</h2>
		</div>
		<div class="container">
		<?php
            if(isset($smsg)){?>
                <div class="alert alert-success" role="alert">
                	<?php echo "$smsg"; ?>
                </div>
        <?php } ?>
		<?php
            if(isset($fmsg)){?>
                <div class="alert alert-danger" role="alert">
                	<?php echo "$fmsg"; ?>
                </div>
        <?php } ?>
			<form method="post">
				<div class="form-group">
					<label for="productname">Category Name</label>
					<input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="category name" required>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</section>

<div class="clearfix space70"></div>
<div class="clearfix space70"></div>

<?php include 'inc/footer.php' ?>