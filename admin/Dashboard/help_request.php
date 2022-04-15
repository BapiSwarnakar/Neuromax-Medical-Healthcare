<?php
require_once("header.php");
?>
<style type="text/css">
	#help_request{
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
            <h1>All Doctor Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">View Appointment</li>
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
                <h3 class="card-title">Appointment List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <table id="help_list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl. No</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Time</th>
                    <th>View/Action</th>
                  </tr>
                  </thead>
                  <tbody id="data">
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
<div class="modal fade" id="Need_Help_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="help">Send Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Need_Help_Form">      
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label class="font-weight-bold">Email :*</label>
            <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Valid Email" required>
          </div>
          <div class="form-group col-md-12">
            <label class="font-weight-bold">Description :*</label>
            <textarea class="form-control form-control-sm" name="desc" placeholder="Description" maxlength="200" minlength="5" required></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="action" value="Need_help_Request">
        <input type="hidden" name="page" value="Need_help_Request">
        <input type="submit" name="submit" class="btn btn-primary btn-sm" id="help_btn" value="Send Request">
      </div>
    </form>
    </div>
  </div>
</div>
 <?php
 require_once("footer.php");
 require_once("script/need_help.php");
 ?>