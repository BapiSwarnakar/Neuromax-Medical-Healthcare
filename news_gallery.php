<?php
define('MY_SITE',true);
require_once("header.php");
?>  
   <section id="services" class="services section-bg mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Myriad Pro';">Update News</h2>
          <p style="font-family: 'Myriad Pro';">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
        </div>
         <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <div class="" data-aos="fade-right" data-aos-delay="100">
           <marquee width="100%" direction="up" height="200px" onmouseover="this.stop();" onmouseout="this.start();" style = "background-color: #D8D8D4; padding: 10px;">
             <?php
              echo $server->All_Update_News();
             ?>
           </marquee>
          </div>
        </div>
          
      </div>
       

      </div>
    </section><!-- End News Section -->  
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Myriad Pro';">Our Gallery</h2>
          <!-- <p style="font-family: 'Myriad Pro';">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p> -->
        </div>
       
         <?php
           echo $server->All_Gallery_Images();
         ?>
                
      
        
       

      </div>
    </section><!-- End Services Section -->
<!-- Modal -->
<div class="modal fade" id="News_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="News_Title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" id="news_body">
          

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
require_once("footer.php");
require_once("script/ajax_index_page.php");
?>