<?php
session_start();
require('includes/connection.php');
if (isset($_POST["login"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM customers WHERE customer_email='$username' AND customer_password='$password'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        if (isset($user["customer_id"])) {
            $_SESSION["customer_id"] = $user["customer_id"];

            header("location: cart.php");
        } else {
            $error = "User Not found.";
        }
    } else {
        $error = "Please enter your username and Password.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Sheout Mega Stor/title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../admin/vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../admin/vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../admin/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="../admin/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="../admin/vendors/styles/style.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-119386393-1");
    </script>
</head>

<body class="login-page">

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/login-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To Admin Dashboard</h2>
                        </div>
                        <form action="" method="post">
                            <?php if (isset($error)) {
                                echo "<div class='alert alert-danger'> $error</div>";
                            }  ?>
                            <div class="select-role">

                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="username" />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                </div>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-0">
                                            <!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
                                            <!-- <a href="manage_admin.php"> -->
                                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="login"> Sign In</button>
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </div>
                        </form>
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
</body>

</html>