<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php';
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
require_once 'PHPMailer.php';
 require_once 'Exception.php';
 require_once 'SMTP.php';
//  PHPMailer.php

$mail = new PHPMailer();

 if(isset($_POST['submit'])){
       $email_address=$_POST['email_address'];
       $email_body=$_POST['email_body'];
       $email_subject=$_POST['email_subject'];
       $date= date('Y-m-d  H:i:s');
   
     
 $sql="insert into `email_info`(email_address,email_body,email_subject,date)
     values('$email_address','$email_body','$email_subject','$date')";
     $result=mysqli_query($conn,$sql);
     if($result){
        //  $alert="Package Successfully Added";
        //  header('location:index.php');
     }else{
         die(mysqli_error($conn));
     }
      
 
// Load the email template
$template = file_get_contents('Email/PHPMailer/template.php');

// Replace placeholders with dynamic content
$template = str_replace('{{email_subject}}', $email_subject, $template);
$template = str_replace('{{email_body}}', $email_body, $template);
// $template = str_replace('{{packagedescription}}', $packagedescription, $template);
// $template = str_replace('{{sendername}}', $sendername, $template);
// $template = str_replace('{{senderemail}}', $senderemail, $template);
// $template = str_replace('{{senderphone}}', $senderphone, $template);
// $template = str_replace('{{senderaddress}}', $senderaddress, $template);
// $template = str_replace('{{sendercountry}}', $sendercountry, $template);
// $template = str_replace('{{sendercity}}', $sendercity, $template);
// $template = str_replace('{{senderzip}}', $senderzip, $template);
// $template = str_replace('{{recievername}}', $recievername, $template);
// $template = str_replace('{{recieveremail}}', $recieveremail, $template);
// $template = str_replace('{{recieverphone}}', $recieverphone, $template);
// $template = str_replace('{{recieveraddress}}', $recieveraddress, $template);
// $template = str_replace('{{recievercountry}}', $recievercountry, $template);
// $template = str_replace('{{recievercity}}', $recievercity, $template);
// $template = str_replace('{{recieverzip}}', $recieverzip, $template);

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.eifcltd.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@eifcltd.com';              // SMTP username
$mail->Password = 'homeland2023#';               // SMTP password
$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply@eifcltd.com', 'Elite Admin');
$mail->addAddress($email_address);   // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $email_subject;
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
                   header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}
}
?>
