<!-- <!DOCTYPE html>
<html>
<head>
	<title>How to disable browser back button using Jquery? - ItSolutionStuff.com</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
  
<button>click on browser back button</button>
  
</body>
   
<script type="text/javascript">
  $(document).ready(function() {
      window.history.pushState(null, "", window.location.href);        
      window.onpopstate = function() {
          window.history.pushState(null, "", window.location.href);
      };
  });
</script>
   
</html> -->
<?php
echo "<pre>";
print_r($_SERVER);
?>