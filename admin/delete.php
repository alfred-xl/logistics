<?php
include 'connect.php'; 

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    
    // Delete records from 'information' table
    $infoSql = "DELETE FROM `shipment` WHERE id = '$id'";
    $infoResult = mysqli_query($conn, $infoSql);

    // Check if the deletion from 'information' table was successful
    if ($infoResult) {
        $track_id = $_GET['trackid'];
        
        // Delete related records from 'plan_info'
        $relatedSql = "DELETE FROM `package_info` WHERE track_id = '$track_id'";
        $relatedResult = mysqli_query($conn, $relatedSql);

        // Check if the deletion from 'related_table' was successful
        if ($relatedResult) {
            header('location:index.php');
        } else {
            die(mysqli_error($conn));
        }
    } else {
        die(mysqli_error($conn));
    }
}
?>