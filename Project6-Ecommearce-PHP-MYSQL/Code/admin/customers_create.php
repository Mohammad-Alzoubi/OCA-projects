<?php
include "includes/connection_db.php";
if (isset($_POST["name"])) {

        $test = json_encode($_FILES["image"]["size"]);



    if ($_FILES["image"]["size"] == 0) {

        $image = "images/user.png";
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




    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];




    if ((!empty($name)) && (!empty($email)) && (!empty($password)) && (!empty($address)) && (!empty($phone)) && (!empty($gender)) && (!empty($image))) {


        $query  = "SELECT * FROM customers WHERE customer_email = '$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if (isset($row["customer_id"])) {
            $err = array("msg"=>"User Aleary Exisist" , "user_err"=>$email);

            echo json_encode($err);
            //  echo "<script> document.getElementById('err').style.display = 'block';document.getElementById('err').innerHTML= 'User Exisist'</script>";
        } else {

            $query  = "INSERT INTO customers(customer_name , customer_email ,customer_password , customer_address , customer_phone , customr_gender ,customer_image)
                                        values('$name','$email','$password','$address','$phone','$gender','$image')";
            $result = mysqli_query($conn, $query);

            $err = "";
           $id= $conn-> insert_id;

           $data = array("id"=>$id , "msg"=>"done" , "name"=>$name , "email"=>$email ,"address"=>$address , "phone"=>$phone ,"gender"=>$gender , "image"=>$image);


  
echo json_encode($data);
 
        
        
        }
    } else {
        $err = array("msg"=>"All Feild Requier");

        echo json_encode($err);
      
    }

    // header("location: index.php");

}

// echo json_encode($_POST);
// print_r( json_encode($_FILES));

?>







