<?php
session_start();
require_once "../config/connect.php"; 

if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	header('location: login.php');
}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<div class="close-btn fa fa-times"></div>

<section id="content">
	<div class="content-blog">
		<div class="page_header text-center" style="margin-bottom:20px;">
			<h2 style="font-family: Arial, Helvetica, sans-serif; font-size: 30px;">Category List</h2>
		</div>
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
					<?php				
					$sql = "SELECT * FROM category";
					$res = mysqli_query($connection, $sql);
					while($r = mysqli_fetch_assoc($res)){
				?>
					<tr>
						<th scope="row">
							<?php echo $r['id']; ?>
						</th>
						<td>
							<?php echo $r['name']; ?>
						</td>
						<td><a href="editcategory.php?id=<?php echo $r['id']; ?>">Edit</a> | <a href="delcategory.php?id=<?php echo $r['id']; ?>">Delete</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<?php include 'inc/footer.php' ?>