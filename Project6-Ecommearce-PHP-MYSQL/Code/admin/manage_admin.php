<?php
session_start();
require('includes/connection_db.php');
if (isset($_POST['submit'])) {
    // if (!isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0') {

    echo "<script> alert('test') </script>";
    // fetch data from form 

    $password = $_POST['password'];
    $username = $_POST['username'];
    $query = "INSERT INTO admins(admin_password,admin_username)
	         values('$password','$username')";
    mysqli_query($conn, $query);
    header("location: manage_admin.php");


    // }
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
            <div class="card-box pd-20 height-100-p mb-30">
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
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Manage Admin</h4>
                        <p class="mb-30">Add Admin</p>
                    </div>

                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Admin Username</label>
                        <input class="form-control" type="text" placeholder="Enter your name" name="username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" value="password" type="password" name="password">
                    </div>
                    <div class="form-group">
                    <label>Example file input</label>
                    <input if="sortpicture" name="image" type="file" class="form-control-file form-control height-auto">
                </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Add Admin</button>
                    </div>
                </form>

                </code></pre>
            </div>

            <!-- Responsive tables Start -->
            <div class="pd-20 card-box mb-30">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Admin Id</th>
                                <th scope="col">Admin Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                            $query  = "select * from admins";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['admin_id']}</td>";
                                echo "<td>{$row['admin_username']}</td>";
                                echo "<td><a href='edit_admin.php?id={$row['admin_id']}' class='btn btn-warning'>Edit</a></td>";
                                echo "<td><button onclick='popUp({$row['admin_id']})' class='btn btn-danger' >Delete</button></td>";
                                // echo "<td><a href='delete_admin.php?id={$row['admin_id']}' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
                <div class="collapse collapse-box" id="responsive-table">
                    <div class="code-box">
                        <div class="clearfix">
                            <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left" data-clipboard-target="#responsive-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
                            <a href="#responsive-table" class="btn btn-primary btn-sm pull-right" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                        </div>
                        <pre><code class="xml copy-pre" id="responsive-table-code">
                                <div class="table-responsive">
                                	<table class="table table-striped">
                                	  <thead>
                                	    <tr>
                                	      <th scope="col">#</th>
                                	    </tr>
                                	  </thead>
                                	  <tbody>
                                	    <tr>
                                	      <th scope="row">1</th>
                                	    </tr>
                                	  </tbody>
                                	</table>
                                </div>
                            </code>
                        </pre>
                    </div>
                </div>
            </div>
            <!-- Responsive tables End -->
        </div>
        <!-- Table to manage admin -->
    </div>


    </div>
    </div>
    <!-- js -->
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
                    ).then(() => window.location = `delete_admin.php?id=${id}`

                    )
                }
            })
        }
    </script>

    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="vendors/scripts/dashboard.js"></script>
</body>

</html>