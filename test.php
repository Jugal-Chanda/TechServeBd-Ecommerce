<?php
    $mailto = $_POST['mail_to'];
    $mailSub = $_POST['mail_sub'];
    $mailMsg = $_POST['mail_msg'];
   require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "amibest50@gmail.com";
   $mail ->Password = "105488jkc2017-1-60-134jkc105488jkc";
   $mail ->SetFrom("amibest50@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
   ?>

<?php
$to = "jugalchanda7@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: amibest50@gmail.com" . "\r\n" ;

mail($to,$subject,$txt,$headers);

// 105488jkc2017-1-60-134jkc105488jkc
?>
