<?php
include("../db.php");
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM products WHERE product_id = '".$_GET['menu_del']."'");
header("location:all_menu.php");  

?>
