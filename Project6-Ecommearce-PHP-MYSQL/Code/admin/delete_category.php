<?php
require('includes/connection_db.php');

$sql = "DELETE FROM categories WHERE category_id = {$_GET['id']}";
mysqli_query($conn, $sql);
header("location:manage_category.php");
