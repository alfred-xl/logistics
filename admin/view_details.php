<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
}


 include 'connect.php';
 $id=$_GET["updateid"];
 $sql="select * from `shipment` where id=$id";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($result);
 $sendername=$row['sendername'];
 $senderemail=$row['senderemail'];
 $senderaddress=$row['senderaddress'];
 $senderphone=$row['senderphone'];
 $sendercountry=$row['sendercountry'];
 $sendercity=$row['sendercity'];
 $senderzip=$row['senderzip'];
 $recievername=$row['recievername'];
 $recieveremail=$row['recieveremail'];
 $recieveraddress=$row['recieveraddress'];
 $recieverphone=$row['recieverphone'];
 $recievercountry=$row['recievercountry'];
 $recievercity=$row['recievercity'];
 $recieverzip=$row['recieverzip'];
 $packagedescription=$row['packagedescription'];
 $packagestatus=$row['packagestatus'];
 
 
     

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Update Shipment</title>
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
                        <img src="assets/images/logo-dark.png" />
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
                                <h4 class="mb-0 font-size-18">View information</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active">View Information</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-xl-12">
                        <div class="card">
                           <div class="card-body">
                               <h4 class="card-title">View information </h4>
                               <table class="table table-bordered">
    <thead>
      <tr>
        <th colspan="2">Sender Information</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Name</td>
        <td><?php echo $sendername;?></td>
      </tr>
      <tr>
        <td>Email Address</td>
        <td><?php echo $senderemail;?></td>
      </tr>
      <tr>
        <td>Phone</td>
        <td><?php echo $senderphone?></td>
      </tr>
       <tr>
        <td>Address</td>
        <td><?php echo $senderaddress?></td>
      </tr>
       <tr>
        <td>Country</td>
        <td><?php echo $sendercountry?></td>
      </tr>
       <tr>
        <td>City</td>
        <td><?php echo $sendercity?></td>
      </tr>
       <tr>
        <td>Zip code</td>
        <td><?php echo $senderzip?></td>
      </tr>
       <tr>
       <th colspan="2">Reciever Information</th>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo $recievername;?></td>
      </tr>
      <tr>
        <td>Email Address</td>
        <td><?php echo $recieveremail;?></td>
      </tr>
      <tr>
        <td>Phone</td>
        <td><?php echo $recieverphone?></td>
      </tr>
       <tr>
        <td>Address</td>
        <td><?php echo $recieveraddress?></td>
      </tr>
       <tr>
        <td>Country</td>
        <td><?php echo $recievercountry?></td>
      </tr>
       <tr>
        <td>City</td>
        <td><?php echo $recievercity?></td>
      </tr>
       <tr>
        <td>Zip code</td>
        <td><?php echo $recieverzip?></td>
      </tr>
     <tr>
        <td>Package Description</td>
        <td><?php echo $packagedescription?></td>
      </tr>
    </tbody>
  </table>
  
 <h4 class="card-title">Tracking information</h4>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Description</th>
      <th>Status</th>
      <th>Time & Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($_GET['trackid']))
    {
        $track_id = $_GET['trackid'];
        $query = "SELECT * FROM package_info WHERE track_id='$track_id'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
    ?>
    <tr>
      <td><?= $row['information']; ?></td>
      <td><?= $row['packagestatus']; ?></td>
      <td><?= $row['date']; ?></td>
    </tr>
    <?php
            }
        }
        else
        {
            echo '<tr>
                    <td colspan="3">
                      <div class="alert alert-warning text-center mb-45">
                        No tracking information available for this package at the moment.
                      </div>
                    </td>
                  </tr>';
        }
    }
    ?>
  </tbody>
</table>

                           </div>
                           <!-- end card-body-->
                       
                           </div> <!-- end card-body-->
                       </div> <!-- end card-->

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