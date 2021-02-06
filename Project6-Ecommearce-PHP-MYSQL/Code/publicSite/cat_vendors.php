<?php
require 'includes/connection.php';
include 'includes/public_header.php';
$id = $_GET["id"];
?>

<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Our Vendors
            </h3>
        </div>
        <div class="row">
            <?php
            $vendor_query = "SELECT * FROM vendors WHERE cat_id=$id";
            $vendor_result = mysqli_query($conn, $vendor_query);
            while ($vendor_row = mysqli_fetch_assoc($vendor_result)) {
                echo '
                <div class="col-sm-6 col-md-4 p-b-40">
                <div class="blog-item">
                    <div class="hov-img0">
                        <a href="vendor_products.php?id=' . $vendor_row["vendor_id"] . '">
                            <img src="../admin/' . $vendor_row["vendor_image"] . '" alt="IMG-BLOG">
                        </a>
                    </div>
                    <div class="p-t-15">
                         <h4 class="p-b-12">
                            <a href="vendor_products.php?id=' . $vendor_row["vendor_id"] . '" class="mtext-101 cl2 hov-cl1 trans-04">
                            ' . $vendor_row["vendor_name"] . '
                            </a>
                        </h4>
                        <p class="stext-108 cl6">
                        ' . $vendor_row["vendor_desc"] . '
                        </p>
                    </div>
                </div>
            </div>
                ';
            }
            ?>

        </div>
    </div>
</section>






<?php include 'includes/public_footer.php' ?>