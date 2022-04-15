<?php
require_once("header.php");
?>
<style type="text/css">
  #all_appointment{
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
            <h1>All SignUp Patient</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">All SignUp Patient</li>
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
                <h3 class="card-title"> All SignUp Patient List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="spinner-border text-primary" role="status" id="load">
                  <span class="sr-only">Loading...</span>
                </div>


                <form id="filter_form">
                <div  class="form-row">

                  <div class="form-group">
                    <label>From
                    <input type="date" name="from_date" id="from_date" class="form-control form-control-sm"  value="<?php echo date("Y-m-d"); ?>"></label>
                  </div>&nbsp;
                  <div class="form-group">
                    <label>To
                    <input type="date" name="to_date" id="to_date" class="form-control form-control-sm"  value="<?php echo date("Y-m-d"); ?>"></label>
                  </div>&nbsp;
                  <div class="form-group">
                    <br/>
                    <input type="submit" name="filter" id="filter" value="Filter" class="btn btn-info btn-sm">
                    <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-danger btn-sm" onclick="location.reload()">
                  </div>&nbsp;&nbsp;
                  <div class="form-group">
                    <br/>
                    <input type="button" name="excel_downlode_btn" id="excel_downlode_btn" class="btn btn-success btn-sm" value="Export for Excel">
                  </div>
                    
                </div>
                </form>
                <div>
                  <input type="search" name="myInput1" id="myInput1" class="form-control form-control-sm" placeholder="Search Mobile No..">
                </div>

                <br/>
               <table id="recieved_app" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>
                    <th><input type="checkbox" name="select_all" id="select_all"><label for="select_all">All</label></th>
                    <th>Sl. No</th>
                    <th>Patient Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Registration date</th>
                    <!-- <th>View/Action</th> -->
                  </tr>
                  </thead>
                  <tbody id="data_">
                  
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

  <!-- Modal -->
<!-- <div class="modal fade" id="Confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="changes_appointment_form">
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
               <label class="font-weight-bold">Select Day :*</label>
               <select class="form-control form-control-sm" name="day" id="day" data-doc_id="" required>
                 
               </select>
            </div>
            <div class="form-group col-md-12">
               <label class="font-weight-bold">Select Shift :*</label>
               <select class="form-control form-control-sm" name="shift" id="shift" data-doc_id="" data-day="" required>
                 
               </select>
            </div>
            <div class="form-group col-md-12">
               <label class="font-weight-bold">Select Time :*</label>
               <select class="form-control form-control-sm" name="time" id="time" data-doc_id="" required>
                 
               </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="page" value="Change_form_Submit">
        <input type="hidden" name="action" value="Change_form_Submit">
        <input type="hidden" name="order_id" value="" id="order_id">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div> -->
 <?php
 require_once("footer.php");
 require_once("script/patient_master.php");
 ?>