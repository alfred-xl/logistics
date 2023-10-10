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
 
  if(isset($_POST['submit'])){
     $sendername=$_POST['sendername'];
     $senderemail=$_POST['senderemail'];
     $senderaddress=$_POST['senderaddress'];
     $senderphone=$_POST['senderphone'];
     $sendercountry=$_POST['sendercountry'];
     $sendercity=$_POST['sendercity'];
     $senderzip=$_POST['senderzip'];
     $recievername=$_POST['recievername'];
     $recieveremail=$_POST['recieveremail'];
     $recieveraddress=$_POST['recieveraddress'];
     $recieverphone=$_POST['recieverphone'];
     $recievercountry=$_POST['recievercountry'];
     $recievercity=$_POST['recievercity'];
     $recieverzip=$_POST['recieverzip'];
     $packagedescription=$_POST['packagedescription'];
     $packagestatus=$_POST['packagestatus'];
     
      $sql="update `shipment` set id=$id,
      sendername='$sendername',senderemail='$senderemail',senderaddress='$senderaddress',senderphone='$senderphone',senderzip='$senderzip',sendercountry='$sendercountry',sendercity='$sendercity',recievername='$recievername',recieveremail='$recieveremail',recieveraddress='$recieveraddress',recieverphone='$recieverphone',recieverzip='$recieverzip',recievercountry='$recievercountry',recievercity='$recievercity',packagedescription='$packagedescription',packagestatus='$packagestatus' where id=$id";
     $result=mysqli_query($conn,$sql);
     if($result){
        //  echo "updated successfully";
         header('location:index.php');
     }else{
         die(mysqli_error($conn));
     }
      
      
  }
     

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
                            <a href="index.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="create-shipment.php" class="waves-effect"><i class='bx bx-add-to-queue'></i><span>Create Shipment</span></a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="update-shipment.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Update Shipment</span></a>-->
                        <!--</li>-->
                                                <li>
                            <a href="support.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Chat Support</span></a>
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
                                <h4 class="mb-0 font-size-18">Update Shipment</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                        <li class="breadcrumb-item active">Update Shipment</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-xl-12">
                        <div class="card">
                           <div class="card-body">
                               <h4 class="card-title">Sender Information </h4>

                               <form method="post">
                                 <div class="form-group">
                                       <label for="name">Name</label>
                                       <input type="text" id="name" class="form-control" placeholder=" Sender Name" name="sendername"  value="<?php echo $sendername;?>">
                                   </div>
                              <div class="form-group">
                                       <label for="exampleFormControlInput1">Email address</label>
                                       <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="senderemail" value="<?php echo $senderemail;?>">
                                   </div>
                                   <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" class="form-control" placeholder="Phone" name="senderphone" value="<?php echo $senderphone;?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control" placeholder="Address" name="senderaddress" value="<?php echo $senderaddress;?>">
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" id="country" class="form-control" placeholder="country" name="sendercountry" value="<?php echo $sendercountry;?>">
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city" class="form-control" placeholder="City" name="sendercity" value="<?php echo $sendercity;?>">
                                </div>
                                <div class="form-group">
                                    <label for="zip">Zip code</label>
                                    <input type="text" id="zip" class="form-control" placeholder="zip code" name="senderzip" value="<?php echo $senderzip;?>">
                                </div>
                                
                                <h4 class="card-title pt-4">Reciever Information </h4>
                                
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" placeholder=" Reciever Name" name="recievername" value="<?php echo $recievername;?>">
                                </div>
                           <div class="form-group">
                                    <label for="exampleFormControlInput1">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="recieveremail" value="<?php echo $recieveremail;?>">
                                </div>
                                <div class="form-group">
                                 <label for="phone">Phone</label>
                                 <input type="text" id="phone" class="form-control" placeholder="Phone" name="recieverphone" value="<?php echo $recieverphone;?>">
                             </div>
                             <div class="form-group">
                                 <label for="address">Address</label>
                                 <input type="text" id="address" class="form-control" placeholder="Address" name="recieveraddress" value="<?php echo $recieveraddress;?>">
                             </div>
                             <div class="form-group">
                                 <label for="country">Country</label>
                                 <input type="text" id="country" class="form-control" placeholder="country" name="recievercountry" value="<?php echo $recievercountry;?>">
                             </div>
                             <div class="form-group">
                                 <label for="city">City</label>
                                 <input type="text" id="city" class="form-control" placeholder="City" name="recievercity" value="<?php echo $recievercity;?>">
                             </div>
                             <div class="form-group">
                                 <label for="zip">Zip code</label>
                                 <input type="text" id="zip" class="form-control" placeholder="zip code" name="recieverzip" value="<?php echo $recieverzip;?>">
                             </div>
                                
                                   <div class="form-group">
                                       <label for="exampleFormControlTextarea1">Package Description</label>
                                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"n name="packagedescription"><?php echo $packagedescription; ?></textarea>
                                   </div>
                                   
                             <div class="form-group">
                             <label for="select">Package Status: <?php echo $packagestatus;?></label>
                            <select class="form-control" id="exampleFormControlSelect1" name="packagestatus" value="<?php echo $packagestatus;?>">
                                <option>Select Package Status</option>
                                    <option value="processing">Procesing</option>
                                    <option value="completed">Completed</option>
                                    <option value="onhold">Onhold</option>
                                    <option value="cancelled">Canceled</option>
                                    <option value="pending">Pending</option>
                            </select>
                              </div>
                                   
                                   <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Update Shipment </button>
                               </form>
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