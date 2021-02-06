
<?php
include('includes/connection.php');
session_start();
if(isset($_POST["username"])){


	$username = $_POST['username'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	$address  = $_POST['address'];
	$phone    = $_POST['phone'];
	$gender   = $_POST['gender'];

	if(!empty($username) && !empty($email ) &&!empty($password) &&!empty($address) &&!empty($phone) &&!empty($gender) ){

		
		$query = "select * from customers where customer_email = '$email'";
		$result = mysqli_query($conn,$query);
		$row    = mysqli_fetch_assoc($result);
		
		if( $row['customer_email'] != $email){
			$query = "insert into customers(customer_name,customer_email,customer_password,customer_address,customer_phone,customr_gender,customer_image)
            values('$username','$email','$password','$address','$phone','$gender' ,'images/user.png')";
			mysqli_query($conn,$query);
			header("location:login_customer.php");
		}else{
			$errer = "Email already exists";
			
			echo "<script>var user_err = '{$row['customer_email']}'</script>";		
		}
	
	}else{
		echo "<script> var allErr = 'All Feides are require' ; </script> " ;		
		// echo  ;		
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Register Customer</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../admin/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../admin/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../admin/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../admin/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../admin/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../admin/src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="../admin/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<!-- <script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script> -->
</head>

<body class="login-page">
	
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="../admin/images/register.svg" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="register-box bg-white box-shadow border-radius-10">
						<div class="wizard-content">
							<form id='user_register' method="post" action="register.php" class="tab-wizard2 wizard-circle wizard">
								<h5>Basic Account Credentials</h5>
								
								<?php if(isset($errer)){ echo "<div id='err2' class='alert alert-danger'>$errer</div>";} ?>
								<div style="display: none;" id='err2' class='alert alert-danger'></div>
								<section>
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Name*</label>
											<div class="col-sm-8">
												<input name="username" type="text" placeholder="Enter Your name" class="form-control" required>
											</div>
										</div>
										<div class="form-group row">
											<label  class="col-sm-4 col-form-label">Email*</label>
											<div class="col-sm-8">
												<input onkeyup='removeAlert()' id="email" name="email" type="email" placeholder="Enter Your Email" class="form-control" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Password*</label>
											<div class="col-sm-8">
												<input name="password" type="password" placeholder="Password" class="form-control" required>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Address</label>
											<div class="col-sm-8">
												<input name="address" type="text" placeholder="Your address" class="form-control">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Phone</label>
											<div class="col-sm-8">
												<input name="phone" type="text" placeholder ="0777777777" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Gender</label>
											<div class="col-sm-8">
												<select name='gender' class="form-control selectpicker" title="Select Gender">
													<option value="male">male</option>
													<option value="female">female</option>
												</select>
											</div>
										</div>
										 
										<!-- <div class="form-group row">
											<button class="btn btn-primary" name="submit" type="submit">Submit</button>
										</div> -->
									</div>
								</section>
								<a class="text-primary" href="login_customer.php">Already have an account ?</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="../admin/vendors/scripts/core.js"></script>
	<script src="../admin/vendors/scripts/script.min.js"></script>
	<script src="../admin/vendors/scripts/process.js"></script>
	<script src="../admin/vendors/scripts/layout-settings.js"></script>
	<script src="../admin/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="../admin/vendors/scripts/steps-setting.js"></script>
	
	<script>
		function removeAlert(){
			// alert(user_err);
			if(user_err !=document.getElementById('email').value || user_err == null ){
				document.getElementById('err2').style.display = 'none';
				document.getElementById('err2').innerHTML = 'User Alrady Exist';
			}else{
				document.getElementById('err2').style.display = 'block';
			}
		}
		
		if(allErr){
			document.getElementById('err2').style.display = 'block';
			document.getElementById('err2').innerHTML = allErr;
			
		}
	</script>

</body>

</html>