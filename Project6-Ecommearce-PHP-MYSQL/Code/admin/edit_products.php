<?php
//SELECT `product_id`, `product_name`, `product_image`, `product_price`, `product_qty`, `product_desc`, `is_hot`, `is_featured`, `vendor_id`, `created_at` FROM `products` WHERE 1
require('includes/connection_db.php');
$sql_product  = "select * from products where product_id = {$_GET['id']}";
$result = mysqli_query($conn, $sql_product);
$row    = mysqli_fetch_assoc($result);

// $tmp_name   = $_FILES['cat_image']['tmp_name'];
$target = 'images/';



if (isset($_POST['submit'])) {
	
	
	if ($_FILES["image"]['size'] > 0) {
		
		$imageName = $_FILES['image']['name'];

		move_uploaded_file($_FILES["image"]["tmp_name"], $target . $imageName);
		$target_Img = $target . $imageName;
	} else {

		$target_Img = "images/productDefult.png";
	}

	if (!empty($_POST['select'])) {
		$selected = $_POST['select'];
	}
	if (!empty($_POST['desc'])) {
		$descr = $_POST['desc'];
	} else {
		$descr = $row['product_desc'];
	}
	$name    = $_POST['name'];
	$desc = $descr;
	$price = $_POST['price'];
	$vendorId = $selected;
	$productQty = $_POST['productQty'];
	$isFeatured = $_POST['isFeatured'];
	//$createdAt=$_POST['createdAt'];

	if (isset($_POST['isHot'])) {
		$isHot = $_POST['isHot'];
	} else {
		$isHot = 0;
	}


	if (isset($_POST['isFeatured'])) {
		$isFeatured = $_POST['isFeatured'];
	} else {
		$isFeatured = 0;
	}

	$sql_product = "UPDATE products SET product_name = '$name',
	                           product_image = '$target_Img',
	                           product_desc = '$desc',
                               product_price = '$price',
                               product_qty ='$productQty',
							   vendor_id ='$selected',
                               is_hot = '$isHot',
                               is_featured = '$isFeatured'
	                           WHERE product_id = {$_GET['id']}";
	mysqli_query($conn, $sql_product);
	header("location:manage_products.php");
}
//$query  = "select * from products where id = {$_GET['id']}";


?>
<?php include('./includes/admin_header.php'); ?>

<body>


	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="pd-20 card-box mb-30">

				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>product name</label>
						<input class="form-control" type="text" name="name" value="<?php echo $row['product_name']; ?>">
					</div>
					<div class="form-group">
						<label>choose image</label>
						<input type="file" class="form-control-file form-control height-auto" name="image" value="<?php echo "<img src='{$row['product_image']}' width='100' height='100'>"; ?>">
					</div>
					<div class="form-group">
						<label>product_price</label>
						<input class="form-control" type="text" name="price" value="<?php echo $row['product_price']; ?>">
					</div>
					<div class="form-group">
						<label>product quantity</label>
						<input class="form-control" type="text" name="productQty" value="<?php echo $row['product_qty']; ?>">
					</div>
					<div class="form-group">
						<label>vendor</label>
						<select class="form-control" name="select" id="select">
							<?php
							$query  = "select * from vendors";
							$result = mysqli_query($conn, $query);
							while ($row2 = mysqli_fetch_assoc($result)) {
								if ($row2['vendor_id'] == $_GET['ven']) {
									echo '<option value="' . $row2['vendor_id'] . '" selected>' . $row2["vendor_name"] . '</option>';
								} else {
									echo '<option value="' . $row2['vendor_id'] . '">' . $row2["vendor_name"] . '</option>';
								}
							}

							?>
						</select>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="desc"><?php echo $row["product_desc"] ?></textarea>
					</div>

					<?php
					if ($row['is_hot'] == 1) {
						echo "
						<input checked type='checkbox' id='vehicle' name='isHot' value='1'>";
					} else {
						echo "
						<input  type='checkbox' id='vehicle' name='isHot' value='1'>";
					}

					?>

					<?php
					if ($row['is_featured'] == 1) {
						echo " <label  for='vehicle1'>is_featured</label><br>
						<input checked type='checkbox' id='vehicle1' name='isFeatured' value='1'>";
					} else {
						echo " <label  for='vehicle1'> is hot</label><br>
						<input type='checkbox' id='vehicle1' name='isFeatured' value='1'>";
					}

					?>

					<label for="vehicle"> is Hot</label><br>

					<div>
						<button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Update
						</button>
					</div>

			</div>
		</div>
	</div>
	</form>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
</body>

</html>