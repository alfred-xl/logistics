<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include 'connect.php';
 use PHPmailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
require_once 'PHPMailer.php';
 require_once 'Exception.php';
 require_once 'SMTP.php';
//  PHPMailer.php

$mail = new PHPMailer();


 $id=$_GET["trackid"];
 $email=$_GET["email"];
 
  if(isset($_POST['submit'])){
       $information=$_POST['information'];
       $packagestatus=$_POST['packagestatus'];
       $date= date('Y-m-d  H:i:s');
   
     
 $sql="insert into `package_info`(track_id,information,date,packagestatus)
     values('$id','$information','$date','$packagestatus')";
     $result=mysqli_query($conn,$sql);
     if($result){
        //  $alert="Package Successfully Added";
        //  header('location:index.php');
     }else{
         die(mysqli_error($conn));
     }
      
// Load the email template
$template = file_get_contents('./PHPMailer/temp.php');
  
// Replace placeholders with dynamic content
$template = str_replace('{{track_code}}', $id, $template);
$template = str_replace('{{date}}', $date, $template);
$template = str_replace('{{information}}', $information, $template);
$template = str_replace('{{status}}', $packagestatus, $template);
 


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.eifcltd.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@eifcltd.com';              // SMTP username
$mail->Password = 'homeland2023#';               // SMTP password
$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply@eifcltd.com', 'Elite Admin');
$mail->addAddress($email);   // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Tracking Notification';
$mail->Body    =$template;
$mail->send();


$mail->clearAddresses();
$mail->addAddress('info@eifcltd.com');
$mail->Body = $template;
// $mail->send();



if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
//   session_start();
    $_SESSION['message'] = 'Your form has been successfully submitted.';
                   header('Location: ' . $_SERVER['PHP_SELF'].'?alert=1');
  exit;
}
}
?>
