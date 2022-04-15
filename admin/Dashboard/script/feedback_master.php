<script type="text/javascript">
	$(document).ready(function(){

		All_Feedback();
	      function All_Feedback()
	      {
	          $.ajax({
	            url : "../../action-page/admin_ajax_action.php",
	            type : "POST",
	            data : {
	              page : "All_Feedback_",
	              action :"All_Feedback_"
	            },
	            success : function(data){
	              $('#data').html(data);
	              $("#feedback_table").DataTable({
	                "responsive": true,
	                "autoWidth": false,
	             });
	            }
	        });
	      }
	});
</script>