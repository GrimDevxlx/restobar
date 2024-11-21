<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


if(isset($_POST['submit']))          
	{
        if(empty($_POST['f_name'])||
            empty($_POST['l_name'])||
                $_POST['email']==''||
                $_POST['phone']==''||
                $_POST['address']==''||
                $_POST['position']==''||
                $_POST['file']=='')
               
    
                
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>'
                                                            ;
											
								
		}
	else{

        $sql = "INSERT INTO employees(f_name,l_name,email,phone,address,position,file) VALUE('".$_POST['f_name']."','".$_POST['l_name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['position'].$_POST['file']."')";  // add employee ino the database
        mysqli_query($db, $sql); 
        move_uploaded_file($temp, $store);

            $success = 	'<div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         New Employee Added Successfully.
                    </div>'; 
	
        }
	}

?>

                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="">
                    <meta name="author" content="">
                    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
                    <title>Add Employee</title>
                    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
                    <link href="css/helper.css" rel="stylesheet">
                    <link href="css/style.css" rel="stylesheet">
                </head>

                <body class="fix-header">

                    <div class="preloader">
                        <svg class="circular" viewBox="25 25 50 50">
                            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                        </svg>
                    </div>

                    <div id="main-wrapper">

                        <div class="header">
                            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="dashboard.php">

                                        <span><img src="#" alt="homepage" class="dark-logo" /></span>
                                    </a>
                                </div>
                                <div class="navbar-collapse">

                                    <ul class="navbar-nav mr-auto mt-md-0">


                                    </ul>

                                    <ul class="navbar-nav my-lg-0">


                                        <li class="nav-item dropdown">

                                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                                <ul>
                                                    <li>
                                                        <div class="drop-title">Notifications</div>
                                                    </li>

                                                    <li>
                                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                                <ul class="dropdown-user">
                                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <div class="left-sidebar">

                            <div class="scroll-sidebar">

                                <nav class="sidebar-nav">
                                    <ul id="sidebarnav">
                                        <li class="nav-devider"></li>
                                        <li class="nav-label">Home</li>
                                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                                        <li class="nav-label">Log</li>

                                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user f-s-20" aria-hidden="true"></i><span class="hide-menu">Employees</span></a>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href="all_employee.php">All employee</a></li>
                                                <li><a href="add_employee.php">Add employee</a></li>
                                            </ul>
                                        </li>

                                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>

                                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                                            <ul aria-expanded="false" class="collapse">  
                                            <li><a href="all_menu.php">All menu</a></li>
                                                <li><a href="food_category.php">Add Category</a></li>
                                                <li><a href="add_menu.php">Add Menu</a></li>
                                            </ul>
                                        </li>
                                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>

                                    </ul>
                                </nav>

                            </div>

                        </div>

                        <div class="page-wrapper">
                            <div style="padding-top: 10px;">
                            
                            </div>

                            <div class="container-fluid">
                                <!-- Start Page Content -->


                                <?php  echo $error;
									        echo $success; ?>

                                <div class="col-lg-12">
                                    <div class="card card-outline-primary">
                                        <div class="card-header">
                                            <h4 class="m-b-0 text-white">Add Employee</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action='' method='post' enctype="multipart/form-data">
                                                <div class="form-body">

                                                    <hr>
                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">First Name</label>
                                                                <input type="text" name="f_name" class="form-control"
                                                                required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-danger">
                                                                <label class="control-label">Last name</label>
                                                                <input type="text" name="l_name" class="form-control"
                                                                required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Email </label>
                                                                <input type="text" name="email" class="form-control"
                                                                required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Phone Number</label>
                                                                <input type="number" name="phone" class="form-control"
                                                                required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label class="control-label">Position </label>
                                                                <input type="text" name="position" class="form-control"
                                                                required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                   <!--  <form action="" method="post" enctype="multipart/form-data"> -->
                                                   <div class="form-group">
                                                            <label for="file">Select file:</label>
                                                            <input type="file" name="file" id="file"><br><br>
                                                            <!-- <input type="submit" name="submit" value="Save" >-->
</div>
                                                       <!-- </form> -->
                                                        </div>
                                                    </div>

                                                    <h3 class="box-title m-t-40">Home Address</h3>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <div class="form-group">

                                                                <textarea name="address"  type="text" style="height:100px;" class="form-control"
                                                                maxlength=100></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                        </div>
                                      <div class="form-actions">
                                            <input type="submit" name="submit"  class="btn btn-primary" value="Save"> 
                                            <a href="add_employee.php" class="btn btn-inverse">Cancel</a>
                                        </div> 
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

                    <script src="js/lib/jquery/jquery.min.js"></script>
                    <script src="js/lib/bootstrap/js/popper.min.js"></script>
                    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
                    <script src="js/jquery.slimscroll.js"></script>
                    <script src="js/sidebarmenu.js"></script>
                    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
                    <script src="js/custom.min.js"></script>

        </body>
</html>