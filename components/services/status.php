<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Get Id
$id = $_GET['id'];
// Select Status update
$sql = "SELECT status FROM services WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$status_res = mysqli_fetch_assoc($result);
// Check status and update
if($status_res['status']==1){
    $sql = "UPDATE services SET status = 0 WHERE id ='$id'";
    mysqli_query($conn, $sql);
    header("location:service.php");
}else{
    $sql = "UPDATE services SET status = 1 WHERE id ='$id'";
    mysqli_query($conn, $sql);
    header("location:service.php");
}

