<?php
// connect db
require('includes/connection_db.php');


if (isset($_POST['submit'])) {
	$imageName = $_FILES['image']['name'];
	// $tmp_name   = $_FILES['cat_image']['tmp_name'];
	$target = 'images/';
	if ($_FILES["image"]['size'] > 0) {


		move_uploaded_file($_FILES["image"]["tmp_name"], $target . $imageName);
		$target_Img = $target . $imageName;
	} else {

		$target_Img = "images/productDefult.png";
	}


	// $target = "images/" . basename($_FILES['image']['name']);

	$name  = $_POST['name'];
	$desc  = $_POST['desc'];
	$file  = $target_Img;
	$cat_id = $_REQUEST['select_category'];

	$sql = "INSERT INTO vendors(vendor_name, vendor_image, vendor_desc, cat_id)
													VALUES('$name', '$target_Img', '$desc', '$cat_id')";
	mysqli_query($conn, $sql);

	// move_uploaded_file($_FILES['image']['tmp_name'], $target);
	header("location: manage_vendors.php");
}
include('./includes/admin_header.php');
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
					<input class="form-control" name="name" placeholder="Enter your name" type="text" required>
					<!-- <input class="form-control" type="text"  name="category_name"> -->
				</div>
				<div class="form-group">
					<label>Vendor Description</label>
					<input class="form-control" name="desc" placeholder="Enter description" type="text">
					<!-- <input class="form-control" type="text"  name="category_name"> -->
				</div>
				<div class="form-group ">
					<label>Select Category</label>

					<select name="select_category" class="custom-select col-12">
						<option>Choose Category</option>
						<?php
						$sql = "SELECT category_id, category_name FROM categories ";
						$result = mysqli_query($conn, $sql);
						while ($res = mysqli_fetch_assoc($result)) {
							echo
							"
						<option value='{$res['category_id']}'>
						{$res['category_name']}
						</option>
						";
						}
						?>
					</select>

					<div class="form-group">
						<label>Vendor Image</label>
						<input type="file" accept="image/*" name="image" class="form-control">
						<!-- <input class="form-control" type="file" name="category_image"> -->
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary mb-4" name="submit">Add Vendor</button>
					</div>
			</form>

			</code></pre>
		</div>


		<!-- Start Table -->

		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Recent Vendors</h4>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
						<tr scope="col">
							<th scope="col">Vendor Id</th>
							<th scope="col">Vendor Name</th>
							<th scope="col">Vendor Image</th>
							<th scope="col">Vendor Description</th>
							<th scope="col">Category Name</th>
							<th scope="col">Created At</th>
							<th scope="col">Edit</th>
							<th scope="col">Delete</th>
						</tr>
						</tr>
					</thead>
					<tbody>
						<?php
						$join = "SELECT * FROM vendors INNER JOIN categories ON vendors.cat_id = categories.category_id";
						$join_res = mysqli_query($conn, $join);

						while ($res = mysqli_fetch_assoc($join_res)) {
							echo "<tr>";
							echo
							" 
							<td>{$res['vendor_id']}</td>
							<td>{$res['vendor_name']}</td>
							<td><img src='{$res['vendor_image']}' width='100px' height='100px'></td>
							<td>{$res['vendor_desc']}</td>
							<td>{$res['category_name']}</td>
							<td>{$res['created_at']}</td>
							<td><a href='edit_vendor.php?id={$res['vendor_id']}&c={$res['cat_id']}' class='btn btn-warning'>Edit</a></td>
							";
							echo " <td><button onclick='popUp({$res['vendor_id']})' class= 'btn btn-danger'>Delete</button></td>";
							echo "</tr>";
						}
						?>
						<script src="sweetalert2.all.min.js"></script>
						<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
						<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

						<script type="text/javascript">
							function popUp(id) {
								Swal.fire({
									title: 'Are you sure?',
									text: "You won't be able to revert this!",
									icon: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Yes, delete it!'
								}).then((result) => {
									// alert(id);
									if (result.isConfirmed) {
										Swal.fire(
											'Deleted!',
											'Your file has been deleted.',
											'success'
										).then(() =>
											window.location = `delete_vendor.php?id=${id}`

										)
									}
								})
							}
						</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div> <?php include('./includes/admin_footer.php') ?>