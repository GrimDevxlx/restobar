<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM employees WHERE em_id = '".$_GET['emp_del']."'");
header("location:all_employee.php");  

?>