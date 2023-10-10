<?php 
include 'PHPMailer/contactmail.php'

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
<title>Get in Touch with Elite - Your Global Shipping Partner for Fast and Reliable Service</title>
  <meta name="description" content="Contact Elite International Freight & Cargo Limited for fast and reliable global shipping services. Fill out our online form or call us today.">
    <meta name="keywords" content="Freight services, Air freight, sea freight, UK logistics, US logistics, Nigeria logistics, land freight, cargo shipping, international logistics, global freight solutions, freight forwarding, express shipping, logistics, warehousing and storage, customs clearance, supply chain management, freight forwarding companies, transportation and logistics, logistics near me, logistics companies near me, transport near me, top logistics companies, best logistics company, Elite, EIFC, eifcltd" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7cPoppins:400,600,700">
  <link rel="stylesheet" href="assets/css/libraries.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <div class="wrapper">
    <!-- =========================
        Header
    =========================== -->
    <header id="header" class="header header-transparent">
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container">
          <a class="navbar-brand" href="index">
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
                  <a href="track-shipment" class="nav__item-link">Track</a>
                  </li>
                  <li class="nav__item">
                    <a href="prohibited" class="nav__item-link">Prohibited Items</a>
                    </li>
              <li class="nav__item">
                <a href="contact" class="nav__item-link active">Contacts</a>
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
            <h1 class="pagetitle__heading">Contact Us</h1>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ==========================
        contact 3
    =========================== -->
    <section id="contact3" class="contact contact-3 text-center">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-50">
              <span class="heading__subtitle">Our Locations</span>
              <h2 class="heading__title">Contact Us</h2>
              <p class="heading__desc">Get in touch with Elite easily using our user-friendly contact form. Our team is ready to assist you with any inquiries!</p>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <?php
// session_start();

if (isset($_SESSION['message'])) {
    $alertMessage = $_SESSION['message'];
    unset($_SESSION['message']);
}

if (isset($_GET['alert'])) {
    $alertMessage = isset($alertMessage) ? $alertMessage : 'Message sent successfully';
    echo '<div class="alert alert-submit" role="alert">' . $alertMessage . '</div>';
    echo '<script>alert(`' . htmlspecialchars($alertMessage) . '`);</script>';
    echo '<script>history.replaceState({}, document.title, window.location.pathname);</script>';
}

if (isset($alertMessage) && !isset($_GET['alert'])) {
    echo '<div class="alert alert-submit" role="alert">' . $alertMessage . '</div>';
}
?>

        <div class="row">
          <diqv class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <form method="post">
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group"><input type="text" class="form-control" placeholder="Name" name="name"></div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group"><input type="email" class="form-control" placeholder="Email" name="email"></div>
                </div><!-- /.col-lg-6 -->
              </div><!-- /.row -->
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group"><input type="text" class="form-control" placeholder="Phone" name="phone"></div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group"><input type="text" class="form-control" placeholder="Subject" name="subject"></div>
                </div><!-- /.col-lg-6 -->
              </div><!-- /.row -->
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Request Details"name="details"></textarea>
                  </div>
                </div><!-- /.col-lg-12 -->
              </div><!-- /.row -->
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                  <button type="submit" class="btn btn__secondary btn__hover3 btn__block" name="submit">Submit Request</button>
                </div><!-- /.col-lg-12 -->
              </div><!-- /.row -->
            </form>
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact 3 -->

    <!-- ==========================
       Contact 2
    ============================ -->
    <section id="contact2" class="contact contact-2 text-center pt-0 pb-80">
      <div class="container">
        <div class="row">
          <!-- Contact panel #1 -->
          <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="contact-panel">
              <div class="contact__panel-header">
                <div class="contact__panel-icon">
                  <img src="assets/images/flags/uk.png" alt="us">
                </div><!-- /.contact-panel-icon -->
                <h4 class="contact__panel-title">United Kingdom</h4>
              </div><!-- /.contact-panel-header -->
              <ul class="contact__list list-unstyled">
                <li>Tel: <a href="tel:02477673230">02477673230</a></li>
                <li>Email: <a href="mailto:info@eifcltd.com">info@eifcltd.com</a></li>
                <li>Address: Unit 12, Napier Street, Coventry CV1 5PR.</li>
              </ul><!-- /.contact-list -->
              <a href="tel:02477673230" class="btn btn__primary btn__hover3">
                <span>Contact Us</span><i class="icon-arrow-right"></i>
              </a>
            </div><!-- /.contact-panel -->
          </div><!-- /.col-lg-4 -->
          <!-- Contact panel #2 -->
          <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="contact-panel">
              <div class="contact__panel-header">
                <div class="contact__panel-icon">
                  <img src="assets/images/flags/n.png" alt="germany">
                </div><!-- /.contact-panel-icon -->
                <h4 class="contact__panel-title">Lagos Island</h4>
              </div><!-- /.contact-panel-header -->
              <ul class="contact__list list-unstyled">
                <li>Tel: <a href="tel:08137128317">08137128317</a></li>
                <li>Email: <a href="mailto:info@eifcltd.com">info@eifcltd.com</a></li>
                <li>Address: Plot 1B, Bunmi Olowude Street, Oniru Maruwa B/stop, Lekki, Lagos.</li>
              </ul><!-- /.contact-list -->
              <a href="tel:08137128317" class="btn btn__primary btn__hover3">
                <span>Contact Us</span><i class="icon-arrow-right"></i>
              </a>
            </div><!-- /.contact-panel -->
          </div><!-- /.col-lg-4 -->
          <!-- Contact panel #3 -->
          <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="contact-panel">
              <div class="contact__panel-header">
                <div class="contact__panel-icon">
                  <img src="assets/images/flags/n.png" alt="canada">
                </div><!-- /.contact-panel-icon -->
                <h4 class="contact__panel-title">Lagos Mainland</h4>
              </div><!-- /.contact-panel-header -->
              <ul class="contact__list list-unstyled">
                <li>Tel: <a href="tel:08137128317">08137128317</a></li>
                <li>Email: <a href="mailto:info@eifcltd.com">info@eifcltd.com</a></li>
                <li>Address: 8, Lateef Salami Street, God's Glory Plaza, Ajao Estate, Lagos.</li>
              </ul><!-- /.contact-list -->
              <a href="tel:08137128317" class="btn btn__primary btn__hover3">
                <span>Contact Us</span><i class="icon-arrow-right"></i>
              </a>
            </div><!-- /.contact-panel -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Contact 2 -->

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