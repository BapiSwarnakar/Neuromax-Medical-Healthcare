<?php
require_once("../../db_connect/db_connect.php");
require_once("../../class/class.php");
$server= new Main_Classes;
$server->admin_session_private();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Multi Step Form css -->
 <!--   <link rel="stylesheet" href="dist/css/multiform.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Select2 -->
  <link rel="stylesheet" href="../../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- daterange picker -->
  <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- Notepad View -->
  <link rel="stylesheet" href="../../assets/plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- parsley validation -->
  <link rel="stylesheet" href="../../assets/plugins/parsley-folder/parsley.css">
  <!-- Toast -->
  <link rel="stylesheet" href="../../assets/plugins/Toast/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light shadow-lg">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-sign-out-alt"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a class="nav-link" href="logout.php" role="button" title="Logout" onclick="return confirm('You are sure Logout Profile !');"><i class="fas fa-sign-out-alt"></i>Logout</a>
        <div class="dropdown-divider"></div>
        <a class="nav-link" href="change_password.php" role="button" title="Change Password"><i class="fas fa-lock-open"></i>Change Password</a>
      </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="dashboard.php" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <!--  <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Patient
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_patient.php" class="nav-link" id="add_department">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display_patient.php" class="nav-link" id="display_department">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display Patient</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Department
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_department.php" class="nav-link" id="add_department">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display_department.php" class="nav-link" id="display_department">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display Department</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Doctor Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_doctor.php" class="nav-link" id="add_category">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Doctor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display_doctor.php" class="nav-link" id="display_doctor">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display Doctor</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Doctor Profile Image
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="doctor_profile_image.php" class="nav-link" id="doctor_profile_image">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Profile Image</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display_profile_image.php" class="nav-link" id="display_profile_image">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display Profile Image</p>
                </a>
              </li>
             
            </ul>
          </li>
          
          <!-- Exit Category Master -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Doctor Appointment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="doctor_appointment.php" class="nav-link"id="doctor_appointment">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Appointment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display_appointment.php" class="nav-link" id="display_appointment">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Display Appointment</p>
                </a>
              </li>
            </ul>
          </li>
          <!--Exit Sub Category Master -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                 Appointment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all_appointment.php" class="nav-link" id="all_appointment">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recieved Appointment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="confirm_appointment.php" class="nav-link" id="confirm_appointment">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Confirm Appointment</p>
                </a>
              </li>
            </ul>
          </li>
          <!--Exit Brand Master -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Payment Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="payment_details.php" class="nav-link" id="payment_details">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Report</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Patients Success Checkup
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all_success_patient.php" class="nav-link" id="all_success_patient">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Success Patient Checkup
                    </p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="all_cancel_patient.php" class="nav-link" id="all_cancel_patient">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Cancel Patient Checkup
                    </p>
                </a>
              </li>
              
            </ul>
          </li>
          <!--Exit Item Master -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Opening Hour
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="opening_hour.php" class="nav-link" id="opening_hour">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Add/Update Opening hour
                    </p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="display_opening_hour.php" class="nav-link" id="display_opening_hour">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Display Opening hour
                    </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_blog.php" class="nav-link" id="add_blog">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Add Blog
                    </p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="display_blog.php" class="nav-link" id="display_news">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Display Blog
                    </p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Gallery
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_images.php" class="nav-link" id="add_image">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Add Images
                    </p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="display_image.php" class="nav-link" id="display_image">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Display Font Images
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="display_sub_image.php" class="nav-link" id="display_sub_image">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Display Sub Images
                    </p>
                </a>
              </li>
              
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Feedback
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="display_feedback.php" class="nav-link" id="display_feedback">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Display Feedback
                    </p>
                  </a>
              </li> 
            </ul>
          </li>
         
       
          <li class="nav-header">Help</li>
          <li class="nav-item">
            <a href="help_request.php" class="nav-link" id="help_request">
              <i class="nav-icon far fa-image"></i>
              <p>
                Help Request
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>