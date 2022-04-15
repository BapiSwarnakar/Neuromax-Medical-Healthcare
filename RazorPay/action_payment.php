<?php
require_once("../class/class.php");
require_once("../db_connect/db_connect.php");
$server= new Main_Classes;
if(isset($_GET['id']) && !empty($_GET['id']))
{
  $check = "SELECT `pay_status` FROM `tbl_online_appointment` WHERE Order_Id='$_GET[id]'";
  if($server->All_Record($check))
  {
     foreach ($server->View_details as $value) {
       
     }
     if($value['pay_status'] !=0)
     {
       echo'You are Already Payment ..!';
     }
     else
     { 

     ?>
       <!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>
		<form action="pay.php?hash=<?php echo md5(rand()); ?>" name="f1" method="post">
			<input type="hidden" name="Payment_page" value="Pay">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		</form>
		<script type="text/javascript">
			document.f1.submit();
		</script>
		</body>
		</html>
     <?php 
     }
  }
  else
  {
    echo 'Technical issue, Please try again..!';
  }
}
else
{
	echo "Not Access This Page..!";
}
?>
