<?php
define('MY_SITE',true);
require_once("landing_header.php");
?>  
<br>
   <section id="services" class="services section-bg" style="margin-top: 12%;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Josefin Sans', sans-serif; text-align: center;">Our Gallery</h2>
          <p style="font-family: 'Josefin Sans', sans-serif;text-align: center;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
        </div>
        <br>
         <div class="row">

          <?php
            echo $server->All_Image_Show_Gallery_Page();
          ?>


          
  </div>
       

</div>
</section>

<!-- Modal -->
<div class="modal fade" id="zoom_Mdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="d-flex justify-content-end">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <!--   <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-dismiss="modal">close</a> -->
      </div>
      <div class="modal-body">

        <div class="row d-flex justify-content-center"  id="zoom_Data">

         <!--  -->
          
      </div>

      </div>
      
    </div>
  </div>
</div>
<br>

<?php
require_once("landing_footer.php");
require_once("script/ajax_index_page.php");
?>