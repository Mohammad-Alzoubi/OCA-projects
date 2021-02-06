<?php
//SELECT `product_id`, `product_name`, `product_image`, `product_price`, `product_qty`, `product_desc`, `is_hot`, `is_featured`, `vendor_id`, `created_at` FROM `products` WHERE 1
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



    $name    = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $vendorId = $_POST['vendor'];
    $productQty = $_POST['productQty'];
    $discount = $_POST['discount'];

    if (isset($_POST['isFeatured'])) {
        $isFeatured = $_POST['isFeatured'];
    } else {
        $isFeatured = 0;
    }

    if (isset($_POST['isHot'])) {
        $isHot = $_POST['isHot'];
    } else {
        $isHot = 0;
    }


    $sql_product = "INSERT INTO products (
                                product_name,
                                vendor_id,
                                 product_image,
                                 product_desc,
                                 product_price,
                                 product_qty,
                                 is_hot,
                                 is_featured ,
                                 discount
    ) VALUES (
        '$name',
        $vendorId,
        '$target_Img',
        '$desc',
        '$price',
        '$productQty',
        '$isHot',
        '$isFeatured',
        '$discount')";
    mysqli_query($conn, $sql_product);
}

?>

<?php include('./includes/admin_header.php'); ?>

<body>
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 -p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="vendors/images/banner-img.png" alt="" />
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            Welcome back
                            <?php
                            // $test = json_encode($_SESSION["admin_id"]);
                            // echo "<script>console.log('$test')</script>";
                            // echo "<script>alert('{$_SESSION['admin_username']}')</script>";
                            if (isset($_SESSION['admin_id'])) {

                                echo "<div class='weight-600 font-30 text-blue'>{$_SESSION['admin_id']}</div>";
                            }

                            ?>
                            <!-- <div class="weight-600 font-30 text-blue">Johnny Brown!</div> -->
                        </h4>
                        <p class="font-18 max-width-600">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
                            hic non repellendus debitis iure, doloremque assumenda. Autem
                            modi, corrupti, nobis ea iure fugiat, veniam non quaerat
                            mollitia animi error corporis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="pd-ltr-20">
            <div class="pd-20 card-box mb-30">
                

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>product name</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>choose image</label>
                        <input type="file" class="form-control-file form-control height-auto" name="image">
                    </div>
                    <div class="form-group">
                        <label>product_price</label>
                        <input class="form-control" type="text" name="price">
                    </div>
                    <div class="form-group">
                        <label>product quantity</label>
                        <input class="form-control" type="text" name="productQty">
                    </div>
                    <div class="form-group">
                        <label>describtion</label>
                        <textarea class="form-control" name="desc"></textarea>
                    </div>
                    <div class="form-group col-1 mx-0 px-0">
                        <label>Discount</label>
                        <input class="form-control" type="number" min="0" value="0" name="discount">
                    </div>
                    <div class="form-group col-1 mx-0 px-0">
                    <input type="checkbox" id="vehicle1" name="isHot" value="1">
                    <label for="vehicle1"> is hot</label><br>
                    <input type="checkbox" id="vehicle1" name="isFeatured" value="1">
                    <label for="vehicle1"> is featured</label><br>
                    </div>

                    <div class="form-group">
                        <label>vendor</label>
                        <select class="form-control" name="vendor">
                            <?php

                            $query  = "select * from vendors";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $venId = $row['vendor_id'];
                                $venName = $row['vendor_name'];
                                echo "<option value='$venId'>$venName</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Save
                        </button>
                    </div>
                    </form>
         
            </div>
        </div>
           

            <!-- horizontal Basic Forms End -->
            <!-- Striped table start -->
         <div class="pd-ltr-20">
            <div class="pd-20 card-box mb-30 ">
                <div class="table-responsive">
                    <table class="table hover  data-table-export nowrap">
                        <thead>
                            <tr>

                                <th>Image</th>
                                <th class="table-plus ">Name</th>
                                <th>Vendor Name</th>
                                <th>Quantity</th>
                                <th>price</th>
                                <th>describtion</th>
                                <th>isHot</th>
                                <th>isfeatured</th>
                                <th>created_at</th>

                                <th>Action</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT vendors.vendor_name,products.product_id , products.product_name,products.product_image,products.product_desc,products.product_price,products.product_qty,products.is_hot,products.is_featured ,products.vendor_id,products.created_at
                                         FROM products
                                         INNER JOIN vendors ON products.vendor_id = vendors.vendor_id";
                            // $query  = "select * from products";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";


                                echo "<td><img height = '65px' width='65px'  src='{$row['product_image']}' ></td>";
                                echo "<td>{$row['product_name']}</td>";
                                echo "<td>{$row['vendor_name']}</td>";
                                echo "<td>{$row['product_qty']} Pcs</td>";
                                echo "<td>{$row['product_price']} JOD</td>";
                                echo "<td>{$row['product_desc']}</td>";
                                echo "<td>{$row['is_hot']}</td>";

                                echo "<td>{$row['is_featured']}</td>";
                                echo "<td>{$row['created_at']}</td>";


                                echo " <td>
                                    <div class='dropdown'>
                                    <a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
                                    <i class='dw dw-more'></i>
                                      </a>
                                  <div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
                              
                                    <a style='cursor: pointer' class='dropdown-item' href='edit_products.php?id={$row['product_id']}&ven={$row['vendor_id']}'><i class='dw dw-edit2'></i> Edit</a>
                                    <a style='cursor: pointer' class='dropdown-item' href='delet_products.php?id={$row['product_id']}&type=product'><i class='dw dw-delete-3'></i> Delete</a>
                                     </div>
                                    </div>
                                    </td>";



                                // echo "<td><a href='edit_products.php?id={$row['product_id']}&ven={$row['vendor_id']}' class='btn btn-warning'>Edit</a></td>";
                                // echo "<td><a href='delet_products.php?id={$row['product_id']}&type=product' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br>
        
    </div>
   

    <!-- Striped table End -->
    
    
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="vendors/scripts/dashboard.js"></script>

    <script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>

	<script src="vendors/scripts/datatable-setting.js"></script></body>

</body>

</html>