<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y26CJEWP92"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Y26CJEWP92');
</script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="assets/images/favicon/favicon.png" rel="icon">
<title>Track Your Shipment in Real-Time with Elite's Online Tracking System</title>
  <meta name="description" content="Stay in the know with Elite's real-time online tracking system for global shipments. Get updates and monitor your shipment's progress." />
    <meta name="keywords" content="Freight services, Air freight, sea freight, UK logistics, US logistics, Nigeria logistics, land freight, cargo shipping, international logistics, global freight solutions, freight forwarding, express shipping, logistics, warehousing and storage, customs clearance, supply chain management, freight forwarding companies, transportation and logistics, logistics near me, logistics companies near me, transport near me, top logistics companies, best logistics company, Elite, EIFC, eifcltd" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7cPoppins:400,600,700">
  <link rel="stylesheet" href="assets/css/libraries.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
     .alert-warning{
         background:red;
     }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- =========================
        Header
    =========================== -->
    <header id="header" class="header header-transparent">
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img src="assets/images/logo/logo-light.png" class="logo-light" alt="logo">
            <img src="assets/images/logo/logo-dark.png" class="logo-dark" alt="logo">
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav ml-auto">
              <li class="nav__item">
                <a href="index" class="nav__item-link">Home</a>
              </li>
              <li class="nav__item">
                <a href="about-us" class="nav__item-link">About Us</a>
              </li>
              <li class="nav__item">
                <a href="services" class="nav__item-link">Services</a>
                </li>
                <li class="nav__item">
                  <a href="request-collection" class="nav__item-link">Request Collection</a>
                  </li>
                  <li class="nav__item">
                  <a href="track-shipment" class="nav__item-link active">Track</a>
                  </li>
                  <li class="nav__item">
                    <a href="prohibited" class="nav__item-link">Prohibited Items</a>
                    </li>
              <li class="nav__item">
                <a href="contact" class="nav__item-link">Contacts</a>
              </li><!-- /.nav-item -->
            </ul><!-- /.navbar-nav -->
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav><!-- /.navabr -->
    </header><!-- /.Header -->

    <!-- ========================
       page title 
    =========================== -->
    <section id="page-title" class="page-title bg-overlay bg-parallax">
      <div class="bg-img"><img src="assets/images/page-titles/1.png" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <h1 class="pagetitle__heading">Track Package</h1>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
       Track Shipmeent
    ========================= -->
    <section id="trackShipmeent" class="track-shipmeent pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-4">
            <aside class="sidebar mb-30">
              <div class="widget widget-help bg-overlay bg-overlay-grdient-secondary">
                <div class="bg-img"><img src="assets/images/sidebar/1.jpg" alt="background"></div>
                <div class="widget__content">
                  <h5>How Can <br> We Help You!</h5>
                  <p>We understand the importance approaching each work integrally and believe in the power of simple
                    and easy communication.</p>
                  <a href="contacs.html" class="btn btn__primary btn__hover2 btn__block">Contact us Today!</a>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-help -->

            </aside><!-- /.sidebar -->
          </div><!-- /.col-lg-4 -->
          <div class="col-sm-12 col-md-12 col-lg-8">
           <form method="GET" class="tracking-id-form">
              <div class="row mb-30">
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <p class="fz-16 mb-45">Track your package with ease using Elite's online tracking form. Stay up-to-date on your shipment's progress!</p>
                </div><!-- /.col-lg-12 -->
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <label>Tracking Number</label>
                    <div class="form-group">
                     <input type="text" name="track_id" value="<?php if(isset($_GET['track_id'])){echo $_GET['track_id'];} ?>" class="form-control">
                     <?php
