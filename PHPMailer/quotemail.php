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
     $freight=$_POST['freight'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $colcountry=$_POST['colcountry'];
     $delcountry=$_POST['delcountry'];
     $state=$_POST['state'];
     $weight=$_POST['weight'];
     $height=$_POST['height'];
     $width=$_POST['width'];
     $length=$_POST['length'];
     
      if ($colcountry === "Nigeria" && $delcountry === "Europe") {
        $state = ""; // Set the state value to empty
    }
    
 
// Load the email template
$template = file_get_contents('PHPMailer/quote_temp.html');
$templateuser = file_get_contents('PHPMailer/quote_temp_user.html');

// Replace placeholders with dynamic content

$template = str_replace('{{freight}}', $freight, $template);
$template = str_replace('{{name}}', $name, $template);
$template = str_replace('{{email}}', $email, $template);
$template = str_replace('{{phone}}', $phone, $template);
$template = str_replace('{{colcountry}}', $colcountry, $template);
$template = str_replace('{{delcountry}}', $delcountry, $template);
$template = str_replace('{{weight}}', $weight, $template);
$template = str_replace('{{state}}', $state, $template);
$template = str_replace('{{height}}', $height, $template);
$template = str_replace('{{width}}', $width, $template);
$template = str_replace('{{length}}', $length, $template);


$templateuser = str_replace('{{name}}', $name, $templateuser);




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
$mail->Subject = "Request a Quote";
$mail->Body = $template;
$mail->send();

$mail->clearAddresses();
$mail->addAddress($email);
$mail->Body =$templateuser ;


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
