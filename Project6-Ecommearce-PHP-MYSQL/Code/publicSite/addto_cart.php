<?php
session_start();
// unset($_SESSION["order"]);
$product_id = $_GET["id"];
$_SESSION["order"][] = array("product_id" => $product_id , "total" => $_GET["total"] ) ;
// if (isset($_SESSION["order"])) {
//     array_push($_SESSION["order"] , array("product_id" => $product_id , "total" => $_GET["total"] ));
// } else {
//     $_SESSION["order"][] = [$product_id];
 
// }
// echo "<pre>";
// print_r($_SESSION["order"]);
header("location:cart.php");
