<?php
define('MY_SITE',true);
require_once("landing_header.php");
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
    .Department_Doctor:hover{
       color: red;
       /*background: #014a81;*/
    }

    .logo_img_doc1
    {
        text-align: right;
    } 
    .text_doc1
    {
        text-align: left;
    }
    .text_doc{
        text-align: right;
    }

    @media (max-width: 768px)
    {
        .logo_img_doc{
            text-align: center;
            margin-top: 5px;
            
        }
        .text_doc{

            text-align: center;
        }
        .logo_img_doc1
        {
            text-align: center;
        }
        .text_doc1
        {
            text-align: center;
        }
        .right_list{
            margin-top: 10px;
        }
        
    }
</style>

    <!-- ################# Slider Starts Here#######################--->
    <div class="slider">
        <!-- Set up your HTML -->
        <div class="owl-carousel ">
           
            <div class="item">
                <div class="slider-img"><img src="landing_assets/images/slider/slider-2.jpg" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                            <div class="slider-captions">
                                <h1 class="slider-title">It's time for better help.</h1>
                                <p class="slider-text hidden-xs">We can help you conquer a wide range of psychological and emotional problems.</p>
                                <!-- <a href="#" class="btn btn-primary hidden-xs">Schedule A Visit</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="item">
                <div class="slider-img"> <img src="landing_assets/images/slider/slider-3.jpg" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                            <div class="slider-captions">
                                <h1 class="slider-title">Meet our psychiatrists</h1>
                                <p class="slider-text hidden-xs">Our psychiatrists are highly skilled to meet your unique needs.</p>
                                <a href="#" class="btn btn-primary hidden-xs">Meet Psychiatrists</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>


    <!--*************** Key Features Starts Here ***************-->

    <div id="features" class="features container-fluid">
        <div class="container">
            <div class="session-title">
                <h2 style="font-family: 'Josefin Sans', sans-serif;">WELCOME TO NEUROMAX HEALTHCARE SERVICES</h2>
                <p class="text-justify" style="font-family: 'Josefin Sans', sans-serif; margin-top: 5%;" id="1">
                <?php
                echo $server->Read_More(35,"We are a comprehensive pdychiatric, neurological and neurometabolic clinic. We treat the brain and try to treat the whole of it. And  the brain controls the whole body. Function of every organ system, all metabolism and all aspects of homeostasis is dependent on brain function. So every neurological symptom has a corresponding psychiatric symptom and converse is  frequently true too. And both the symptoms are reflected by ba changed metabolic system of the body. We aim to fix this whole  process holistically..","1");
                ?>
               </p>
            </div>
            <div class="ker-featur-row row">
                <div data-aos="fade-right" data-aos-duration="1500" class="col-md-4 featurecol">
                    <!-- <div class="single-feature">

                        <div class="detail">
                            <h6>100% Safety</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Voluptatem, inventore</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-bell"></i>
                        </div>


                    </div> -->
                   <!--  <div class="single-feature">

                        <div class="detail">
                            <h6>Friendly Doctors</h6>
                            <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit.
                                Voluptatem, inventore</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-heart"></i>
                        </div>
                    </div> -->
                    <!-- <div class="single-feature">

                        <div class="detail">
                            <h6>100% Safety</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Voluptatem, inventore</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-bell"></i>
                        </div>


                    </div> -->
                    <!-- <div class="single-feature">

                        <div class="detail">
                            <h6>100% Safety</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Voluptatem, inventore</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-bell"></i>
                        </div>


                    </div> -->

                    <?php
                    echo $server->All_Department_Left('0','4');
                    ?>

                </div>
                <div class="col-md-4 featur-image">
                    <!-- landing_assets/images/boct.jpg -->
                    <img src="landing_assets/images/boct.jpg" alt="">
                    <a href="javascript:void(0)" class="btn btn-info mt-3" id="Opening_Hour">Opening Hours</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="javascript:void(0)" id="Need_Help_Button" class="btn btn-danger mt-3">Need Help ?</a>
                </div>
                <div data-aos="fade-left" data-aos-duration="1500" class="col-md-4 featurecol">

                    <!-- <div class="single-feature">
                        <div class="icon">
                            <i class="far fa-images"></i>
                        </div>
                        <div class="detail">
                            <h6>Clean Environment</h6>
                            <p>Lorem ipsum dolor sit amet, consec tetur adipi sicing elit.
                                Voluptatem, inventore</p>
                        </div>
                    </div> -->
