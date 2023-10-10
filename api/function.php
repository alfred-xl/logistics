<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

function error422($message){
    $data = [
        'status' => 422,
        'message' => $message
    ];
    header("HTTPS/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}

function storeCustomer($customerInput) {
    global $conn;

     $requiredFields = [
        'sendername', 'senderemail', 'senderaddress', 'senderphone', 'sendercountry',
        'sendercity', 'senderzip', 'recievername', 'recieveremail', 'recieveraddress',
        'recieverphone', 'recievercountry', 'recievercity', 'recieverzip', 'packagedescription'
    ];

    foreach ($requiredFields as $field) {
        if (empty($customerInput[$field])) {
            return error422('Missing ' . $field);
        }
    }
    $sendername = mysqli_real_escape_string($conn, $customerInput['sendername']);
    $senderemail = mysqli_real_escape_string($conn, $customerInput['senderemail']);
    $senderaddress = mysqli_real_escape_string($conn, $customerInput['senderaddress']);
    $senderphone = mysqli_real_escape_string($conn, $customerInput['senderphone']);
    $sendercountry = mysqli_real_escape_string($conn, $customerInput['sendercountry']);
    $sendercity = mysqli_real_escape_string($conn, $customerInput['sendercity']);
    $senderzip = mysqli_real_escape_string($conn, $customerInput['senderzip']);
    $recievername = mysqli_real_escape_string($conn, $customerInput['recievername']);
    $recieveremail = mysqli_real_escape_string($conn, $customerInput['recieveremail']);
    $recieveraddress = mysqli_real_escape_string($conn, $customerInput['recieveraddress']);
    $recieverphone = mysqli_real_escape_string($conn, $customerInput['recieverphone']);
    $recievercountry = mysqli_real_escape_string($conn, $customerInput['recievercountry']);
    $recievercity = mysqli_real_escape_string($conn, $customerInput['recievercity']);
    $recieverzip = mysqli_real_escape_string($conn, $customerInput['recieverzip']);
    $packagedescription = mysqli_real_escape_string($conn, $customerInput['packagedescription']);
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO `shipment` (sendername, senderemail, senderaddress, senderphone, senderzip, sendercountry, sendercity, recievername, recieveremail, recieveraddress, recieverphone, recieverzip, recievercountry, recievercity, packagedescription,date)
            VALUES ('$sendername', '$senderemail', '$senderaddress', '$senderphone', '$senderzip', '$sendercountry', '$sendercity', '$recievername', '$recieveremail', '$recieveraddress', '$recieverphone', '$recieverzip', '$recievercountry', '$recievercity', '$packagedescription','$date')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $last_id = mysqli_insert_id($conn);
        if ($last_id) {
            $code = rand(1, 99999);
            $user_id = "EIFC/" . $code;
            $query = "UPDATE shipment SET user_id = '$user_id' WHERE id = '$last_id'";
            $res = mysqli_query($conn, $query);
        }

        $template = file_get_contents('../PHPMailer/template.php');
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

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'mail.eifcltd.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@eifcltd.com';
            $mail->Password = 'homeland2023#';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('noreply@eifcltd.com', 'Elite Admin');
            $mail->addAddress($senderemail, $sendername);

            $mail->isHTML(true);
            $mail->Subject = 'New Package Notification';
            $mail->Body = $template;
            $mail->send();

            $mail->clearAddresses();
            $mail->addAddress('info@eifcltd.com');
            $mail->Body = $template;
            $mail->send();

            $data = [
                'status' => 201,
                'message' => 'Created Successfully'
            ];
            header("HTTPS/1.0 201 Created");
            return json_encode($data);

        } catch (Exception $e) {
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header("HTTPS/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header("HTTPS/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}

 
function getCustomerList(){
    
    global $conn;
    
    $query ="SELECT * FROM shipment";
    $query_run= mysqli_query($conn, $query);
    
    if($query_run){
        
        if(mysqli_num_rows($query_run) > 0){
            
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            
        $data=[
           'status'=>200,
           'message'=>'fetched successfully',
           'data'=>$res
           ];
           header("HTTP/1.0 200 OK");
           echo json_encode($data);
            
        }else{
       $data=[
           'status'=>404,
           'message'=>'No Customer Found',
         ];
          header("HTTP/1.0 500 Method Not Allowed");
          return json_encode($data);
        }
        
        
    }
    else{
       $data=[
           'status'=>500,
           'message'=>'Internal server Error',
        ];
           header("HTTP/1.0 405 Internal server Error");
           return json_encode($data);        
    }
}

function getTrackid($trackdetails) {
    global $conn;
    
    if ($trackdetails['id'] == null) {
        return error422('Enter tracking code');
    }
    
    $trackid = mysqli_real_escape_string($conn, $trackdetails['id']);
  
    $query = "SELECT * FROM package_info WHERE track_id='$trackid' ";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $data = [];
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            
            $response = [
                'status' => 200,
                'message' => 'Fetched successfully',
                'data' => $data
            ];
            
            header("HTTP/1.0 200 OK");
            echo json_encode($response);
        } else {
            $response = [
                'status' => 404,
                'message' => 'No tracking records found'
            ];
            
            header("HTTP/1.0 404 Not Found");
            echo json_encode($response);
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($response);
    }
}

 

?>