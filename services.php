<?php
define('MY_SITE',true);
require_once("landing_header.php");
?>
    <!--*************** Key Features Starts Here ***************-->
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
<br>
    <div id="features" class="features container-fluid" style="margin-top: 8%;">
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

<?php
require_once("landing_footer.php");
?>