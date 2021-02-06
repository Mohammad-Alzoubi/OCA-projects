<?php
if (!isset($_SESSION)) {

    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/cozastore/home-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 07:27:09 GMT -->

<head>
    <title>E-Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.png" />

    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">

    <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">

    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

        <!-- title -->


        <!-- favicon -->
        <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
        <!-- fontawesome -->
        <link rel="stylesheet" href="assets/css/all.min.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!-- owl carousel -->
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!-- animate css -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!-- mean menu css -->
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <!-- main style -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- responsive -->
        <link rel="stylesheet" href="assets/css/responsive.css">



    </head>

<body class="animsition">

    <header class="header-v2">

        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">

                    <a href="../publicSite" class="logo">
                        <img src="../admin/images/logo.png" alt="IMG-LOGO">
                    </a>

                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="../publicSite">Home</a>
                            </li>
                            <li>
                                <a href="vendor.php">Shop</a>
                            </li>
                            <li class="label1" data-label1="hot">
                                <a href="Features.php">Features</a>
                            </li>
                            <li>
                                <a href="profile.php">
                                    <?php

                                    if (isset($_SESSION['customer_id'])) {

                                        echo "Profile";
                                    } else {
                                        echo "Login";
                                    }

                                    ?>

                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-24">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                                <i class="zmdi zmdi-search"></i>
                            </div>
                        </div>
                        <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                            <a href="cart.php">
                                <div id="cart_count" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti " data-notify="<?php

                                                                                                                                            if (isset($_SESSION["order"])) {

                                                                                                                                                echo count($_SESSION["order"]);
                                                                                                                                            } else {
                                                                                                                                                echo 0;
                                                                                                                                            }

                                                                                                                                            ?>">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </a>
                        </div>
                        <div class="flex-c-m h-full p-lr-19">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="wrap-header-mobile">

            <div class="logo-mobile">
                <a href="index-2.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="flex-c-m h-full p-r-10">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                </div>
                <div class="flex-c-m h-full p-lr-10 bor5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li>
                    <a href="index-2.html">Home</a>
                    <ul class="sub-menu-m">
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                <li>
                    <a href="product.html">Shop</a>
                </li>
                <li>
                    <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
                </li>
                <li>
                    <a href="about.html">About</a>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>

        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE">
                </button>
                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    <aside class="wrap-sidebar js-sidebar">
        <div class="s-full js-hide-sidebar"></div>
        <div class="sidebar flex-col-l p-t-22 p-b-25">
            <div class="flex-r w-full p-b-30 p-r-27">
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
            <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
                <ul class="sidebar-link w-full">
                    <li class="p-b-13">
                        <a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
                            Home
                        </a>
                    </li>

                    <?php

                    if (isset($_SESSION['customer_id'])) {

                        echo ' <li class="p-b-13">
                        <a href="profile.php" class="stext-102 cl2 hov-cl1 trans-04">
                            My Account
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="logout.php" class="stext-102 cl2 hov-cl1 trans-04">
                            Logout
                        </a>
                    </li>';
                    } else {

                        echo ' <li class="p-b-13">
                        <a href="profile.php" class="stext-102 cl2 hov-cl1 trans-04">
                            Login
                        </a>
                    </li>';
                    }


                    ?>



                </ul>
                <div class="sidebar-gallery w-full p-tb-30">

                    <div class="flex-w flex-sb p-t-36 gallery-lb">

                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery" style="background-image: url('images/gallery-01.jpg');"></a>
                        </div>

                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery" style="background-image: url('images/gallery-02.jpg');"></a>
                        </div>

                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-03.jpg" data-lightbox="gallery" style="background-image: url('images/gallery-03.jpg');"></a>
                        </div>

                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-04.jpg" data-lightbox="gallery" style="background-image: url('images/gallery-04.jpg');"></a>
                        </div>

                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-05.jpg" data-lightbox="gallery" style="background-image: url('images/gallery-05.jpg');"></a>
                        </div>

                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-06.jpg" data-lightbox="gallery" style="background-image: url('images/gallery-06.jpg');"></a>
                        </div>

                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-07.jpg" data-lightbox="gallery" style="background-image: url('images/gallery-07.jpg');"></a>
                        </div>

                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-08.jpg" data-lightbox="gallery" style="background-image: url('images/gallery-08.jpg');"></a>
                        </div>

                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-09.jpg" data-lightbox="gallery" style="background-image: url('images/gallery-09.jpg');"></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-gallery w-full">
                    <span class="mtext-101 cl5">
                        About Us
                    </span>
                    <p class="stext-108 cl6 p-t-27">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit. Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem fermentum quis.
                    </p>
                </div>
            </div>
        </div>
    </aside>

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

</body>