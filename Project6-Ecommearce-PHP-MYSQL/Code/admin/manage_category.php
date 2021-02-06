<?php
require('includes/connection_db.php');

if (isset($_POST['submit'])) {

    $target = "images/" . basename($_FILES['image']['name']);

    $name  = $_POST['name'];
    $file  = $_FILES['image']['name'];

    $sql = "INSERT INTO categories(category_name, category_image)
													VALUES('$name', '$file')";
    mysqli_query($conn, $sql);

    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    header("location: manage_category.php");
}
?>
<!DOCTYPE html>
<html>



<body>

    <!-- Header -->
    <?php include 'includes/admin_header.php' ?>


    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20  mb-30">
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


        <!-- Form Admin -->
        <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Manage Category</h4>
                    <p class="mb-30">Add Category</p>
                </div>

            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control" name="name" placeholder="Enter your name" type="text" required>
                    <!-- <input class="form-control" type="text"  name="category_name"> -->
                </div>

                <div class="form-group">
                    <label>Category Image</label>
                    <input type="file" accept="image/*" name="image" required class="form-control">
                    <!-- <input class="form-control" type="file" name="category_image"> -->
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-4" name="submit">Add Category</button>
                </div>
            </form>


        </div>
        </div>

        <!-- Responsive tables Start -->
        <div class="pd-ltr-20">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">Recent Categories</h4>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <tr scope="col">
                            <th scope="col">Category Id</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Image</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "
							<td>{$row['category_id']}</td>
							<td>{$row['category_name']}</td>
							<td><img src='./images/{$row['category_image']}' width='100px' height='100px'></td>
							<td><a href='edit_category_.php?id={$row['category_id']}' class= 'btn btn-warning'>Edit</a></td>
							<td><button onclick= popUp({$row['category_id']}) class='btn btn-danger' > Delete</button></td>
							";
                            echo "</tr>";
                        }
                        ?>



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
                                            window.location = `delete_category.php?id=${id}`

                                        )
                                    }
                                })
                            }
                        </script>
                    </tbody>
                </table>
            </div>
            <!-- Responsive tables End -->
        </div>
        </div>
        <br>
        <!-- Table to manage admin -->






    </div>
</body>
<!-- </div> -->
<!-- <img src='/admin/vendors/images/product-1.jpg' width='70' height='70'> -->