<?php
class Admin_Site 
{
	
   public function Send_email($receiver_email,$subject,$body)
     {
      $mail = new PHPMailer;

      $mail->IsSMTP();

      $mail->Host = 'smtp.gmail.com';

      $mail->Port = '587';

      $mail->SMTPAuth = true;

      $mail->Username = 'swarnakarr34@gmail.com';

      $mail->Password = 'Bapi@!123';

      $mail->SMTPSecure = 'tls';

      $mail->From = 'info@Codewithbapi.info';

      $mail->FromName = 'info@Codewithbapi.info';

      $mail->AddAddress($receiver_email, '');

      $mail->IsHTML(true);

      $mail->Subject = $subject;

      $mail->Body = $body;

      //$mail->AddEmbeddedImage('first.png','apple');

      if($mail->Send())
      {
        return true;
      }
      else
      {
        return "{$mail->ErrorInfo}";
      }
      
    }
   
 }
 
 ?>   