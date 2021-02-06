<?php
// include "index.php";
// include "./includes/header.php";
include "./includes/connection_db.php";

?>
<?php include 'includes/admin_header.php' ?>

<?php
$erro = "";



?>

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




    <div class="pd-20">


        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">horizontal Basic Forms</h4>
                    <p class="mb-30">All bootstrap element classies</p>
                </div>

            </div>
            <form onsubmit="event.preventDefault()" id="customer_form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input id="name" name="name" class="form-control" type="text" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input onkeyup="removeAlert()" id="email" name="email" class="form-control" placeholder="someone@example.com" type="email">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input onkeyup="removeAlert()" id="address" name="address" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input onkeyup="removeAlert()" id="phone" name="phone" class="form-control" placeholder="0777777777">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input onkeyup="removeAlert()" id="password" name="password" class="form-control" placeholder="password" type="password">
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-12">
                        <label class="weight-600">Custom Radio</label>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="gender1" value="male" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="gender1">Male</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input checked type="radio" id="gender2" value="female" name="gender" class="custom-control-input">
                            <label name="gender1" class="custom-control-label" for="gender2">Female</label>
                        </div>

                    </div>


                </div>



                <div class="form-group">
                    <label>Example file input</label>
                    <input if="sortpicture" name="image" type="file" class="form-control-file form-control height-auto">
                </div>




            </form>
            <div style="display: none;" class=" alert alert-danger" id="err">
                All Field are Required to Create Customer
            </div>

            <?php
            if (!empty($err)) {
                echo " <div  class=' alert alert-danger' id='err2'>";
                echo $err;
                //    echo "<script> document.getElementById('err2').style.display = 'block' ";
                echo "</div>";
            }
            ?>
            <div class="d-flex align-items-center flex-column justify-content-center">
                <?php
                echo $erro;

                ?>

                <button name="submit" onclick="check()" class="btn btn-success">Create Customer</button>
            </div>

        </div>
    </div>



    <!-- <div class="pd-20">
        <div class="pd-20 card-box mb-30">
            <div class="table-responsive">
                <table class="data-table table nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus " scope="col">Customer Id</th>
                            <th class="datatable-nosort" scope="col">Customer Image</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Address</th>
                            <th scope="col">Customer Phone</th>

                            <th scope="col">Created Date</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>


                    <tbody id="customer_table">

                        <?php
                        $query  = "select * from customers";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr id='{$row['customer_id']}'>";
                            echo "<td >{$row['customer_id']}</td>";

                            echo "<td><image width='65px' height='65px' src='{$row['customer_image']}'/></td>";
                            echo "<td>{$row['customer_name']}</td>";
                            echo "<td>{$row['customer_address']}</td>";
                            echo "<td>{$row['customer_phone']}</td>";

                            echo "<td>{$row['created_at']}</td>";

                            echo " <td>
                                    <div class='dropdown'>
                                    <a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
                                    <i class='dw dw-more'></i>
                                      </a>
                                  <div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
                              
                                    <a style='cursor: pointer' class='dropdown-item' href='customer_edite.php?id={$row['customer_id']}'><i class='dw dw-edit2'></i> Edit</a>
                                    <a style='cursor: pointer' class='dropdown-item' onclick='popup({$row['customer_id']})'><i class='dw dw-delete-3'></i> Delete</a>
                                     </div>
                                    </div>
                                    </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div> -->
    <div class="pd-20">

    <div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Data Table with Export Buttons</h4>
					</div>
					<div class="pb-20">
						<table class="table hover  data-table-export nowrap">
							<thead>
								<tr>
									<!-- <th class="table-plus datatable-nosort">Name</th>
									<th>Age</th>
									<th>Office</th>
									<th>Address</th>
									<th>Start Date</th>
									<th>Salart</th>
                                    <th>Salart</th> -->
                                    
                            <th class="table-plus ">Customer Id</th>
                            <th class="datatable-nosort">Customer Image</th>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Customer Phone</th>

                            <th>Created Date</th>
                            <th class="datatable-nosort">Action</th>




								</tr>
							</thead>
							<tbody  id="customer_table">

                        <?php
                        $query  = "select * from customers";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr id='{$row['customer_id']}'>";
                            echo "<td  >{$row['customer_id']}</td>";

                            echo "<td><image width='65px' height='65px' src='{$row['customer_image']}'/></td>";
                            echo "<td>{$row['customer_name']}</td>";
                            echo "<td>{$row['customer_address']}</td>";
                            echo "<td>{$row['customer_phone']}</td>";

                            echo "<td>{$row['created_at']}</td>";

                            echo " <td>
                                    <div class='dropdown'>
                                    <a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
                                    <i class='dw dw-more'></i>
                                      </a>
                                  <div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
                              
                                    <a style='cursor: pointer' class='dropdown-item' href='customer_edite.php?id={$row['customer_id']}'><i class='dw dw-edit2'></i> Edit</a>
                                    <a style='cursor: pointer' class='dropdown-item' onclick='popup({$row['customer_id']})'><i class='dw dw-delete-3'></i> Delete</a>
                                     </div>
                                    </div>
                                    </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>

						</table>
					</div>
                </div>
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

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    var user_err = null;
    async function ajaxdelet(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById(this.responseText).style.display = "none";
            }
        };
        xhttp.open("POST", "customers_delet.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`customer_id_delete=${id}`);

    };




    function popup(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                ajaxdelet(id).then(() =>
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ))
            };
        })
    }

    function removeAlert() {
        // alert(user_err);
        if (user_err != document.getElementById('email').value || user_err == null) {

            $("#err").fadeOut();

        } else {
            $("#err").fadeIn();

        }
    }

    async function ajaxcreate(name, email, password, phone, address, gender, image) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                // document.getElementById(this.responseText).remove();
                console.log(this.responseText)
            }
        };
        xhttp.open("POST", "customers_create.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`name=${name}` + "&" + `email=${email}` + "&" + `password=${password}` + "&" + `phone=${phone}` + "&" + `address=${address}` + "&" + `gender=${gender}` + "&" + `image=${image}`);
    }

    $("#customer_form").on('submit', (function(e) {
        e.preventDefault();
        $.ajax({
            url: "customers_create.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                //$("#preview").fadeOut();

                $("#err").fadeOut();
            },
            success: function(data) {

                data = JSON.parse(data);
                if (data.msg == "done") {


          






                    var inserst =

                        `<tr role='row' id=${data.id}>` +
                        `<td >${data.id}</td>`

                        +
                        `<td><image width='65px' height='65px' src='${data.image}'/></td>` +
                        `<td>${data.name}</td>` +
                        `<td>${data.address}</td>` +
                        `<td>${data.phone}</td>`

                        +
                        `<td>2021</td>`

                        +
                        `<td> 
                        
                            <div class='dropdown'>
                                    <a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
                                    <i class='dw dw-more'></i>
                                      </a>
                                  <div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
                              
                                    <a style='cursor: pointer' class='dropdown-item' href='customer_edite.php?id='${data.id}'><i class='dw dw-edit2'></i> Edit</a>
                                    <a style='cursor: pointer' class='dropdown-item' onclick='popup(${data.id})'><i class='dw dw-delete-3'></i> Delete</a>
                                </div>
                             </div>

                         </td>  ` +
                        `</tr>`;

                    $("#customer_table").append(inserst);

                    $('input[name=name]').val("");
                    $('input[name=email]').val("");
                    $('input[name=password]').val("");
                    $('input[name=phone]').val("");
                    $('input[name=address]').val("");

                    $('input[name=image]').val("");


                    
                } else {
                    data.user_err ? user_err = data.user_err : user_err = null;

                    $("#err").html(data.msg).fadeIn();
                    //  document.getElementById("err").innerHTML = data.msg;
                }




            },
            error: function(e) {
                $("#err").html(data.msg).fadeIn();
            }
        })
    }));

    function check() {


        $("#customer_form").submit();


    }
</script>
<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>

	<script src="vendors/scripts/datatable-setting.js"></script></body>



    