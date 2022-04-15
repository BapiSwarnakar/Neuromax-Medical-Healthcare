<?php
require_once("header.php");
?>
<style type="text/css">
	#add_blog{
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
            <h1>Add Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid col-md-12">
        <div class="row">
          <!-- left column -->
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="new_form">
                <div class="card-body">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                    <label for="Category">Blog Header :*</label>
                    <input type="text" name="title" placeholder="News Title" class="form-control form-control-sm" required autocomplete="off">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="Category">Published By :*</label>
                    <select class="form-control form-control-sm" name="doc_id" required>
                      <option value="">Select</option>
                      <?php
                        echo $server->All_Doctor();
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                     <label class="font-weight-bold">Description :*</label>
                      <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required minlength="50" maxlength="1000"></textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
      </div>
                  
      </div>
    </div>
    <div class="card-footer">
       <div class="form-group d-flex justify-content-end">
          <input type="hidden" name="page" value="news_form_submit">
          <input type="hidden" name="action" value="news_form_submit">
          <input type="submit" class="btn btn-primary btn-sm" value="Submit" id="news_btn">
        </div>
      </div>
                <!-- /.card-body -->
              
     </form>
  </div>
            <!-- /.card -->
</div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 require_once("footer.php");
 require_once("script/blog_master.php");
 ?>