if (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0') {
    unset($_GET['track_id']);
}
?>
                    </div>
                  </div>
                </div><!-- /.col-lg-12 -->
              </div><!-- /.row -->
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <button type="submit" class="btn btn__secondary btn__block">Track & Trace</button>
                </div><!-- /.col-lg-12 -->
              </div><!-- /.row -->
            </form>
          </div><!-- /.col-lg-8 -->
          
          
           

           <div class="container mt-4">
        <div class="row">
                <?php
                      if(isset($_GET['track_id']))
                      {
                          $track_id=$_GET['track_id'];
                          
                          $query= "SELECT * FROM package_info WHERE track_id='$track_id'";
                          $query_run=mysqli_query($conn,$query);
                          
                          if(mysqli_num_rows($query_run) > 0)
                          {
                              foreach($query_run as $row)
                              {
                                  // echo $row['name'];
                    ?>
                    
                    <div class="col-sm-12 col-md-12 col-lg-4">
            <div style="box-shadow: 0px 2px 8px 5px #E2E2E2;" class="card-body mb-20">
                  <?php
                         if($row['packagestatus']=="completed"){
                             echo'
                              <button type="button"
                                            class="btn-success btn-rounded mb-10" style="width: fit-content; border-radius:5px; padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px">'.$row['packagestatus'].'</button>
                             
                             ';
                             
                         }elseif($row['packagestatus']=="processing" || $row['packagestatus']=="in transit"){
                             echo'
                              <button type="button"
                                            class="btn-warning btn-rounded mb-10" style="width: fit-content; border-radius:5px; padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px">'.$row['packagestatus'].'</button>
                             
                             ';
                             
                         }elseif($row['packagestatus']=="cancelled"){
                             echo'
                              <button type="button"
                                            class="btn-danger btn-rounded mb-10" style="width: fit-content; border-radius:5px; padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px">'.$row['packagestatus'].'</button>
                             ';
                         }
                         ?>
                                    <h5 style="color:#106cae" class="card-title"><?= $row['track_id']; ?></h5>

                                    <p class="card-text"><?= $row['information']; ?></p>
                                    <h6 style="font-size: 13px" class="card-text"><?= $row['date']; ?>
                                    </h6>
                    </div>
                    </div>
                  <?php
                                  
                              }
                          }
                          
                          else
                          {
                              echo '<div class="alert alert-warning text-center mb-45">
                    No tracking information available for this package at the moment.</div>';
                          }
                        
                      }
                      
                    ?>
                 </div>   
             </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Track Shipmeent -->


    <!-- ========================
          Footer
        ========================== -->
    <footer id="footer" class="footer">
      <div class="footer-newsletter">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
              <div class="footer__newsletter-text">
                <h6>Let's get social</h6>
                <p>Connect with us on our social platform to stay updated.</p>
              </div><!-- /.footer-newsletter-text -->
            </div><!-- /.col-xl-3-->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <div class="social__icons justify-content-end">
                <a href="https://www.facebook.com/profile.php?id=100092527569409&mibextid=LQQJ4d"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="https://instagram.com/elitecourierltd?igshid=YmMyMTA2M2Y="><i class="fa fa-instagram"></i></a>
              </div><!-- /.social-icons -->
            </div><!-- /.col-xl-2 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div>
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 footer__widget footer__widget-about">
              <div class="footer__widget-content">
                <img src="assets/images/logo/logo-small.png" alt="logo" class="footer-logo">
                <p>At Elite International Freight & Cargo Limited, we believe in delivering your shipments quickly and efficiently,
                   without compromising on quality. Our team is dedicated to providing fast and reliable delivery services, ensuring your shipments arrive on time, every time.</p>
                <ul class="contact__list list-unstyled">
                  <li><b>Email: </b><a href="mailto:info@eifcltd.com">info@eifcltd.com</a></li>
                </ul>
              </div>
            </div><!-- /.col-lg-4 -->
            <div class="col-6 col-sm-6 col-md-3 col-lg-2 footer__widget footer__widget-nav">
              <h6 class="footer__widget-title">Quick Links</h6>
              <div class="footer__widget-content">
                <nav>
                  <ul class="list-unstyled">
                    <li><a href="index">Home</a></li>
                    <li><a href="about-us">About Us</a></li>
                    <li><a href="services">Services</a></li>
                    <li><a href="track-shipment">Track</a></li>
                    <li><a href="prohibited">Prohibited Items</a></li>
                    <li><a href="request-collection">Request Collection</a></li>
                    <li><a href="contact">Contacts</a></li>
                    
                  </ul>
                </nav>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-lg-2 -->
            <div class="col-6 col-sm-6 col-md-3 col-lg-2 footer__widget footer__widget-nav">
              <h6 class="footer__widget-title">UK Head Office</h6>
              <div class="footer__widget-content">
                <ul class="contact__list list-unstyled">
                  <li><span>Unit 12, Napier Street, Coventry CV1 5PR.</span></li>
                  <li><b>Tel: </b><a href="tel:02477673230">02477673230</a></li>
                  <li><b>Mobile: </b><a href="tel:07886278676">07886278676</a></li>
                </ul>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-lg-2 -->
            <div class="col-6 col-sm-6 col-md-3 col-lg-2 footer__widget footer__widget-nav">
              <h6 class="footer__widget-title">Nigeria Office</h6>
              <div class="footer__widget-content">
                <ul class="contact__list list-unstyled">
                  <li><b>Island </b><br><span>Plot 1B, Bunmi Olowude Street, Oniru Maruwa B/stop, Lekki, Lagos.</span></li>
                  <li><b>Mainland </b><br><span>8, Lateef Salami Street, God's Glory Plaza, Ajao Estate, Lagos.</span></li>
                  <li><b>Tel: </b><a href="tel:08137128317">08137128317</a></li>
                </ul>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-lg-2 -->
            <div class="col-6 col-sm-6 col-md-3 col-lg-2 footer__widget footer__widget-nav">
            <h6 class="footer__widget-title">Download Our App</h6>
              <div class="footer__widget-content">
                <a href="https://play.google.com/store/apps/details?id=com.elite_freight233.app"><img style="padding-bottom: 10px" src="assets/images/logo/and.png" alt="Google PlayStore"></a>
                <a href="https://apps.apple.com/app/elite-freight-cargo-ltd/id6458590409"><img style="padding-bottom: 10px" src="assets/images/logo/ios.png" alt="Apple Store"></a>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-lg-2 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-top -->
      <div class="footer-bottom">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="footer__copyright">
                <span>&copy; 2023 Elite International Freight & Cargo Ltd, All right Reserved.</span>
              </div><!-- /.Footer-copyright -->
            </div><!-- /.col-lg-6 -->
            <div class="col-sm-12 col-md-6 col-lg-6">
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.Footer-bottom -->
    </footer><!-- /.Footer -->

    <div class="module__search-container">
      <i class="fa fa-times close-search"></i>
      <form class="module__search-form">
        <input type="text" class="search__input" placeholder="Type Words Then Enter">
        <button class="module__search-btn"><i class="fa fa-search"></i></button>
      </form>
    </div><!-- /.module-search-container -->

  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
</body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6456a5686a9aad4bc5794911/1gvp7c92l';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</html>