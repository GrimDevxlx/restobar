<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM customers_orders WHERE c_id = '".$_GET['order_del']."'");
header("location:restaurant_records.php");  
?>