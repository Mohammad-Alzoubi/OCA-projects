<?php
require 'includes/connection.php';
include 'includes/public_header.php' ?>

<section class="section-slide">
    <div class="wrap-slick1 rs1-slick1">
        <div class="slick1">
            <div class="item-slick1" style="background-image: url(images/slide-015.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 cl2 respon2">
                                Collection 2020
                            </span>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                New arrivals
                            </h2>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="vendor.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-slick1" style="background-image: url(images/ps1.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30">
                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                            <span class="ltext-202 cl2 respon2" style="color: white;">
                                New-Season
                            </span>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                            <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1" style="color: white;">
                                Accessories And More
                            </h2>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="vendor.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-slick1" style="background-image: url(images/slide-015.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                            <span class="ltext-202 cl2 respon2">
                                Collection 2021
                            </span>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                NEW SEASON
                            </h2>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="vendor.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="sec-banner bg0">
    <div class="flex-w flex-c-m">

        <?php
        $query = 'SELECT * FROM categories';
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
        <div class="size-202 m-lr-auto respon4" >

        <div class="block1 wrap-pic-w">
            <img src="../admin/images/' . $row["category_image"] . '" alt="IMG-BANNER" style="height:400px">
            <a href="cat_vendors.php?id=' . $row["category_id"] . '" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                <div class="block1-txt-child1 flex-col-l">
                    <span class="block1-name ltext-102 trans-04 p-b-8">
                        ' . $row["category_name"] . '
                    </span>
                    <span class="block1-info stext-102 trans-04">
                        check our vendors
                    </span>
                </div>
                <div class="block1-txt-child2 p-b-4 trans-05">
                    <div class="block1-link stext-101 cl0 trans-09">
                        Shop Now
                    </div>
                </div>
            </a>
        </div>
    </div>
        
        ';
        }
        ?>



    </div>
</div>

<section class="sec-product bg0 p-t-100 p-b-50">
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Featured Products
            </h3>
        </div>

        <div class="tab01">



            <div class="tab-content p-t-50">

                <div class="tab-pane fade show active" id="best-seller" role="tabpanel">

                    <div class="wrap-slick2">
                        <div class="slick2">
                            <?php

                            $product_query = 'SELECT * FROM products where is_featured=1';
                            $product_result = mysqli_query($conn, $product_query);
                            while ($row = mysqli_fetch_assoc($product_result)) {

                                $perPrice = "";

                                if ($row['discount'] > 0) {
                                    $Newprice =   ((int)$row["product_price"] - ((int)$row["product_price"] * ((int)$row['discount'] / 100)));
                                    $perPrice =  "<p style=' text-decoration: line-through'>" . $row["product_price"] . " JOD" . "</p>";
                                } else {
                                    $Newprice = $row["product_price"];
                                    $perPrice = "";
                                }



                                echo '
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="../admin/' . $row["product_image"] . '" alt="IMG-PRODUCT">
                                            
                                            <a href=product_detail.php?id=' . $row['product_id'] . ' class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                                                Quick View
                                            </a>
                                        </div>
                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href=product_detail.php?id=' . $row['product_id'] . ' class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                ' . $row["product_name"] . '
                                                </a>
                                                <span class="stext-105 cl3">
                                                 ' .

                                    $perPrice .   $Newprice . " JOD" .


                                    '</span>
                                            </div>
                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    ';
                            }

                            ?>



                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="featured" role="tabpanel">

                    <div class="wrap-slick2">
                        <div class="slick2">
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-15.jpg" alt="IMG-PRODUCT">
                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>
                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Mini Silver Mesh Watch
                                            </a>
                                            <span class="stext-105 cl3">
                                                $86.85
                                            </span>
                                        </div>
                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="tab-pane fade" id="top-rate" role="tabpanel">

                    <div class="wrap-slick2">
                        <div class="slick2">
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-03.jpg" alt="IMG-PRODUCT">
                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>
                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Only Check Trouser
                                            </a>
                                            <span class="stext-105 cl3">
                                                $25.50
                                            </span>
                                        </div>
                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sec-product bg0 p-t-100 p-b-50">
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Hot Products
            </h3>
        </div>

        <div class="tab01">



            <div class="tab-content p-t-50">

                <div class="tab-pane fade show active" id="best-seller" role="tabpanel">

                    <div class="wrap-slick2">
                        <div class="slick2">
                            <?php

                            $product_query = 'SELECT * FROM products where is_hot=1';
                            $product_result = mysqli_query($conn, $product_query);
                            while ($row = mysqli_fetch_assoc($product_result)) {

                                $perPrice = "";

                                if ($row['discount'] > 0) {
                                    $Newprice =   ((int)$row["product_price"] - ((int)$row["product_price"] * ((int)$row['discount'] / 100)));
                                    $perPrice =  "<p style=' text-decoration: line-through'>" . $row["product_price"] . " JOD" . "</p>";
                                } else {
                                    $Newprice = $row["product_price"];
                                    $perPrice = "";
                                }



                                echo '
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="../admin/' . $row["product_image"] . '" alt="IMG-PRODUCT">
                                            <a href=product_detail.php?id=' . $row['product_id'] . ' class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                                                Quick View
                                            </a>
                                        </div>
                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href=product_detail.php?id=' . $row['product_id'] . ' class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                ' . $row["product_name"] . '
                                                </a>
                                                <span class="stext-105 cl3">
                                                ' .

                                    $perPrice .   $Newprice . " JOD" .


                                    '
                                                </span>
                                            </div>
                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    ';
                            }

                            ?>



                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="featured" role="tabpanel">

                    <div class="wrap-slick2">
                        <div class="slick2">
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-15.jpg" alt="IMG-PRODUCT">
                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>
                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Mini Silver Mesh Watch
                                            </a>
                                            <span class="stext-105 cl3">
                                                $86.85
                                            </span>
                                        </div>
                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="tab-pane fade" id="top-rate" role="tabpanel">

                    <div class="wrap-slick2">
                        <div class="slick2">
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-03.jpg" alt="IMG-PRODUCT">
                                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>
                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                Only Check Trouser
                                            </a>
                                            <span class="stext-105 cl3">
                                                $25.50
                                            </span>
                                        </div>
                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include 'includes/public_footer.php' ?>