<?php

include "includes/public_header.php";

if (!empty($_SESSION['customer_id'])) {
	include "includes/connection.php";




	$query = "SELECT * FROM customers WHERE customer_id = {$_SESSION['customer_id']} ";
	$result = mysqli_query($conn, $query);
	$user = $result->fetch_assoc();
} else {
	echo "<script> window.location = 'login_customer.php' </script>";
}

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$gender =  $_POST['gender'];

	$sql_profile = "UPDATE customers SET customer_name = '$name',
	                           customer_address 	   = '$address',
                               customer_email 		   = '$email',
                               customer_phone 		   ='$phone',
                               customr_gender 		   = '$gender'
	                           WHERE customer_id 	   = {$_SESSION['customer_id']}";
	mysqli_query($conn, $sql_profile);
	echo "<script>window.location ='profile.php'</script>";
}

?>


<head>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../admin/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../admin/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../admin/src/plugins/cropperjs/dist/cropper.css">
	<link rel="stylesheet" type="text/css" href="../admin/vendors/styles/style.css">
</head>

<body class="animsition">


	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>
		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>
						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>
							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>
						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>
							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>
						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>
							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>
					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			<?php
			echo $user['customer_name'];
			?>
		</h2>
	</section>
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
					<div class="pd-20 card-box ">
						<div class="profile-photo">
							<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
							<img src="<?php
										echo "../admin/" . $user['customer_image']
										?>" alt="" class="avatar-photo">
							<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-body pd-5">
											<div class="img-container">
												<img id="image" src="../admin/vendors/images/photo2.jpg" alt="Picture">
											</div>
										</div>
										<div class="modal-footer">
											<input type="submit" value="Update" class="btn btn-primary">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<h5 class="text-center h5 mb-0"><?php echo $user['customer_name'] ?></h5>

						<div class="profile-info">
							<h5 class="mb-20 h5 text-blue">Contact Information</h5>
							<ul>
								<li>
									<span>Email Address:</span>
									<?php echo $user['customer_email'] ?>
								</li>
								<li>
									<span>Phone Number:</span>
									<?php echo $user['customer_phone'] ?>
								</li>
								<li>
									<span>Country:</span>
									<?php echo $user['customer_address'] ?>
								</li>

							</ul>
						</div>


					</div>
				</div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
					<div class="card-box height-100-p overflow-hidden">
						<div class="profile-tab height-100-p">
							<div class="tab height-100-p">
								<ul class="nav nav-tabs customtab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
									</li>
								</ul>
								<div class="tab-content">
									<!-- Timeline Tab start -->
									<div class="tab-pane fade show active" id="timeline" role="tabpanel">
										<div class="pd-20">
											<div class="profile-timeline">
												<?php

												$query = "SELECT * FROM ((customers INNER JOIN orders ON orders.customer_id = customers.customer_id) ) inner join order_product on order_product.order_id = orders.order_id inner join products on products.product_id = order_product.product_id  ";
												$result = mysqli_query($conn, $query);
												$row = mysqli_fetch_all($result);

												echo "
											<div class='timeline-month'>
											
											<h5>" . date(' M Y', strtotime($row[0][12])) . "</h5>
											</div>";

												$firstMonth = date(' M Y', strtotime($row[0][12]));

												foreach ($row  as $key => $value) {

													// echo "<pre>";
													// print_r(date(' M Y',strtotime($row[0][25])));
													// print_r(date(' M Y',strtotime(date(' M Y',strtotime($value[25])))));

													// $month = date(' M Y',strtotime($value[$key]['created_at'])) ;

													if ($firstMonth != date(' M Y', strtotime($value[12]))) {
														echo "
												<div class='timeline-month'>
												
												<h5>" . date(' M Y', strtotime($value[12])) . "</h5>
												</div>";
														$firstMonth = date(' M Y', strtotime($value[12]));
													}

													echo "
												<div class='profile-timeline-list'>
												<ul>
												<li>
												<div class='date'>" . date('jS M ', strtotime($value[12])) . "</div>
												<div class='task-name'>Order ID : {$value[14]}</div>
												<p>{$value[17]}</p>
												<div class='task-time'>" . date('h:i:A', strtotime($value[12])) . "</div>
												</li>
												
												</ul>
												</div>";
												}

												// }










												?>
											</div>
										</div>
									</div>

									<!-- Setting Tab start -->
									<div class="tab-pane fade height-100-p" id="setting" role="tabpanel">

										<div class="profile-setting">
											<?php $query = "SELECT * FROM customers WHERE customer_id = {$_SESSION['customer_id']} ";
											$result = mysqli_query($conn, $query);
											$user = $result->fetch_assoc(); ?>
											<form method="POST">
												<ul class="profile-edit-list row">
													<li class="weight-500 col-md-6">
														<h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
														<div class="form-group">
															<label>Full Name</label>
															<input class="form-control form-control-lg" type="text" name="name" value="<?php echo $user['customer_name'] ?>">
														</div>

														<div class="form-group">
															<label>Email</label>
															<input class="form-control form-control-lg" type="email" name="email" value="<?php echo $user['customer_email'] ?>">
														</div>

														<div class="form-group">
															<label>Gender</label>
															<div class="d-flex">
																<!-- <input type="checkbox" id="vehicle1" name="isHot" value="1">
																<label for="vehicle1"> is hot</label><br>
																<input type="checkbox" id="vehicle1" name="isFeatured" value="1">
																<label for="vehicle1"> is featured</label><br> -->
																<?php

																if ($user['customr_gender'] == "male") {

																	echo "
																		<div class='custom-control custom-radio mb-5 mr-20'>
																	<input checked type='radio' id='customRadio4' value='male' name='gender' class='custom-control-input'>
																	<label class='custom-control-label weight-400' for='customRadio4'>Male</label>
																</div>
																<div class='custom-control custom-radio mb-5'>
																	<input type='radio' id='customRadio5' value='female' name='gender' class='custom-control-input'>
																	<label class='custom-control-label weight-400' for='customRadio5'>Female</label>
																</div>
																		
																		";
																} else {

																	echo "
																		<div class='custom-control custom-radio mb-5 mr-20'>
																	<input  type='radio' id='customRadio4' value='male' name='gender' class='custom-control-input'>
																	<label class='custom-control-label weight-400' for='customRadio4'>Male</label>
																</div>
																<div class='custom-control custom-radio mb-5'>
																	<input checked type='radio' id='customRadio5' value='female' name='gender' class='custom-control-input'>
																	<label class='custom-control-label weight-400' for='customRadio5'>Female</label>
																</div>
																		
																		";
																}






																?>


															</div>
														</div>



														<div class="form-group">
															<label>Phone Number</label>
															<input class="form-control form-control-lg" type="text" name="phone" value="<?php echo $user['customer_phone'] ?>">
														</div>
														<div class="form-group">
															<label>Address</label>
															<textarea class="form-control" name="address" value=""><?php echo $user['customer_address'] ?></textarea>
														</div>

														<div class="form-group">
															<div class="custom-control custom-checkbox mb-5">
																<input onchange="activesubmit()" type="checkbox" class="custom-control-input" id="customCheck1-1">
																<label class="custom-control-label weight-400" for="customCheck1-1">All information above is true</label>
															</div>
														</div>
														<div class="form-group mb-0">
															<input disabled id="submit" type="submit" class="btn btn-primary" value="Update Information" name="submit">
														</div>
													</li>

												</ul>
											</form>
										</div>
									</div>
									<!-- Setting Tab End -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>

	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>

	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>

	<script src="js/main.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script src="../admin/vendors/scripts/core.js"></script>
	<script src="../admin/vendors/scripts/script.min.js"></script>
	<script src="../admin/vendors/scripts/process.js"></script>
	<script src="../admin/vendors/scripts/layout-settings.js"></script>
	<script src="../admin/src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		function activesubmit() {
			if ($("#customCheck1-1").is(':checked')) {
				$("#submit").removeAttr("disabled")
			} else {
				$("#submit").attr("disabled", true)
			}
		}


		window.addEventListener('DOMContentLoaded', function() {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function() {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function() {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function() {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/cozastore/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 07:27:21 GMT -->

</html>