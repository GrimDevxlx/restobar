<?php
include("connection/connect.php"); //connection to db
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM customers_orders WHERE c_id = '".$_GET['order_del']."'"); 
header("location:cashier_records.php"); 

?>