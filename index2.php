<?php
define('MY_SITE',true);
require_once("header.php");
if(!empty($_GET['code']))
{
  ?>
    <script type="text/javascript">
          swal("Thank you", "Your Email Verify Successfully", "success");
    </script>
  <?php
}
?>
<style type="text/css">
  /*.left{
    background-color: red;
    padding: 15px;
    background-color: yellow;
    width: 50px;
    height: 300px;
    padding: 15px;
    position: relative;
  }*/
  .doctor{
   
    width: 500px;
    height: 550px;
    margin-top: -25px;
   
  }
</style>
<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-aos="fade-up">

      <!-- <ol class="carousel-indicators" id="hero-carousel-indicators"></ol> -->
      <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/banner/banner.jpg)">
          <div class="container">
            <h2 class="text-danger" style="font-family: 'Josefin Sans', sans-serif;">Welcome to <span>Neuromax</span></h2>
            <p class="text-dark" id="4" style="font-family: 'Josefin Sans', sans-serif; font-size: 18px;">
            <?php
            echo $server->Read_More(35,"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur.","4");

            ?>
            </p>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/banner/banner.jpg)">
          <div class="container">
            <h2 class="text-danger" style="font-family: 'Josefin Sans', sans-serif;">Feelings are not facts</h2>
            <p class="text-dark" id="3" style="font-family: 'Josefin Sans', sans-serif; font-size: 18px;">
            <?php
            echo $server->Read_More(35,"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur.","3");

            ?>
            </p>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/banner/banner.jpg)">
          <div class="container">
            <h2 class="text-danger" style="font-family: 'Josefin Sans', sans-serif;">Welcome to <span>Neuromax</span></h2>
            <p class="text-dark" id="2" style="font-family: 'Josefin Sans', sans-serif; font-size: 18px;">
            <?php
            echo $server->Read_More(35,"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur.","2");

            ?>
            </p>
            <!-- <a href="#about" class="btn-get-started scrollto">Read More</a> -->
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

     <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-5 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <div class="left"></div>
            <img src="assets/img/banner/1.jpg" class="img-fluid" alt="">
            <div class="right"></div>
          </div>
          <div class="col-lg-7 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h4 style="font-family: 'Josefin Sans', sans-serif;">WELCOME TO NEUROMAX HEALTHCARE SERVICES</h4><br/>
             <a href="javascript:void(0)" class="btn btn-info" id="Opening_Hour">Opening Hours</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <a href="javascript:void(0)" id="Need_Help_Button">Need Help ?</a>

            
            <p class="text-justify" style="font-family: 'Josefin Sans', sans-serif; margin-top: 5%;" id="1">
            <?php

            echo $server->Read_More(35,"We are a comprehensive pdychiatric, neurological and neurometabolic clinic. We treat the brain and try to treat the whole of it. And  the brain controls the whole body. Function of every organ system, all metabolism and all aspects of homeostasis is dependent on brain function. So every neurological symptom has a corresponding psychiatric symptom and converse is  frequently true too. And both the symptoms are reflected by ba changed metabolic system of the body. We aim to fix this whole  process holistically","1");
            ?>
           </p>
           <!-- <button type="submit" class="btn btn-danger btn-sm">Read more</button> -->
          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->
     <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Josefin Sans', sans-serif;">Our Facilities</h2>
          <p style="font-family: 'Josefin Sans', sans-serif;">A health facility is, in general, any location where healthcare is provided. Health facilities range from small clinics and doctor's offices to urgent care centers and large hospitals with elaborate emergency rooms and trauma centers. The number and quality of health facilities in a country or region is one common measure of that area's prosperity and quality of life. In many countries, health facilities are regulated to some extent by law; licensing by a regulatory agency is often required before a facility may open for business. Health facilities may be owned and operated by for-profit businesses, non-profit organizations, governments, and in some cases by individuals, with proportions varying by country.</p>
        </div>
         <div class="row">
         <!--  <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/banner/dep.jpg" class="img-fluid doctor shadow" alt="">
          </div> -->
          <div class="col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            
                
            <?php
              echo  $server->All_Department();
            ?>
                
          </div>
        </div>
       

      </div>
    </section><!-- End Services Section -->
       <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container scroll" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Josefin Sans', sans-serif;">WHAT OUR PATIENTS SAY</h2>
          <p style="font-family: 'Josefin Sans', sans-serif;">Thanks to well-designed patient feedback surveys and processes, you can identify gaps in patient care and improve quality of care, increase patient engagement and retention. Ask for specific patient feedback. Take feedback from patients on everything: Appointment scheduling. </p>
        </div>

        <div class="owl-carousel testimonials-carousel">

         <?php
           echo $server->All_Patient_Feedback();
         ?>
          <!-- <div class="testimonial-item" style="background-color: #004a80;">
            <img src="assets/img/banner/patient.jpg" class="testimonial-img" alt="">
            <h3 class="text-light">ANIRBAN PAUL</h3>
            <p class="text-justify"> 
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore.
            </p>
          </div> -->


         

          
          

          

        </div>

      </div>
    </section><!-- End Testimonials Section -->
      <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">
<!--         <div class="text-center">
          <h3>Call To Action</h3>
          <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a class="cta-btn" href="#">Call To Action</a>
        </div> -->
      </div>
    </section><!-- End Cta Section -->
         <!-- ======= Admin Section ======= -->
    <section id="admin" class="admin">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Josefin Sans', sans-serif;">ADMIN’S STATEMENT</h2>
          <p style="font-family: 'Josefin Sans', sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="row p-5" style="background-color: #004a80;">
          <p class="text-justify text-light" style="font-family: 'Josefin Sans', sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        

      </div>
    </section><!-- End Admin Section -->
    
  </main><!-- End #main -->
<section id="admin" class="admin">
      <div class="container-fluied" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Josefin Sans', sans-serif;">Location Map</h2>
        </div>
        <div class="row">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d471218.38560188503!2d88.04952746944409!3d22.676385755547646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1612783627540!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </section><!-- End Admin Section -->

<!-- Modal -->
<div class="modal fade" id="Doc_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" id="data">
          

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Need_Help" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="help">Need Help</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Need_Help_Form">      
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label class="font-weight-bold">Email :*</label>
            <input type="email" name="email" class="form-control form-control-sm" placeholder="Valid Email" required>
          </div>
          <div class="form-group col-md-12">
            <label class="font-weight-bold">Description :*</label>
            <textarea class="form-control form-control-sm" name="desc" placeholder="Description" maxlength="200" minlength="5" required></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="action" value="Need_help_Model">
        <input type="hidden" name="page" value="Need_help_Model">
        <input type="submit" name="submit" class="btn btn-primary btn-sm" id="help_btn" value="Send Request">
      </div>
    </form>
    </div>
  </div>
</div>

<?php
require_once("footer.php");
require_once("script/ajax_index_page.php");
?>
