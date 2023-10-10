<?php 
session_start();
include 'connect.php'; 
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    $sql="delete from `package_info` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['message'] = 'deleted successfully!';
       
// Redirect the user back to the previous page
header('Location:' . $_SERVER['HTTP_REFERER']);
exit();
    }else{
        die(mysqli_error($conn));
    }
}

?>
