<?php
require_once("header.php");
?>
<style type="text/css">
  #all_cancel_patient{
    background-color: white;
    color: black;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Cancel Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">View Cancel Appointment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Cancel Appointment List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <!--  <div class="spinner-border text-primary" role="status" id="load">
                  <span class="sr-only">Loading...</span>
                </div> -->
               <table id="cancel_app" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl. No</th>
                    <th>Doctor</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Day</th>
                    <th>Shift</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody id="data_cancel">
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 require_once("footer.php");
 require_once("script/cancel_appointment_master.php");
 ?>