<?php
// connect db
require('includes/connection_db.php');

if (isset($_POST['submit'])) {

	$target = "images/" . basename($_FILES['image']['name']);
	if (!empty($_POST['select'])) {
		$selected = $_POST['select'];
	}
	$name   = $_POST['name'];
	$desc   = $_POST['desc'];
	$file   = "images/" . $_FILES['image']['name'];
	$category_name = $selected;

	// Update Vendor
	$sql = "UPDATE vendors SET vendor_name     = '$name',
							   vendor_desc     = '$desc',
							   vendor_image    = '$file',
							   cat_id          = '$selected'
							   WHERE vendor_id ={$_GET['id']}";
	mysqli_query($conn, $sql);

	move_uploaded_file($_FILES['image']['tmp_name'], $target);
	header("location: manage_vendors.php");
}
include('./includes/admin_header.php');

// Fetch Old Data
$sql     = "SELECT * FROM vendors WHERE vendor_id = {$_GET['id']}";
$result  = mysqli_query($conn, $sql);
$data    = mysqli_fetch_assoc($result);
?>
<div class="main-container">
	<div class="pd-ltr-20">
		<div class="pd-20 card-box mb-30">
			<div class="clearfix">
				<div class="pull-left">
					<h4 class="text-blue h4">Manage Vendors</h4>
					<p class="mb-30">Add Vendors</p>
				</div>

			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Vendor Name</label>
					<input class="form-control" name="name" value="<?php echo $data['vendor_name'] ?>" type="text">
					<!-- <input class="form-control" type="text"  name="category_name"> -->
				</div>
				<div class="form-group">
					<label>Vendor Description</label>
					<input class="form-control" name="desc" value="<?php echo $data['vendor_desc'] ?>" type="text">
					<!-- <input class="form-control" type="text"  name="category_name"> -->
				</div>
				<div class="form-group ">
					<label>Select Category</label>


					<select name="select" id="select" class="custom-select col-12">
						<?php
						$sql = "SELECT * FROM categories ";
						$result = mysqli_query($conn, $sql);
						while ($res = mysqli_fetch_assoc($result)) {
							if ($res['category_id'] == $_GET['c']) {
								echo '<option value="' . $res['category_id'] . '" selected>' . $res["category_name"] . '</option>';;
							} else {
								echo '<option value="' . $res['category_id'] . '">' . $res["category_name"] . '</option>';
							}
						}

						?>
					</select>

					<div class="form-group">
						<label>Vendor Image</label>
						<input type="file" accept="image/*" name="image" value="./images/{$data['vendor_image']}" class="form-control">
						<!-- <input class="form-control" type="file" name="category_image"> -->
					</div>
					<label class="col-sm-2 col-form-label"> Current image: </label>
					<?php
					echo " 
						<div  >
							<img  src='./images/{$data['vendor_image']}' width='100px' height='100px'>
						</div>
						";
					?>
					<div class="form-group">
						<button type="submit" class="btn btn-primary mb-4" name="submit">Update Vendor</button>
					</div>
			</form>

			</code></pre>
		</div>



	</div>
</div>

</div> <?php include('./includes/admin_footer.php') ?>