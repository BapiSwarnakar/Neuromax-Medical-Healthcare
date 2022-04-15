<?php
define('MY_SITE',true);
require_once("header.php");
if($_GET['id'] !="")
{
  $sql = "SELECT `Blog_Id`, `Blog_Header`, `Blog_Desc`, `Blog_Publish_Id`, `Blog_Date`,tbl_doctor_master.Doc_Name,tbl_doctor_master.Doc_Mobile,tbl_doctor_profile_image.Pro_Image FROM `tbl_news` INNER JOIN tbl_doctor_master ON tbl_doctor_master.Doc_Id=tbl_news.Blog_Publish_Id INNER JOIN tbl_doctor_profile_image ON tbl_doctor_profile_image.Doc_Id=tbl_news.Blog_Publish_Id WHERE tbl_news.Blog_Id='$_GET[id]'";
  if($server->All_Record($sql))
  {
    foreach ($server->View_details as $value) {
      # code...
    }
    //print_r($server->View_details);
  }
}
else
{
  echo "<script>window.location='blog_details.php'</script>";
}
// echo "<pre>";
// print_r($_SERVER);
$url =$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
//echo "<script>alert('".$url."')</script>";
?>
<style type="text/css">
  #mobile{
    display: none;
  }
  @media (max-width: 768px){
    #desktop{
      display: none;
    }
    #mobile{
    display: block;
    }
     #mobile .fa-whatsapp{
         font-size: 25px;
     }
  }
</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0&appId=295830118476041&autoLogAppEvents=1" nonce="lf24kfzs"></script>
<div class="main">
	
    <section id="services" class="services section-bg mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-family: 'Josefin Sans', sans-serif;">Blog Details</h2>
        </div>
         <div class="row">
          <div class="col-md-12 shadow p-4">
            <div data-aos="fade-right" data-aos-delay="100">
                <h4><?php echo $value['Blog_Header']; ?><hr/></h4>
                <b>Posted Date : <?php echo $value['Blog_Date']; ?></b>
                 <p><?php echo $value['Blog_Desc']; ?></p><sub>Post by <?php echo $value['Doc_Name']; ?></sub>
                <div class="d-flex justify-content-end"><img src="doc_images/<?php echo $value['Pro_Image']; ?>" class="img-fluid" style="width: 150px;"></div>
                <div class="text-right"><b><?php echo $value['Doc_Name']; ?></b></div>
               
                <div class="text-right">
                	<div class="text-right">
	                    <a href="https://api.whatsapp.com/send?phone=8276968313&text=http://localhost/Neuromax/show_blog_details_one.php?id=<?php echo $value['Blog_Id'] ?>" target="_blank" id="desktop">
	                      <i class="fa fa-whatsapp text-success fa-2x" aria-hidden="true"></i>
	                      &nbsp;&nbsp;
	                    </a>
	                    <a href="whatsapp://send?text='.$value['Blog_Header'].'" id="mobile">
	                      <i class="fa fa-whatsapp text-success fa-2x" aria-hidden="true"></i>
	                      &nbsp;&nbsp;
	                    </a>
	                    <!-- <a href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/Neuromax/show_blog_details_one.php?id=<?php echo $value['Blog_Id'] ?>&hash=<?php echo password_hash("Show Blog", PASSWORD_DEFAULT);?>&t=<?php echo $value['Blog_Header']; ?>" target="_blank">
	                     <i class="fa fa-facebook-square" class="" aria-hidden="true"></i>
	                    </a> -->
	                    
	                    </div>

	                  </div>
                </div>
            </div>
            
          </div>
       
       </div>
     </div>
    </section><!-- End News Section -->  
</div>

<?php
require_once("footer.php");
?>