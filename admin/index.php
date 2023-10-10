<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div class="navbar-brand-box">
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo-dark.png"  />
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="index" class="waves-effect"><i class='bx bx-home-smile'></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="create-shipment" class="waves-effect"><i class='bx bx-add-to-queue'></i><span>Create Shipment</span></a>
                        </li>
                        <li>
                            <a href="track_parcel" class="waves-effect"><i class='bx bx-home-smile'></i><span>Tracking</span></a>
                        </li>
                        <li>
                            <a href="email-creator" class="waves-effect"><i class='bx bx-home-smile'></i><span>Email Creator</span></a>
                        </li>
                        <li>
                            <a href="support" class="waves-effect"><i class='bx bx-home-smile'></i><span>Chat Support</span></a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
     
        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                   
                </div>

                <div class="d-flex align-items-center">

                  
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">Admin</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                           
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="logout.php">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!--<div class="row">-->
                    <!--    <div class="col-xl-3 col-md-6">-->
                    <!--        <div class="card card-animate">-->
                    <!--            <div class="card-body">-->
                    <!--                <div class="avatar-sm float-right">-->
                    <!--                    <span class="avatar-title bg-soft-primary rounded-circle">-->
                    <!--                        <i class="bx bx-layer m-0 h3 text-primary"></i>-->
                    <!--                    </span>-->
                    <!--                </div>-->
                    <!--                <h6 class="text-muted text-uppercase mt-0">Project Income</h6>-->
                    <!--                <h3 class="my-3">$4,514</h3>-->
                    <!--                <span class="badge badge-soft-primary mr-1"> +11% </span> <span class="text-muted">From previous period</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->

                    <!--    <div class="col-xl-3 col-md-6">-->
                    <!--        <div class="card card-animate">-->
                    <!--            <div class="card-body">-->
                    <!--                <div class="avatar-sm float-right">-->
                    <!--                    <span class="avatar-title bg-soft-primary rounded-circle">-->
                    <!--                        <i class="bx bx-dollar-circle m-0 h3 text-primary"></i>-->
                    <!--                    </span>-->
                    <!--                </div>-->
                    <!--                <h6 class="text-muted text-uppercase mt-0">Net Revenue</h6>-->
                    <!--                <h3 class="my-3">$85,365</h3>-->
                    <!--                <span class="badge badge-soft-primary mr-1"> -29% </span> <span class="text-muted">This Month</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->

                    <!--    <div class="col-xl-3 col-md-6">-->
                    <!--        <div class="card card-animate">-->
                    <!--            <div class="card-body">-->
                    <!--                <div class="avatar-sm float-right">-->
                    <!--                    <span class="avatar-title bg-soft-primary rounded-circle">-->
                    <!--                        <i class="bx bx-analyse m-0 h3 text-primary"></i>-->
                    <!--                    </span>-->
                    <!--                </div>-->
                    <!--                <h6 class="text-muted text-uppercase mt-0">New Leads</h6>-->
                    <!--                <h3 class="my-3">$<span data-plugin="counterup">9.94</span></h3>-->
                    <!--                <span class="badge badge-soft-primary mr-1"> 0% </span> <span class="text-muted">This Month</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->

                    <!--    <div class="col-xl-3 col-md-6">-->
                    <!--        <div class="card card-animate">-->
                    <!--            <div class="card-body">-->
                    <!--                <div class="avatar-sm float-right">-->
                    <!--                    <span class="avatar-title bg-soft-primary rounded-circle">-->
                    <!--                        <i class="bx bx-basket m-0 h3 text-primary"></i>-->
                    <!--                    </span>-->
                    <!--                </div>-->
                    <!--                <h6 class="text-muted text-uppercase mt-0">Quoted </h6>-->
                    <!--                <h3 class="my-3" data-plugin="counterup">5,842</h3>-->
                    <!--                <span class="badge badge-soft-primary mr-1"> +89% </span> <span class="text-muted">This Month</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- end row -->

                    <!-- end row-->

                    <div class="row">
                       

                        <div class="col-lg">
                             <div class="card card-animate">
                                <div class="card-body">

                                    <h4 class="card-title d-inline-block">All Shipment </h4>

                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <!--<th>No</th>-->
                                                    <th>Tracking ID</th>
                                                    <th>Sender</th>
                                                    <th>Description</th>
                                                    <th>Date Created</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                        <?php
     
     $sql="Select * from `shipment`";
     $result=mysqli_query($conn,$sql);
     if($result){
         while($row=mysqli_fetch_assoc($result)){
             $id=$row['id'];
             $user_id=$row['user_id'];
             $sendername=$row['sendername'];
             $email=$row['senderemail'];
             $packagedescription=$row['packagedescription'];
             $date=$row['date'];
             echo '<tr>
          <td>'.$user_id.'</td>
          <td>'.$sendername.'</td>
          <td>'.$packagedescription.'</td>
          <td>'.$date.'</td>
     <td>  
            <div class="dropdown position-relative">
            <a href="#" class="dropdown-toggle h4 text-muted" data-toggle="dropdown" aria-expanded="false">
             <i class="mdi mdi-dots-vertical"></i>
            </a>
          <ul class="dropdown-menu dropdown-menu-left">
        <li><a href="view_details.php?updateid='.$id.'&trackid='.$user_id.'" class="dropdown-item">View Information</a></li>
        <li><a href="track_details.php?trackid='.$user_id.'&email='.$email.'" class="dropdown-item">Add tracking information</a></li>
        <li ><a href="delete.php?deleteid='.$id.'&trackid='.$user_id.'" onclick="return checkdelete()" class="dropdown-item" >Delete</a></li>
                                                            
        </ul>
    </div> 
   </td>

        </tr>';
         }
     }
     
      
      
     ?> 
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div>
                    <!-- end row-->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2023 © Elite International Freight & Cargo Limited
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Admin panel
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>

 <script>
       function checkdelete(){
           return confirm('Are you sure you want to delete this Shipment ?');
       }
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- Morris Js-->
    <script src="../plugins/morris-js/morris.min.js"></script>
    <!-- Raphael Js-->
    <script src="../plugins/raphael/raphael.min.js"></script>

    <!-- Morris Custom Js-->
    <script src="assets/pages/dashboard-demo.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>

</html>