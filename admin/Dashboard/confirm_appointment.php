<?php
require_once("header.php");
?>
<style type="text/css">
  #confirm_appointment{
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
            <h1>Confirm Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">View Confirm Appointment</li>
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
                <h3 class="card-title"> Confirm Appointment List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="spinner-border text-primary" role="status" id="load">
                  <span class="sr-only">Loading...</span>
                </div>
                <form id="filter_confirm_form">
                <div  class="form-row">

                  <div class="form-group">
                    <label>From
                    <input type="date" name="from_date_c" id="from_date_c" class="form-control form-control-sm"  value="<?php echo date("Y-m-d"); ?>"></label>
                  </div>&nbsp;
                  <div class="form-group">
                    <label>To
                    <input type="date" name="to_date_c" id="to_date_c" class="form-control form-control-sm"  value="<?php echo date("Y-m-d"); ?>"></label>
                  </div>&nbsp;
                  <div class="form-group">
                    <br/>
                    <input type="submit" name="filter_con" id="filter_con" value="Filter" class="btn btn-info btn-sm">
                    <input type="reset" name="reset" id="reset" value="Reload" class="btn btn-danger btn-sm" onclick="location.reload()">
                  </div>&nbsp;&nbsp;
                  <div class="form-group">
                    <br/>
                    <input type="button" name="excel_downlode_btn_con" id="excel_downlode_btn_con" class="btn btn-success btn-sm" value="Export for Excel">
                  </div>
                    
                </div>
                </form>
                <div>
                  <input type="search" name="myInput" id="myInput" class="form-control form-control-sm" placeholder="Search Doctor Name or Patient Mobile No..">
                </div>
                <br/>
               <table id="recieved_confirm_app" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>
                    <th><input type="checkbox" name="select_all_con" id="select_all_con"><label for="select_all_con">All</label></th>
                    <th>Sl. No</th>
                    <th>Doctor</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Day</th>
                    <th>Shift</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Appointment Date</th>
                    <th>Booking Date</th>
                    <th>Payment</th>
                    <th>visit/not visit</th>
                  </tr>
                  </thead>
                  <tbody id="data_Confirm">
                  
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
 require_once("script/recieve_appointment_master.php");
 ?>