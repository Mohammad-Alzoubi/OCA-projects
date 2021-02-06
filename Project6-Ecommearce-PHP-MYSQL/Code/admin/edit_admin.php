<?php
require('includes/connection_db.php');
if (isset($_POST['submit'])) {
    // fetch data from form 

    $password = $_POST['password'];
    $username = $_POST['username'];
    $query = "UPDATE admins SET admin_password = '$password',
	                           admin_username = '$username'
	                           WHERE admin_id = {$_GET['id']}";
    mysqli_query($conn, $query);
    header("location: ../admin");
}

$query  = "select * from admins where admin_id = {$_GET['id']}";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

include('includes/admin_header.php');

?>




<body>







    <div class="main-container">
        <div class="pd-ltr-20">


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
                        <input class="form-control" type="text" placeholder="Enter your name" name="username" value="<?php echo $row['admin_username'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" value="<?php echo $row['admin_password'] ?>" type="password" name="password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
                    </div>
                </form>

                </code></pre>
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
						
                </div>
            </div>
        </div>



    <!-- js -->
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