
<?php
if(!defined('MY_SITE'))
{
  die("Access Denied");
}
require_once("db_connect/db_connect.php");
require_once("class/class.php");
$server = new Main_Classes;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Neuromax</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/c053c2db77.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/plugins/parsley-folder/parsley.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/Toast/toastr.min.css">

  <!-- =======================================================
  * Template Name: Arsha - v2.3.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
 <!--  <link rel="stylesheet" href="dist/css/adminlte.min.css"> -->
  <!-- Multi Step Form css -->
 <!--   <link rel="stylesheet" href="dist/css/multiform.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700" rel="stylesheet">
<!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100&display=swap" rel="stylesheet"> -->
<!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,900;1,100&display=swap" rel="stylesheet"> -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,900;1,100;1,900&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- View Box -->
  <link rel="stylesheet" href="viewbox-master/viewbox.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style type="text/css">
    #logo_nav{
      display: none;
    }

    @media (max-width: 768px){

      #logo_nav{
        display: block;
      }
    }
  </style>
</head>

<body>
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex header_links">
      <div class="contact-info mr-auto">
        <div class="logo">
          <a href="index.php"><img src="assets/img/banner/logo3.png"></a>
        </div>
           
      </div>
      <div class="social-links">
        
       <!--  <i class="icofont-envelope"></i><a href="mailto:connect@adosys.in" style="color: white;">connect@adosys.in</a>&nbsp;&nbsp; -->
       <i class="fa fa-calendar text-dark" aria-hidden="true"></i><a href="find_doctor.php">Book Appointment &nbsp;|&nbsp;</a>
        <i class="icofont-phone text-dark"></i><a href="tel:9330694126">+919330694126</a>
        
      </div>
    </div>
  </div>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages shadow">
    <div class="container d-flex align-items-center">


      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.html" class="logo mr-auto" id="logo_nav"><img src="assets/img/banner/logo1.png" width="110px" height="40px" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
         <!--  <li><a href="#services">FACILITIES</a></li> -->
          <li class="drop-down"><a href="">News & Gallery</a>
            <ul style="background-color: #014a81;">
              <li><a href="blog_details.php">Blog</a></li>
              <!-- <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
              <li><a href="our_gallery.php">Gallery</a></li>
              <!-- <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> -->
            </ul>
          </li>
           <!-- <li><a href="news_gallery.php">NEWS & GALLERY</a></li> -->
           <li><a href="contact.php">Contact</a></li>
          <!--  <li><a href="find_doctor.php">Find a doctor</a></li> -->
           <li><a href="feedback.php">Feedback</a></li>

        </ul>
      </nav><!-- .nav-menu -->
       <a href="find_doctor.php" class="get-started-btn scrollto text-dark">Appointment</a>
    </div>
  </header><!-- End Header -->