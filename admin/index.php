<?php
require_once("header.php");
$server->login_session_Check();
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post" id="Admin_login_form">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="Userame" placeholder="User Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Show Password
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="hidden" name="page" value="Admin_form">
            <input type="hidden" name="action" value="Admin_form">
            <button type="submit" id="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     <!--  <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</body>
<?php
require_once("footer.php");
?>
<script type="text/javascript">
  $(document).ready(function(){
        $('#Admin_login_form').parsley();
        $('#Admin_login_form').on('submit',function(event){
          if($('#Admin_login_form').parsley().validate())
          {
            $.ajax({
              url:"../action-page/admin_ajax_action.php",
              method:"post",
              data : $(this).serialize(),
              dataType:"json",
              beforeSend:function()
              {
                $('#submit').html('Wait..');
                $('#submit').attr('disabled',true);
              },
              success:function(data)
              {
              if(data.success)
                  {
                     toastr.options = {
                        "closeButton": true,  // true or false
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,  // true or false
                        "rtl": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false, // true or false
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                    toastr["success"](data.success, "Message");
                    setTimeout(function(){
                    location.href='Dashboard/dashboard.php';
                  }, 1000);
                   }
                   else
                   {
                      toastr.options = {
                        "closeButton": true,  // true or false
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,  // true or false
                        "rtl": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false, // true or false
                        "showDuration": 300,
                        "hideDuration": 1000,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                     toastr["error"](data.error, "Message");
                     $('#submit').html('Sign In');
                     $('#submit').attr('disabled',false);
                   }
              }
            });
          }
        event.preventDefault();
        });

    $('#remember').on('change',function(event){
       
       if($('#remember').is(":checked"))
       {
         $('#Password').attr('type','text');
       }
       else
       {
         $('#Password').attr('type','password');
       }

     event.preventDefault()
    })
  });
</script>
