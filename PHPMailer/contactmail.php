<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connect.php';
 use PHPmailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
require_once 'PHPMailer.php';
 require_once 'Exception.php';
 require_once 'SMTP.php';
//  PHPMailer.php

$mail = new PHPMailer();

 if(isset($_POST['submit'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $subject=$_POST['subject'];
     $phone=$_POST['phone'];
     $details=$_POST['details'];
     
     
    
 
// Load the email template
$template = file_get_contents('PHPMailer/contact_temp.php');

// Replace placeholders with dynamic content

$template = str_replace('{{name}}', $name, $template);
$template = str_replace('{{email}}', $email, $template);
$template = str_replace('{{phone}}', $phone, $template);
$template = str_replace('{{details}}', $details, $template);


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.eifcltd.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@eifcltd.com';              // SMTP username
$mail->Password = 'homeland2023#';               // SMTP password
$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('no@eifcltd.com', 'Elite Admin');
$mail->addAddress('info@eifcltd.com');   // Add a recipient

$mail->isHTML(true);                         // Set email format to HTML
$mail->Subject = $subject;
$mail->Body = $template;


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
//   session_start();
    $_SESSION['message'] = 'Message has been sent.';
                   header('Location: ' . $_SERVER['PHP_SELF'].'?alert=1');
  exit;
 }
}
?>