<!--                     <div class="single-feature">
                        <div class="icon">
                            <i class="fab fa-audible"></i>
                        </div>
                        <div class="detail">
                            <h6>Medical Research</h6>
                            <p>Lorem ipsum dolor sit amet, conse ctetur adipisicing elit.
                                Voluptatem, inventore</p>
                        </div>
                    </div> -->
                   <!--  <div class="single-feature">
                        <div class="icon">
                            <i class="far fa-images"></i>
                        </div>
                        <div class="detail">
                            <h6>Clean Environment</h6>
                            <p>Lorem ipsum dolor sit amet, consec tetur adipi sicing elit.
                                Voluptatem, inventore</p>
                        </div>
                    </div> -->
                    <!-- <div class="single-feature">
                        <div class="icon">
                            <i class="far fa-images"></i>
                        </div>
                        <div class="detail">
                            <h6>Clean Environment</h6>
                            <p>Lorem ipsum dolor sit amet, consec tetur adipi sicing elit.
                                Voluptatem, inventore</p>
                        </div>
                    </div> -->
                    <?php
                    echo $server->All_Department_Right('4','8');
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!--*************** Our Services Starts Here ***************-->


    <!-- <section class="our-service container-fluid">
        <div class="container">
            <div class="session-title row">
                <h2>Our Services</h2>
                <p>Not the answer you're looking for? Printing and typesetting inLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s Lorem</p>
            </div>
            <div class="col-sm-12 blog-cont">
                <div class="row no-margin"> -->
                    <!-- <div class="col-lg-4 col-md-6 blog-smk">
                        <div class="blog-single">

                            <img src="landing_assets/images/services/service-1.jpg" alt="">

                            <div class="blog-single-det">

                                <h6>Deperssion</h6>

                                <a href="blog_single.html">
                                    <button class="btn btn-primary ">More Detail</button>
                                </a>
                            </div>
                        </div>
                    </div> -->
                   <!--  <div class="col-lg-4 col-md-6 blog-smk">
                        <div class="blog-single">

                            <img src="landing_assets/images/services/service-2.jpg" alt="">

                            <div class="blog-single-det">

                                <h6>Anxity</h6>

                                <a href="blog_single.html">
                                    <button class="btn btn-primary ">More Detail</button>
                                </a>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-4 col-md-6 blog-smk">
                        <div class="blog-single">

                            <img src="landing_assets/images/services/service-3.jpg" alt="">

                            <div class="blog-single-det">

                                <h6>Relationship Issue</h6>

                                <a href="blog_single.html">
                                    <button class="btn btn-primary">More Detail</button>
                                </a>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-4 col-md-6 blog-smk">
                        <div class="blog-single">

                            <img src="landing_assets/images/services/s1.jpg" alt="">

                            <div class="blog-single-det">

                                <h6>Relationship Issue</h6>

                                <a href="blog_single.html">
                                    <button class="btn btn-primary">More Detail</button>
                                </a>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-4 col-md-6 blog-smk">
                        <div class="blog-single">

                            <img src="landing_assets/images/services/s2.jpg" alt="">

                            <div class="blog-single-det">

                                <h6>Paediatric Issue</h6>

                                <a href="blog_single.html">
                                    <button class="btn btn-primary">More Detail</button>
                                </a>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-4 col-md-6 blog-smk">
                        <div class="blog-single">

                            <img src="landing_assets/images/services/service-2.jpg" alt="">

                            <div class="blog-single-det">

                                <h6>Neurology Issue</h6>

                                <a href="blog_single.html">
                                    <button class="btn btn-primary">More Detail</button>
                                </a>
                            </div>
                        </div>
                    </div> -->
             <!--       
                </div>
            </div>

        </div>
    </section> -->
     


    <!--*************** About Us Starts Here ***************-->

    <div class="about-us container">
        <div class="row">
            <div class="col-md-6 join-us-content">

                <div class="bkgloq">
                    <div class="row content-title">
                        <h4>About US</h4>

                    </div>
                    <p>We are a comprehensive pdychiatric, neurological and neurometabolic clinic. We treat the brain and try to treat the whole of it. And the brain controls the whole body. Function of every organ system, all metabolism and all aspects of homeostasis is dependent on brain function. So every neurological symptom has a corresponding psychiatric symptom and converse is frequently true too. And both the symptoms are reflected by ba changed metabolic system of the body. We aim to fix this whole process holistically</p>
                </div>

            </div>
            <div class="col-md-6 no-padding d-flex justify-content-center">
                <img src="assets/img/banner/1.jpg" alt="" class="img-fluid" style="width: 306px;">
            </div>
        </div>
    </div>

    <!--  *************************Our Team Start Here ************************** -->
   <br>
    <section id="testimonials" class="testimonials">
      <div class="container scroll" data-aos="fade-up">

        <div class="section-title text-center">
          <h2 style="font-family: 'Josefin Sans', sans-serif;">WHAT OUR PATIENTS SAY</h2>
          <p style="font-family: 'Josefin Sans', sans-serif;">Thanks to well-designed patient feedback surveys and processes, you can identify gaps in patient care and improve quality of care, increase patient engagement and retention. Ask for specific patient feedback. Take feedback from patients on everything: Appointment scheduling. </p>
          <br>
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

    <!-- <section id="admin" class="admin">
      <div class="container" data-aos="fade-up">

        <div class="section-title text-center">
          <h2 style="font-family: 'Josefin Sans', sans-serif;">ADMIN’S STATEMENT</h2>
          <p style="font-family: 'Josefin Sans', sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <br>
        <div class="row p-5" style="background-color: #004a80;">
          <p class="text-justify text-light" style="font-family: 'Josefin Sans', sans-serif;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <br>

        

      </div>
    </section> --><!-- End Admin Section -->
    <!-- <section id="admin" class="admin">
      <div class="container-fluied" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Josefin Sans', sans-serif;" class="text-uppercase text-center">Location Map</h2>
        </div>
        <div class="row">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d471218.38560188503!2d88.04952746944409!3d22.676385755547646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1612783627540!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
      <br>
    </section> -->

    <!-- End Admin Section -->

   <!--  <div class="our-team">
        <div class="container">

           
            <div class="session-title row">
                <h2>Our Team</h2>
                <p>Not the answer you're looking for? Printing and typesetting inLorem Ipsum </p>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="card-1 team-member">
                        <img src="landing_assets/images/team/t1.jpg" alt="Team Member 1">

                        <p><b>Dr.Siva Kumar</b> <br> (CEO & Chairman)</p>
                        <ul class="row">
                            <li><i class="fab fa-facebook-f"></i></li>
                            <li><i class="fab fa-twitter"></i></li>
                            <li><i class="fab fa-linkedin-in"></i></li>
                            <li><i class="fab fa-google-plus-g"></i></li>
                            <li><i class="fab fa-pinterest-p"></i></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card-1 team-member">
                        <img src="landing_assets/images/team/t2.jpg" alt="Team Member 1">

                        <p><b>Dr. Mathue Samuel</b> <br> (Chief Doctor)</p>
                        <ul class="row">
                            <li><i class="fab fa-facebook-f"></i></li>
                            <li><i class="fab fa-twitter"></i></li>
                            <li><i class="fab fa-linkedin-in"></i></li>
                            <li><i class="fab fa-google-plus-g"></i></li>
                            <li><i class="fab fa-pinterest-p"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card-1 team-member">
                        <img src="landing_assets/images/team/t3.jpg" alt="Team Member 1">

                        <p><b>Samuani Simi</b> <br> (Chief Doctor)</p>
                        <ul class="row">
                            <li><i class="fab fa-facebook-f"></i></li>
                            <li><i class="fab fa-twitter"></i></li>
                            <li><i class="fab fa-linkedin-in"></i></li>
                            <li><i class="fab fa-google-plus-g"></i></li>
                            <li><i class="fab fa-pinterest-p"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card-1 team-member">
                        <img src="landing_assets/images/team/t4.jpg" alt="Team Member 1">

                        <p><b>Niuise Paule</b> <br> (Chief Doctor)</p>
                        <ul class="row">
                            <li><i class="fab fa-facebook-f"></i></li>
                            <li><i class="fab fa-twitter"></i></li>
                            <li><i class="fab fa-linkedin-in"></i></li>
                            <li><i class="fab fa-google-plus-g"></i></li>
                            <li><i class="fab fa-pinterest-p"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div> -->

    <!-- ######## Our Team End ####### -->
    
    
    <!--*************** Our Blog Starts Here ***************-->
                     
   <!--  <div id="blog" class="container-fluid blog">
        <div class="container">
             <div class="session-title">
                <h2>Our Blog</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin nisi id consequat bibendum. Phasellus at convallis elit. In purus enim, scelerisque id arcu vitae</p>
            </div>
                <div class="blog-row row">
                    <div class="col-lg-4 col-md-6 ">
                       <div class="blog-col">
                            <img src="landing_assets/images/services/s1.jpg" alt="">
                            <span>August 9, 2019</span>
                            <h4>Orci varius consectetur adipiscing natoque penatibus</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent accumsan, leo in venenatis dictum, </p>
                       </div>
                       
                    </div>
                     <div class="col-lg-4 col-md-6">
                       <div class="blog-col">
                            <img src="landing_assets/images/services/s2.jpg" alt="">
                            <span>August 9, 2019</span>
                            <h4>Orci varius consectetur adipiscing natoque penatibus</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent accumsan, leo in venenatis dictum, </p>
                       </div>
                       
                    </div>
                     <div class="col-lg-4 col-md-6 ">
                       <div class="blog-col">
                            <img src="landing_assets/images/services/service-1.jpg" alt="">
                            <span>August 9, 2019</span>
                            <h4>Orci varius consectetur adipiscing natoque penatibus</h4>
                            <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent accumsan, leo in venenatis dictum, </p>
                       </div>
                       
                    </div>
                     
            </div>
        </div>
        
    </div>   -->
    





<?php
require_once("landing_footer.php");
?>