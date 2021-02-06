<?php 
include "includes/connection_db.php";
if (isset($_POST["customer_id_delete"])) {
    // echo "<script>alert('{$_POST["customer_id_delete"]}')</script>";
    $query  = "DELETE from customers WHERE customer_id='{$_POST['customer_id_delete']}'";
    $result = mysqli_query($conn, $query);
   if($result){
       
       echo $_POST['customer_id_delete'] ;
   }
    // echo "<script>window.location='customers.php'</script>";
}

?>