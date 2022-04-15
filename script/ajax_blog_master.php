<script type="text/javascript">
	$(document).ready(function(){
		
	    All_Blog_view('','');
	    function All_Blog_view(date,doctor)
	    {
	    	$.ajax({
	    		url : "action-page/user_ajax_action.php",
	    		method :"post",
	    		data : {
	    			page : "All_Blog_view_page",
	    			action : "All_Blog_view_page",
	    			date : date,
	    			doctor : doctor
	    		},
	    		dataType : "json",
	    		beforeSend : function()
	    		{
	    			$('#load').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>');
	    		},
	    		success : function(data)
	    		{
	    			if(data.success)
	    			{
	    				$('#Show_blog').html(data.success);
	    				$('#load').html('');
	    			}
	    			else
	    			{
	    				$('#Show_blog').html(data.error);
	    				$('#load').html('');
	    			}
	    			
	    		}
	    	});
	    }


	$(document).on('click','.Read_more_btn',function(event){
	    data1 =  $(this).data('text');
	    content_show1 = $(this).data('content_show');
	    $('#'+content_show1).html(data1+"<a href='#' class='text-danger Less_More_btn' data-text='"+data1+"' data-content_show='"+content_show1+"'>Less More..</a>");
	    // $('#'+content_show).html(data+'<a href="javascript:void(0)" class="text-danger Less_More_btn" data-text="'+data+'" data-content_show="'+content_show+'">Less More..</a>');
		 event.preventDefault();
		});	

	    $(document).on('click','.Less_More_btn',function(event){
	    	data =  $(this).data('text');
	        content_show = $(this).data('content_show');
	    	$.ajax({
	    		url : "action-page/user_ajax_action.php",
	    		data : {
	    			text : data,
	    			content_show : content_show,
	    			page :"Less_More_Content",
	    			action : "Less_More_Content"
	    		},
	    		method : "post",
	    		dataType : "json",

	    		success : function(data)
	    		{
	               $('#'+content_show).html(data.success);
	    		}
	    	})

	    event.preventDefault();
	    });

	 $('#month').on('change',function(event){
           All_Blog_view($(this).val(),'');
           $('#doctor').val('');

    event.preventDefault();    
	});

	 $('#doctor').on('change',function(event){
	 	All_Blog_view('',$(this).val());
	 	$('#month').val('');
	 });

	

	});

</script>