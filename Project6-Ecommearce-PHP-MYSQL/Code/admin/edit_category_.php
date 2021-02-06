<?php
require('includes/connection_db.php');
if (isset($_POST['submit'])) {
    $name  = $_POST['name'];

    if($_FILES['image']['size'] >0){


        
        $target = "images/" . basename($_FILES['image']['name']);
        $file  = $_FILES['image']['name'];
        
        //Update data
        $sql = "UPDATE categories SET category_name =  '$name',
																category_image = '$file' 
																WHERE category_id = '{$_GET['id']}'";
    mysqli_query($conn, $sql);
    
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
}else{
    $sql = "UPDATE categories SET category_name =  '$name'
    
    WHERE category_id = '{$_GET['id']}'";
mysqli_query($conn, $sql);
}
    header("location: manage_category.php");
}

// fetch old data 
//Get old data
$sql = "SELECT * FROM categories WHERE category_id = '{$_GET['id']}'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>



<body>

    <!-- Header -->
    <?php include 'includes/admin_header.php' ?>


    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="vendors/images/banner-img.png" alt="" />
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            Welcome back
                            <div class="weight-600 font-30 text-blue">Johnny Brown!</div>
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

            <!-- Form Admin -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Manage Admin</h4>
                        <p class="mb-30">Add Admin</p>
                    </div>

                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" type="text" placeholder="Enter your name" name="name" value="<?php echo $data['category_name'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Category Image</label>
                        <input class="form-control" value="./images/{$data['category_image']}" type="file" name="image">
                    </div>
                    <?php
                    echo "
		            <div>
		            		<img src='./images/{$data['category_image']}' width='100px' height='100px'>
		            </div>
			        ";
                    ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Update Category</button>
                    </div>

                </form>

                </code></pre>
            </div>



        </div>
        <!-- Table to manage admin -->
    </div>


    </div>
    </div>
    <!-- <img src='/admin/vendors/images/product-1.jpg' width='70' height='70'> -->
    <?php include 'includes/admin_footer.php' ?>