<?php
if(!defined('MY_SITE'))
{
  die("Access Denied");
}
?>
<style type="text/css">
  .icon-bar-side {
  position: fixed;
  top: 50%;
  right: 0;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.icon-bar-side a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar-side a:hover {
  background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}


@media (max-width: 768px)
{
  .icon-bar-side {
  /*margin-top: 82%;
  margin-right:0%;*/
  
  margin:300px 65px; 

  position: fixed;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  }
  .icon-bar-side a {
    display: inline;
    text-align: center;
    padding: 10px 25px;
    transition: all 0.3s ease;
    color: white;
    font-size: 20px;
  }
}

/*.content {
  margin-left: 75px;
  font-size: 30px;
}*/
</style>
 <!-- ======= Footer ======= -->
  <footer id="footer">
    
  <!--   <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
           
              <div class="logo" style="width: 150px;">
                <a href="index.php"><img src="assets/img/banner/logo1.png" width="150px"></a>

              </div>
            <br/>
            <p>
              <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;8, FERN PLACE, KOLKATA
              <!-- <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br> -->
            </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="blog_details.php">Blog</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="our_gallery.php">Gallery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="find_doctor.php">Find a Doctor</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="feedback.php">Feedback</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Guide</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms and condition</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy Policy</a></li>
            </ul>
          </div>

        <div class="col-lg-3 col-md-6 footer-links">
            <h4>Keep in touch</h4>
            <ul>
              <li><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;<a href="tel:9330694126" class="text-light">+9330694126</a></li>
              <li><i class="fas fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:neuromaxhealthcare@gmail.com">neuromaxhealthcare@gmail.com</a></li>
            </ul>
          </div>

         <!--  <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            
          </div> -->

        </div>
      </div>
      <hr/>
    </div>
    
    <div class="container footer-bottom clearfix">
      <div class="text-center">
        &copy; Copyright <strong><span>Neuromax</span></strong>. All Rights Reserved  Designed by <a href="https://adosys.in/">Adosys</a>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
       
      </div>
    </div>
  </footer><!-- End Footer -->
   <div class="icon-bar-side">
  <a href="javascript:void(0)" data-toggle="modal" data-target="#signup_popup" class="facebook" title="SignUp Now"><i class="fas fa-user-plus"></i></a> 
  <a href="javascript:void(0)" data-toggle="modal" data-target="#login_form_popup" class="twitter" title="Login Now"><i class="fas fa-sign-in-alt"></i></i></a> 
  <a href="javascript:void(0)"  data-toggle="modal" data-target="#change_language" class="google" title="Change language"><i class="fa fa-globe" aria-hidden="true"></i></a> 
</div>
<!-- SignUp Popup -->
<div class="modal fade" id="signup_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Register Now</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form id="SignUp_Form" method="post">
                <div class="modal-body">
                   <div class="form-row">
                     <div class="form-group col-md-12">
                       <label class="font-weight-bold">Name :*</label>
                       <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter Name" maxlength="100" required autocomplete="off">
                     </div>
                     <div class="form-group col-md-6">
                       <label class="font-weight-bold">Gender :*</label>
                       <select class="form-control form-control-sm" name="gender" required>
                         <option value="">Select</option>
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                       </select>
                     </div>
                     <div class="form-group col-md-6">
                       <label class="font-weight-bold">Date of birth :*</label>
                       <input type="date" class="form-control form-control-sm" name="dob" required >
                     </div>
                      <div class="form-group col-md-6">
                       <label class="font-weight-bold">Mobile No :*</label>
                       <input type="text" class="form-control form-control-sm" name="mobile" placeholder="Contact No" maxlength="10" required autocomplete="off">
                     </div>
                     <div class="form-group col-md-6">
                       <label class="font-weight-bold">Mail :*</label>
                       <input type="email" class="form-control form-control-sm" name="email" placeholder="Valid Email" maxlength="100" required autocomplete="off">
                     </div>
                     <div class="form-group col-md-12">
                       <label class="font-weight-bold">Address :*</label>
                       <textarea class="form-control form-control-sm" name="address" required maxlength="200" autocomplete="off"></textarea>
                     </div>
                   </div>
                </div>
                <div class="modal-footer">
                  <div id="success"></div>
                  <input type="hidden" name="page" value="SignUp_Form_Action">
                  <input type="hidden" name="action" value="SignUp_Form_Action">
                  <button type="submit" id="submit" class="btn btn-primary">Register</button>
                </div>
              </form>
              </div>
            </div>
          </div>


<!-- Login PopUp -->
<!-- <div class="modal fade" id="login_form_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Login Now</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" id="login_form">
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label class="font-weight-bold">Email :*</label>
                      <input type="email" name="email" placeholder="Valid Email" autocomplete="off" required class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-12">
                      <label class="font-weight-bold">Password :*</label>
                      <input type="password" name="password" placeholder="Valid Password" autocomplete="off" required class="form-control form-control-sm">
                      <label><input type="checkbox" id="show_password">&nbsp;&nbsp;Show Password</label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="page" value="Login_Form_Action">
                  <input type="hidden" name="action" value="Login_Form_Action">
                  <button type="submit" id="login" class="btn btn-success">Login</button>
                </div>
              </form>
              </div>
            </div>
          </div>
 -->
<!-- Language Change PopUp -->
<!-- <div class="modal fade" id="change_language" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Change Language</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                  <div id="google_translate_element"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
 -->
  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

<script src="assets/js/language.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
 }
</script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Admin footer -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="dist/js/adminlte.js"></script> -->

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="dist/js/demo.js"></script> -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>

<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Parsley validation -->

<!-- View Box -->
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script src="viewbox-master/jquery.viewbox.min.js"></script>
<script>
    $(function(){
      
      $('.thumbnail').viewbox();
      $('.thumbnail-2').viewbox({fullscreenButton: true});

      (function(){
        var vb = $('.popup-link').viewbox();
        $('.popup-open-button').click(function(){
          vb.trigger('viewbox.open');
        });
        $('.close-button').click(function(){
          vb.trigger('viewbox.close');
        });
      })();
      
    });
  </script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="assets/plugins/parsley-folder/parsley.js"></script>
  <!-- Change Language  -->
  <script src="assets/plugins/Toast/toastr.min.js"></script>




</body>

</html>
<?php
require_once("script/ajax_signup_login.php");
?>