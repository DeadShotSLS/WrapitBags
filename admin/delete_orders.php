<?php
include("../db.php");
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM orders WHERE order_id = '".$_GET['order_del']."'");
header("location:all_orders.php");  

?>
