<!DOCTYPE html>
<html>
<head>
	<title>success pay</title>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
  if(isset($_GET['mail']) && !empty($_GET['mail']))
  {
  	if($_GET['mail']=="success")
  	{
       ?>
         <script type="text/javascript">
         	$(document).ready(function(){
         		// alert("oh");
               swal("Payment Successully Done", "Please check Your Mail", "success");
         	});
         </script>
       <?php
  	}
  	else
  	{
  		?>
  		<script type="text/javascript">
  			$(document).ready(function(){
               swal("Payment Successully Done", "Your Mail is not sending our system", "success");
  			});
  		</script>
  		<?php
  	}
  }
?>
</body>
</html>