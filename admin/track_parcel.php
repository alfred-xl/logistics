<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
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
    <title>Create Shipment</title>
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

         <!--========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div class="navbar-brand-box">
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo-dark.png" />
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                     <!--Left Menu Start -->
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
                 <!--Sidebar -->
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
                            <!--<a class="dropdown-item d-flex align-items-center justify-content-between"-->
                            <!--    href="javascript:void(0)">-->
                            <!--    <span>Inbox</span>-->
                            <!--    <span>-->
                            <!--        <span class="badge badge-pill badge-soft-primary">3</span>-->
                            <!--    </span>-->
                            <!--</a>-->
                            <!--<a class="dropdown-item d-flex align-items-center justify-content-between"-->
                            <!--    href="javascript:void(0)">-->
                            <!--    <span>Profile</span>-->
                            <!--    <span>-->
                            <!--        <span class="badge badge-pill badge-soft-danger">1</span>-->
                            <!--    </span>-->
                            <!--</a>-->
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
                                <h4 class="mb-0 font-size-18">Add Shipment</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                        <li class="breadcrumb-item active">Add Shipment</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-xl-12">
                        <div class="card">
                           <div class="card-body">
                               <h4 class="card-title">Track Parcel</h4>

                               <form method="GET">
                                   <div class="form-group">
                                       <label for="name">Tracking ID</label>
                                      <input type="text" name="track_id" value="<?php if(isset($_GET['track_id'])){echo $_GET['track_id'];} ?>" class="form-control">
                                   </div>
                                   <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Track</button>
                               </form>
                           </div>
                           <!-- end card-body-->
                       
                           </div> <!-- end card-body-->
                       </div> <!-- end card-->
                       <?php


if (isset($_SESSION['message'])) { 
  // Display an alert with the message
   echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';

  // Clear the session variable
  unset($_SESSION['message']);
}
?>
                        <div class="col-sm-4">
                  
                       
                       <?php
                      if(isset($_GET['track_id']))
                      {
                          $track_id=$_GET['track_id'];
                        //   $id=$_GET['track_id'];
                          
                          $query= "SELECT * FROM package_info WHERE track_id='$track_id'";
                          $query_run=mysqli_query($conn,$query);
                          
                          if(mysqli_num_rows($query_run) > 0)
                          {
                              foreach($query_run as $row)
                              {
                                  // echo $row['name'];
                    ?>
                     <div class="card card-body">
                         <?php
                         if($row['packagestatus']=="completed"){
                             echo'
                              <button type="button"
                                            class="btn btn-sm btn-success btn-rounded waves-effect waves-light mb-2" style="width: fit-content;">'.$row['packagestatus'].'</button>
                             
                             ';
                             
                         }elseif($row['packagestatus']=="processing" || $row['packagestatus']=="in transit"){
                             echo'
                              <button type="button"
                                            class="btn btn-sm btn-warning btn-rounded waves-effect waves-light mb-2" style="width: fit-content;">'.$row['packagestatus'].'</button>
                             
                             ';
                             
                         }else{
                             echo'
                              <button type="button"
                                            class="btn btn-sm btn-danger btn-rounded waves-effect waves-light mb-2" style="width: fit-content;">'.$row['packagestatus'].'</button>
                             ';
                         }
                         ?>
                         
                                    <h5 class="card-title"><?= $row['track_id']; ?></h5>
                                   
                                    <p class="card-text"><?= $row['information']; ?>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted"><?= $row['date']; ?></small>
                                    </p>
                                     <a href="delete_info.php?deleteid=<?= $row['id']; ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                </div>
                                <?php
                                  
                              }
                          }
                          else
                          {
                              echo "no record found";
                          }
                      }
                      
                    ?>
                            </div>
                   </div> <!-- end col -->

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


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>

</html>