        <!-- ################# Footer Starts Here#######################--->

<style>
    .whats-app {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 15px;
    right: 20px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 100;
}

.my-float {
    margin-top: 15px;
}

/*ul{  
   background-color:#eee;  
   cursor:pointer;  
  } */ 
  /*.item{  
     padding:10px;
     background-color: white;  
    }*/ 
</style>
    <footer class="footer">
        <div class="container">
            <div>
              <a  class="whats-app" href="https://wa.me/918334811773?text=Hi" target="_blank">
              <i class="fab fa-whatsapp my-float"></i>

             </a>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                 <div class="logo">
                   <a href="index.php"><img src="assets/img/banner/logo1.png" width="150px"></a>

                </div>
                8, FERN PLACE, KOLKATA <br>
                        <!-- Toranto, Canada <br> -->
                        Phone: <a href="tel:+919330694126" class="text-light">+919330694126</a> <br>
                        Email: <a href="mailto:neuromaxhealthcare@gmail.com" class="text-light">neuromaxhealthcare@gmail.com</a><br>
            <br/>
            
           

       
            </div>
                <div class="col-md-4 col-sm-12">
                    <h2>Useful Links</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="about" href="index.php">Home</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="about" href="about.php">About</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" href="blog_details.php">Blog</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" href="our_gallery.php">Gallery</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="products" href="contact.php">Contact</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="gallery" href="feedback.php">Feedback</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h2>Guide</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="Terms and condition" href="terms_condition.php">Terms and condition</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="Privacy Policy" href="privacy_policy.php">Privacy Policy</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="Disclaimer" href="disclaimer.php">Disclaimer</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <!--  -->
                
            </div>
        </div>
        

    </footer>
    <div class="copy">
            <div class="container">
                <a href="http://adosys.in/" target="blank">2021 &copy; All Rights Reserved | Designed and Developed by Adosys</a>
                
                <span>
                <!-- <a><i class="fab fa-github"></i></a>
                <a><i class="fab fa-google-plus-g"></i></a>
                <a><i class="fab fa-pinterest-p"></i></a> -->
                <a><i class="fab fa-twitter"></i></a>
                <a><i class="fab fa-facebook-f"></i></a>
        </span>
            </div>

        </div>


   <!-- Modal -->
<div class="modal fade" id="Doc_Model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #014a81;">
        <h5 class="modal-title text-light" id="exampleModalLongTitle"></h5>
        <button type="button" class="close bg-light text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" id="data">
          

        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Need_Help" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#014a81; ">
        <h5 class="modal-title text-light" id="help">Need Help</h5>
        <button type="button" class="close bg-light text-dark" data-dismiss="modal" aria-label="Close">
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
            <label class="font-weight-bold">Your Queries :*</label>
            <textarea class="form-control form-control-sm" name="desc" placeholder="Queries" maxlength="200" minlength="5" required></textarea>
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

<!-- Side Tab -->

  <!-- <div class="icon-bar-side"> -->

  <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#signup_popup" class="facebook" title="SignUp Now">
    <i class="fas fa-user-plus"></i>
  </a>  -->
  <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#login_form_popup" class="twitter" title="Login Now">
    <i class="fas fa-sign-in-alt"></i></i>
  </a> 
  <a href="javascript:void(0)"  data-toggle="modal" data-target="#change_language" class="google" title="Change language">
    <i class="fa fa-globe" aria-hidden="true"></i>
  </a>  -->

<!-- </div> -->
<!--  -->
<!-- SignUp Popup -->
<div class="modal fade" id="signup_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background:#014a81; ">
                  <h5 class="modal-title text-light" id="exampleModalLongTitle">Register Now</h5>
                  <button type="button" class="close text-dark bg-light" data-dismiss="modal" aria-label="Close">
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
          </div> -->

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



<!-- Modal -->
<div class="modal fade" id="Appointment_Details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #014a81;">
        <h5 class="modal-title text-light" id="exampleModalLongTitle">Appointment Details</h5>
        <button type="button" class="close bg-dark text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 300px;overflow-y: scroll;">
        <h5 id="doc_name"></h5>
         <table class="table table-bordered" id="App_Details">

           

         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
<!-- <script src="assets/js/language.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
 }
</script> -->
<!-- <script src="landing_assets/js/jquery-3.2.1.min.js"></script> -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="landing_assets/js/popper.min.js"></script>
<script src="landing_assets/js/bootstrap.min.js"></script>
<script src="landing_assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="landing_assets/plugins/slider/js/owl.carousel.min.js"></script>
<script src="landing_assets/js/script.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/plugins/parsley-folder/parsley.js"></script>
  <!-- Change Language  -->
  <script src="assets/plugins/Toast/toastr.min.js"></script>

</html>
<?php
require_once("script/ajax_index_page.php");
require_once("script/ajax_signup_login.php");
require_once("script/ajax_find_doctor.php");
?>