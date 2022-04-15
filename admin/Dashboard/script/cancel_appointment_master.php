<script type="text/javascript">
	$(document).ready(function(){
		Display_All_Cancel_Appointment();
		  function Display_All_Cancel_Appointment()
		  {
		      $.ajax({
		        url : "../../action-page/admin_ajax_action.php",
		        type : "POST",
		        data : {
		          page : "Display_All_Cancel_Appointment_",
		          action :"Display_All_Cancel_Appointment_"
		        },
		        success : function(data){
		          $('#data_cancel').html(data);
		          $("#cancel_app").DataTable({
		            "responsive": true,
		            "autoWidth": false,
		         });
		        }
		    });
		  }
	})
</script>