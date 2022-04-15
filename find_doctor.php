<?php
define('MY_SITE',true);
require_once("landing_header.php");
?>
<style type="text/css">
  #mobile{
    display: none;
  }
  @media (max-width: 768px){
    #desktop{
      display: none;
    }
    #mobile{
    display: block;
    }
     #mobile .fa-whatsapp{
         font-size: 25px;
     }
  }
</style>
<style type="text/css">
  .page_click:focus{
    background-color: green;
    color: white;
  }
</style>
<br>
 <main id="main" style="margin-top: 12%;">
<div class="wrapper">
<div class="content-wrapper">
 <section class="content" id="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
          	 <div class="col-md-3">
          	 	<div class="row d-flex align-items-stretch">
          	 	<div class="col-lg-12 col-sm-12 col-md-12">

               <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Search/Filter
                </div>
                <div class="card-body pt-0">
                <form method="post" id="Search_form">
                  <div class="form-row">
                    <div class="form-group col-md-8">
                      <input type="text" name="Search_field" class="form-control form-control-sm" placeholder="Search Doctor Name" required>
                      <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                    </div>
                    <!-- <div class="form-group col-md-4">
                      
                      
                    </div> -->
                   <!--  <div class="form-group col-sm">
                       <button type="submit" name="submit"><i class="fas fa-search"></i></button>
                    </div> -->
                      
                    
                    
                  	
                  
                  <!-- <div class="form-group col-md-2">
                  	<button type="submit" name="submit" class="form-control form-control-sm"><i class="fas fa-search"></i></button>
                  </div> -->

                  <div class="form-group col-md-12">
                  	<select class="form-control form-control-sm" id="Specialist">
                  		<?php
                  		  echo $server->All_specialist_Search();
                  		?>
                  	</select>
                  </div>
                  <!--  <div class="form-group col-md-12">
                  	<select class="form-control form-control-sm">
                  		<option value="">Price</option>
                  		<option value="Test">Free</option>
                  		<option value="Test">100-250</option>
                  		<option value="Test">250-350</option>
                  		<option value="Test">350-500</option>
                  	</select>
                  </div> -->
                  <!-- <div class="form-group col-md-2">
                  	<input type="submit" name="submit" class="form-control form-control-sm" value="Search">
                  </div> -->

                 </div>
                </form>
                  	 
                  
                </div>
                
              </div>
            </div>
          	</div>
          	 </div>
          	 <div class="col-md-8">
          	 	<!--  -->
          	 	<div class="d-flex justify-content-center">
          	 		<div class="spinner-grow text-primary" role="status" id="wait">
					  <span class="sr-only">Loading...</span>
					</div>
          	    </div>

              <!--  -->
          	 	<div class="row d-flex align-items-stretch" id="data">


            <!--  -->



          	 	</div>
          	 </div>
          	<!--  -->
            

          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0" id="pagination">
             <!-- Pagination -->
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="Appointment_Details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #014a81;">
        <h5 class="modal-title text-light" id="exampleModalLongTitle" >Appointment Details</h5>
        <button type="button" class="close bg-light text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 300px;overflow-y: scroll;">
        <h5 id="doc_name"></h5>
         <table class="table table-bordered" id="App_Details">

           

         </table>
      </div>
    </div>
  </div>
</div>
</main>
<br>
<?php
require_once("landing_footer.php");
require_once("script/ajax_find_doctor.php");
?>