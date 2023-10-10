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
     $sendername=$_POST['sendername'];
     $senderemail=$_POST['senderemail'];
     $senderaddress=$_POST['senderaddress'];
     $senderphone=$_POST['senderphone'];
     $sendercountry=$_POST['sendercountry'];
     $sendercity=$_POST['sendercity'];
     $senderzip=$_POST['senderzip'];
     $recievername=$_POST['recievername'];
     $recieveremail=$_POST['recieveremail'];
     $recieveraddress=$_POST['recieveraddress'];
     $recieverphone=$_POST['recieverphone'];
     $recievercountry=$_POST['recievercountry'];
     $recievercity=$_POST['recievercity'];
     $recieverzip=$_POST['recieverzip'];
     $packagedescription=$_POST['packagedescription'];
     $packagestatus=$_POST['packagestatus'];
     $date= date('Y-m-d  H:i:s');
     
     
     
     $sql="insert into `shipment`(sendername,senderemail,senderaddress,senderphone,senderzip,sendercountry,sendercity,recievername,recieveremail,recieveraddress,recieverphone,recieverzip,recievercountry,recievercity,packagedescription,packagestatus,date)
     values('$sendername','$senderemail','$senderaddress','$senderphone','$senderzip','$sendercountry','$sendercity','$recievername','$recieveremail','$recieveraddress','$recieverphone','$recieverzip','$recievercountry','$recievercity','$packagedescription','$packagestatus','$date')";
     $result=mysqli_query($conn,$sql);
     if($result){
         $last_id=mysqli_insert_id($conn);
         if($last_id){
             $code=rand(1,99999);
             $user_id="EIFC/".$code;
             $query="UPDATE shipment SET user_id='".$user_id."' WHERE id='".$last_id."'";
             $res =mysqli_query($conn,$query);
         }
         
        //  echo "Data inserted successfully";
        //  header('location:index.php');
     }else{
         die(mysqli_error($conn));
     }
 
// Load the email template
$template = file_get_contents('PHPMailer/template.php');

// Replace placeholders with dynamic content
$template = str_replace('{{track_code}}', $user_id, $template);
$template = str_replace('{{date}}', $date, $template);
$template = str_replace('{{packagedescription}}', $packagedescription, $template);
$template = str_replace('{{sendername}}', $sendername, $template);
$template = str_replace('{{senderemail}}', $senderemail, $template);
$template = str_replace('{{senderphone}}', $senderphone, $template);
$template = str_replace('{{senderaddress}}', $senderaddress, $template);
$template = str_replace('{{sendercountry}}', $sendercountry, $template);
$template = str_replace('{{sendercity}}', $sendercity, $template);
$template = str_replace('{{senderzip}}', $senderzip, $template);
$template = str_replace('{{recievername}}', $recievername, $template);
$template = str_replace('{{recieveremail}}', $recieveremail, $template);
$template = str_replace('{{recieverphone}}', $recieverphone, $template);
$template = str_replace('{{recieveraddress}}', $recieveraddress, $template);
$template = str_replace('{{recievercountry}}', $recievercountry, $template);
$template = str_replace('{{recievercity}}', $recievercity, $template);
$template = str_replace('{{recieverzip}}', $recieverzip, $template);

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.eifcltd.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@eifcltd.com';              // SMTP username
$mail->Password = 'homeland2023#';               // SMTP password
$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply@eifcltd.com', 'Elite Admin');
$mail->addAddress($senderemail, $sendername);   // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'New Package Notification';
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
