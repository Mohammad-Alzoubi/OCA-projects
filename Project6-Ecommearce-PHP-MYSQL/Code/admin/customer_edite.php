<?php
// include "index.php";
// include "./includes/header.php";
include "./includes/connection_db.php";
?>
<?php include 'includes/admin_header.php' ?>
<?php
$query  = "SELECT * from customers where customer_id = '{$_GET['id']}'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {

    $name = $row['customer_name'];
    $email = $row['customer_email'];
    $address = $row['customer_address'];
    $phone = $row['customer_phone'];
    $gender = $row['customr_gender'];
    $image = $row['customer_image'];
    $password =  $row["customer_password"];
}
?>

<?php
$erro = "";


if (isset($_POST["name"])) {

    //     $test = json_encode($_FILES["image"]["size"]);

    //   echo "<script>console.log('$test')</script>";

    if ($_FILES["image"]["size"] == 0) {
    } else {

        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $image = "images/" . $filename;

        if (move_uploaded_file($tempname, $image)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }
    }

    if (!empty($_POST["password"])) {

        $password = $_POST["password"];
    }


    $name = $_POST["name"];
    $email = $_POST["email"];

    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];


    if ((!empty($name)) && (!empty($email))  && (!empty($address)) && (!empty($phone)) && (!empty($gender)) && (!empty($image))) {

        $query  = "UPDATE  customers SET customer_name = '$name' , customer_email = '$email' ,customer_password ='$password' , customer_address = '$address', customer_phone ='$phone' , customr_gender = '$gender' ,customer_image='$image'
                     WHERE customer_id = '{$_GET['id']}' ";

        $result = mysqli_query($conn, $query);


        echo "<script>window.location='customers.php'</script>";
        // header("location: customers.php") ;
    } else {

        $erro = "All Feild Requier";
    }

   

}

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
            <form id="customer_form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input id="name" name="name" value="<?php echo $name ?>" class="form-control" type="text" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input id="email" name="email" value="<?php echo $email ?>" class="form-control" placeholder="someone@example.com" type="email">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input id="address" name="address" value="<?php echo $address ?>" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input id="phone" name="phone" value="<?php echo $phone ?>" class="form-control" placeholder="0777777777">
                </div>

                <div class="form-group">
                    <label>New Password</label>
                    <input id="password" name="password" class="form-control" placeholder="leave blank for no change" type="password">
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-12">
                        <label class="weight-600">Custom Radio</label>
                        <div class="custom-control custom-radio mb-5">
                            <?php

                            if ($gender == "male") {
                                echo "<input checked type='radio' id='gender1' value='male' name='gender' class='custom-control-input'> ";
                            } else {

                                echo " <input  type='radio' id='gender1' value='male' name='gender' class='custom-control-input'> ";
                            };


                            ?>
                            <label class="custom-control-label" for="gender1">Male</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <?php

                            if ($gender == "female") {
                                echo "<input checked type='radio' id='gender2' value='female' name='gender' class='custom-control-input'> ";
                            } else {

                                echo "<input  type='radio' id='gender2' value='female' name='gender' class='custom-control-input'> ";
                            };


                            ?>

                            <label name="gender1" class="custom-control-label" for="gender2">Female</label>
                        </div>

                    </div>


                </div>



                <div class="form-group">
                    <label>Example file input</label>
                    <input onchange="imageUpdate()" name="image" type="file" class="form-control-file form-control height-auto">
                </div>
                <div class="form-group">

                    <img id="customer_image" width="150px" height="150px" name="image" src="<?php echo $image ?>">
                </div>




            </form>
            <div style="display: none;" class=" alert alert-danger" id="err">All Field are Required to Create Customer</div>
            <div class="d-flex align-items-center flex-column justify-content-center">
                <?php
                echo $erro;
                ?>

                <button name="submit" onclick="check()" class="btn btn-success">Create Customer</button>
            </div>

        </div>
    </div>



</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
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

                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ).then(() => {
                    var formDelete = document.createElement("form");
                    var formtext = document.createElement("input");
                    formDelete.setAttribute("method", "post");
                    formDelete.setAttribute("action", "customers.php");
                    formtext.setAttribute("name", "customer_id_delete");
                    formtext.value = id;
                    formDelete.appendChild(formtext);
                    document.body.appendChild(formDelete);


                    formDelete.submit();

                });




            }
        });
    }

    function check() {

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var phone = document.getElementById("phone").value;
        var address = document.getElementById("address").value;

        if (name == "" || email == "" || phone == "" || address == "") {

            document.getElementById("err").style.display = "block";

        } else {

            // alert('sdfsdft');
            document.getElementById("customer_form").submit();
        }


    }

    function imageUpdate() {

        var fReader = new FileReader();
        fReader.readAsDataURL(event.target.files[0]);
        fReader.onloadend = function(event) {

            document.getElementById("customer_image").setAttribute("src", event.target.result)

        }
    }
</script>