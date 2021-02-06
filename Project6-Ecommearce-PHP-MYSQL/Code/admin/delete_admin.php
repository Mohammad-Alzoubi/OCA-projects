<?php
require('includes/connection_db.php');

$query = "delete from admins where admin_id = {$_GET['id']}";
mysqli_query($conn, $query);

header("location: ../admin");
