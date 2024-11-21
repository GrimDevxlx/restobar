<!DOCTYPE html>
<html lang="en">
<?php


session_start();
error_reporting(0);
include("../connection/connect.php");

if(isset($_POST['submit'] ))
{
    if( empty($_POST['f_name'])|| 
		empty($_POST['l_name']) ||  
		empty($_POST['email'])||
		empty($_POST['phone'])||
		empty($_POST['address'])||
        empty($_POST['position'])||
        empty($_POST['resume']))
        {
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Required!</strong>
															</div>';
		}

	elseif(strlen($_POST['phone']) < 10)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid phone!</strong>
															</div>';
	}

	else{
       
	$mql = "update employees set f_name='$_POST[f_name]', l_name='$_POST[l_name]',email='$_POST[email]',phone='$_POST[phone]',address='$_POST[address]',position='$_POST[position],resume='$_POST[resume]' where em_id='$_GET[emp_upd]'";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Employee Updated!</strong></div>';
	
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
                    <title>Update Employee</title>
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
                                      
                                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Restaurant</span></a>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href="all_restaurant.php">All Restaurants</a></li>
                                                <li><a href="add_category.php">Add Category</a></li>
                                                <li><a href="add_restaurant.php">Add Restaurant</a></li>

                                            </ul>
                                        </li>
                                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href="all_menu.php">All Menues</a></li>
                                                <li><a href="add_menu.php">Add Menu</a></li>
                                            </ul>
                                        </li>
                                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li><a href="all_orders.php">Online records</a></li>
                                            <li><a href="restaurant_records.php">restaurant records</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>

                            </div>

                        </div>

                        <div class="page-wrapper" style="height:1200px;">
                            <div style="padding-top: 10px;">
                            </div>

                            <div class="row page-titles">
                                <div class="col-md-5 align-self-center">
                                    <h3 class="text-primary">Dashboard</h3>
                                </div>

                            </div>
                            <div class="container-fluid">

                                <div class="row">



                                    <div class="container-fluid">



                                        <?php  
									        echo $error;
									        echo $success; 										
											?>

                                        <div class="col-lg-12">
                                            <div class="card card-outline-primary">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white">Update Employee</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php $ssql ="select * from employees where em_id='$_GET[emp_upd]'";
													$res=mysqli_query($db, $ssql); 
													$newrow=mysqli_fetch_array($res);?>
                                                    <form action='' method='post'>
                                                        <div class="form-body">

                                                            <hr>
                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">First Name</label>
                                                                        <input type="text" name="f_name" class="form-control" value="<?php  echo $newrow['f_name']; ?>" placeholder=" ">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">Last Name</label>
                                                                        <input type="text" name="l_name" class="form-control form-control-danger" value="<?php  echo $newrow['l_name'];  ?>" placeholder=" ">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">email </label>
                                                                        <input type="text" name="email" class="form-control" placeholder="@gmail.com" value="<?php  echo $newrow['email']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">Phone Number</label>
                                                                        <input type="text" name="phone" class="form-control form-control-danger" value="<?php  echo $newrow['phone'];  ?>" placeholder=" ">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <label class="control-label">position </label>
                                                                            <input type="text" name="position" class="form-control form-control-danger" value="<?php  echo $newrow['position'];  ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h3 class="box-title m-t-40">Home Address</h3>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12 ">
                                                                        <div class="form-group">

                                                                            <textarea name="address" type="text" style="height:100px;" class="form-control" value="<?php  echo $newrow['position'];  ?>"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                </div>
                                                <div class="form-actions">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                                    <a href="all_employee.php" class="btn btn-inverse">Cancel</a>
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