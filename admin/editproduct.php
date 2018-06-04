<?php
session_start();
require_once "../config/connect.php"; 

if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	header('location: login.php');
}

if(isset($_GET) & !empty($_GET)){
    $id = $_GET['id'];
}else{
    header('location: products.php');
}

if(isset($_POST) & !empty($_POST)){
	$prodname = mysqli_real_escape_string($connection, $_POST['productname']);
	$description = mysqli_real_escape_string($connection, $_POST['productdescription']);
	$category = mysqli_real_escape_string($connection, $_POST['productcategory']);
	$price = mysqli_real_escape_string($connection, $_POST['productprice']);

	if(isset($_FILES) & !empty($_FILES)){
		$name = $_FILES['productimage']['name'];
		$size = $_FILES['productimage']['size'];
		$type = $_FILES['productimage']['type'];
		$tmp_name = $_FILES['productimage']['tmp_name'];

		$max_size = 10000000;
		$extension = substr($name, strpos($name, '.') + 1);

		if(isset($name) && !empty($name)){
			if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
				$location = "uploads/";
				$filepath = $location.$name;
				if(move_uploaded_file($tmp_name, $filepath)){
					$smsg = "Uploaded Successfully";
				}else{
					$fmsg = "Failed to Upload File";
				}
			}else{
				$fmsg = "Only JPG files are allowed and should be less that 1MB";
			}
		}else{
			$fmsg = "Please Select a File";
		}
	}else{
		$filepath = $_POST['filepath'];
	}

	$sql = "UPDATE products SET name='$prodname', description='$description', catid='$category', price='$price', thumb='$filepath' WHERE id='$id'";
	$res = mysqli_query($connection, $sql);
	if($res){
		//header('location: products.php');
		$smsg = "Product Updated Successfully";
	}else{
		$fmsg = "Failed to Update Product!";
	}
}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<section id="content">
	<div class="content-blog">
		<div class="page_header text-center" style="margin-bottom:20px;">
			<h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 30px;">Edit Product details</h2>
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
			<?php
                $sql = "SELECT * FROM products WHERE id = $id";
                $res = mysqli_query($connection, $sql);
                $r = mysqli_fetch_assoc($res);
			?>
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="hidden" name="filepath" value="<?php echo $r['thumb']; ?>">
					<label for="productname">Product Name</label>
					<input type="text" class="form-control" name="productname" id="productname" placeholder="product name" value="<?php echo $r['name']; ?>" required>
				</div>
				<div class="form-group">
					<label for="productdescription">Product Description</label>
					<textarea class="form-control" name="productdescription" rows="3" placeholder="add product description" required><?php echo $r['description']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="productcategory">Product Category</label>
					<select class="form-control" id="productcategory" name="productcategory" required>
						<option value="">---Select Category---</option>
						<?php
							$catsql = "SELECT * FROM category";
							$catres = mysqli_query($connection, $catsql);
							while ($catr = mysqli_fetch_assoc($catres)) {
						?>
							<option value="<?php echo $catr['id']; ?>"<?php if($catr['id'] == $r['catid']){ echo "Selected"; } ?>><?php echo $catr['name']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="productprice">Product Price</label>
					<input type="text" class="form-control" name="productprice" id="productprice" placeholder="product price" value="<?php echo $r['price']; ?>" required>
				</div>
				<div class="form-group">
					<label for="productimage">Product Image</label>
					<br>
					<?php if(isset($r['thumb']) & !empty($r['thumb'])){ ?>
						<img src="<?php echo $r['thumb']; ?>" width="100px" height="100px">
						<a href="delprodimg.php?id=<?php echo $r['id']; ?>">Delete Image</a>
					<?php }else{ ?>
					<input type="file" name="productimage" id="productimage">
					<p class="help-block">Only jpg/png are allowed.</p>
					<?php } ?>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</section>

<?php include 'inc/footer.php' ?>