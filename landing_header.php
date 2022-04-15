<?php
if(!defined('MY_SITE'))
{
  die("Access Denied");
}
require_once("db_connect/db_connect.php");
require_once("class/class.php");
$server = new Main_Classes;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Neuromax Healthcare</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="landing_assets/images/fav.jpg">
    <link rel="stylesheet" href="landing_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="landing_assets/css/all.min.css">
    <link rel="stylesheet" href="landing_assets/css/animate.css">
    <link rel="stylesheet" href="landing_assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="landing_assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css ">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="landing_assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/parsley-folder/parsley.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/Toast/toastr.min.css">
    <style type="text/css">
  .icon-bar-side {
  position: fixed;
  top: 50%;
  right: 0;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.icon-bar-side a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar-side a:hover {
  background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}


@media (max-width: 768px)
{
  .icon-bar-side {
  /*margin-top: 82%;
  margin-right:0%;*/
  
  margin:300px 65px; 

  position: fixed;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  }
  .icon-bar-side a {
    display: inline;
    text-align: center;
    padding: 10px 25px;
    transition: all 0.3s ease;
    color: white;
    font-size: 20px;
  }
}

/*.content {
  margin-left: 75px;
  font-size: 30px;
}*/

.doc_logo {
    border: 4px solid #004a80;
    padding: 5px;
  }

#menu-jk{
  margin-top: 5px;
}

@media (max-width: 768px)
{
  #menu-jk{
  margin-top: -12px;
  }
}
</style>
</head>

<body>
    <header class="container-fluid">
        <div class="container">
            <div class="row top-row">
                <div class="col-md-4 logo">
                    <img src="assets/img/banner/logo3.png" alt="" style="width: 120px; margin-top: -10px;">
                    <a data-toggle="collapse" data-target="#menu-jk" href="#menu-jk"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                </div>
                <div class="col-md-8 navse">
                    <div class="row">
                        <div class="col-lg-4 d-none d-lg-block cinfo">
                            <div class="cdetl">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="detail">
                                    <b>Location</b>
                                    <p> 8, FERN PLACE, KOLKATA</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 d-none d-md-block cinfo">
                            <div class="cdetl">
                                <div class="icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="detail">
                                    <b>Email</b>
                                    <p><a href="mailto:neuromaxhealthcare@gmail.com"> neuromaxhealthcare@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 d-none d-md-block cinfo">
                            <div class="cdetl">
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="detail">
                                    <b>Call Us</b>
                                    <p><a href="tel:+919330694126">+919330694126</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="menu-jk" class="nav-sectionmk  row" style="margin-top: 5px;">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <!-- <li class="dropdown">
                        <a href="javascript:void(0)" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">News & Gallery</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a href="blog_details.php" class="text-dark"> Blog</a></li>
                            <li><a href="our_gallery.php" class="text-dark"> Gallery</a></li>
                        </ul>
                        
                    </li> -->
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                    <li><a href="our_gallery.php"> Gallery</a></li>
                    <li class="aply">
                        <a href="find_doctor.php"><button class="btn btn-sm btn-light get-started-btn">Appointment</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
