<?php

session_start();

(int)$_SESSION["total_price"] -= (int)$_GET['id_delete'];
unset($_SESSION["order"][$_GET['order_key']]);
echo $_SESSION["total_price"];

// $data = array("")

// $key = array_search('product_id', array_column($_SESSION["order"], 10));
// print_r($_GET['id_delete']);
