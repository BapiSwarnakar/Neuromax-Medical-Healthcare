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
<br>
<div class="main" style="margin-top: 12%;">
	
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Josefin Sans', sans-serif; text-align: center;">Update Blog</h2>
          <p style="font-family: 'Josefin Sans', sans-serif; text-align: center;">All blog entries by Neuromax Healthcare</p>
        </div>
        <br>
         <div class="row">
          <div class="col-md-8" id="Show_blog">
            <div id="load" class="d-flex justify-content-center"></div>
            
           

        </div>

        <div class="col-md-4">
          <div data-aos="fade-right" data-aos-delay="100">
              <div class="card  bg-light">
              	<div class="card-header text-muted border-bottom-0">
              		Search/Filter
              	</div>
              	<div class="card-body">
              		<form id="blog_search">
              			<div class="form-row">
              				<div class="form-group col-md-12 col-sm-12">
              					<label>Month By</label>
              					<input type="month" id="month" name="month" class="form-control form-control-sm" required>
              				</div>
              				<div class="form-group col-md-12 col-sm-12">
              					<label>Published By</label>
              					<select class="form-control form-control-sm" id="doctor" name="doctor" required>
              						<option value="">Select</option>
                          <?php
                             echo $server->All_Doctor_Blog();
                          ?>
              					</select>
              				</div>
              			</div>
              		</form>
              	</div>
              	<div class="card-footer">
              		<label>Neuromax Healthcare</label>
              	</div>
              </div>
          </div>
        </div>
          
      </div>
       

      </div>
    </section><!-- End News Section -->  

</div>
<br>

<?php
require_once("landing_footer.php");
require_once("script/ajax_blog_master.php");
?>