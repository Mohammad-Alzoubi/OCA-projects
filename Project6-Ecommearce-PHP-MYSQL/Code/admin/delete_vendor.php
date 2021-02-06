<?php
require('includes/connection_db.php');

$sql = "DELETE FROM vendors WHERE vendor_id = {$_GET['id']}";
mysqli_query($conn, $sql);
header("location:manage_vendors.php");
