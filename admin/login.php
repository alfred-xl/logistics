<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
   
    
    $sql="Select * from `admin` where
    email='$email' and password='$password'";
    
    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
        //   echo "login Successful";
        $login=1;
        session_start();
        $_SESSION['email']=$email;
        header('location:index.php');
    
        
        }else{
            // echo "invalid credentials";
            $invalid=1;
        }
    
  }
} 

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Elite admin</title>
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

<body class="bg-primary">

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block my-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5">
                                     <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-4 mt-3">
                                                <a href="">
                                                    <span><img src="assets/images/logo-dark.png" alt="" width="150px"></span>
                                                </a>
                                            </div>
                                            <form class="p-2" method="post">
                                                <div class="form-group">
                                                    <label for="emailaddress">Email address</label>
                                                    <input class="form-control" type="email" id="emailaddress" required="" placeholder="admin@email.com" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="password">
                                                </div>
            
                                                <!--<div class="form-group mb-4 pb-3">-->
                                                <!--    <div class="custom-control custom-checkbox checkbox-primary">-->
                                                <!--        <input type="checkbox" class="custom-control-input" id="checkbox-signin">-->
                                                <!--        <label class="custom-control-label" for="checkbox-signin">Remember me</label>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit"> Sign In </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
            
                                    <!--<div class="row mt-4">-->
                                    <!--    <div class="col-sm-12 text-center">-->
                                    <!--        <p class="text-white-50 mb-0">Create an account? <a href="pages-register.html" class="text-white-50 ml-1"><b>Sign Up</b></a></p>-->
                                    <!--    </div>-->
                                    <!--</div>-->
            
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

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