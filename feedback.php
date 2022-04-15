<?php
define('MY_SITE',true);
require_once("landing_header.php");
?>
<style type="text/css">
	.fa-star{
    color: gold;
  }
</style>
<section id="admin" class="admin">
      <div class="container col-md-4" data-aos="fade-up">
        <div class="container col-md-6" style="padding: 55px;">
            
        	<form id="feedback_form" style="margin-top: 13%; padding: 5%; background: #E8EAF0;">
                <h2 class="text-center">Send Feedback</h2><hr>
        	<div class="form-row">
        			<div class="form-group col-md-4">
        				<label class="font-weight-bold">Name :*</label>
        				<input type="text" name="name" class="form-control form-control-sm" placeholder="Enter Name*" required>
        			</div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold">Gender :*</label>
                        <select name="gender" class="form-control form-control-sm" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
        			<div class="form-group col-md-4">
        				<label class="font-weight-bold">Mobile No :*</label>
        				<input type="number" name="Mobile" minlength="10" maxlength="10" class="form-control form-control-sm" placeholder="Valid MobileNo*" required>
        			</div>
        			<div class="form-group col-md-12">
        				<label class="font-weight-bold">Comment :*</label>
        				<textarea name="commment" minlength="5" maxlength="250" required class="form-control form-control-sm" placeholder="Comment*"></textarea>
        			</div>
        			<div class="form-group col-md-12">
                            <label for="rating" class="font-weight-bold">Feedback :*</label><br/>

                            <label><input type="radio" name="rating" id="rating" value="1">&nbsp;<i class="fa fa-star" aria-hidden="true"></i></label>
                            &nbsp;&nbsp;
                            <label><input type="radio" name="rating" id="rating" value="2">&nbsp;<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label>
                            &nbsp;&nbsp;
                            <label><input type="radio" name="rating" id="rating" value="3">&nbsp;<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label>
                            &nbsp;&nbsp;
                            <label><input type="radio" name="rating" id="rating" value="4">&nbsp;<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label>
                            &nbsp;&nbsp;
                            <label><input type="radio" name="rating" id="rating" value="5" required>&nbsp;<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label>

                        </div>
                        <div class="form-group col-md-12">
                        	<input type="hidden" name="page" value="Feedback_form_send">
                        	<input type="hidden" name="action" value="Feedback_form_send">
                        	<button type="submit" name="submit" value="Send Feedback" style="border: none;background-color:#E8EAF0; color: black; font-size: 20px;">Send Feedback<span style="color: black;" id="load">&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></span></button>
                        </div>
                </div>
            </form>
        </div>
       
      </div>
      <br>
    </section><!-- End Admin Section -->
<?php 
require_once("landing_footer.php");
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#feedback_form').parsley();
		$('#feedback_form').on('submit',function(event){
			if($('#feedback_form').parsley().validate()){
				$.ajax({
					url : "action-page/user_ajax_action.php",
					method: "POST",
					data: $(this).serialize(),
					dataType : "json",
					beforeSend : function(){
						$('#load').html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>');
					},
					success : function(data)
					{
						if(data.success)
						{
                          swal("Thankyou", ""+data.success+"", "success");
                          $('#feedback_form')[0].reset();
                          $('#load').html('<i class="fa fa-arrow-right" aria-hidden="true"></i>');
						}
						else
						{
							alert(data.error);
							$('#load').html('<i class="fa fa-arrow-right" aria-hidden="true"></i>');
						}
					}
				});
			}
		event.preventDefault();
		})
	});
</script>