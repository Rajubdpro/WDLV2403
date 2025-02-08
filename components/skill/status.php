<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Get ID
$id = $_GET['id'];
// Select Skills status
$sql = "SELECT status FROM skills WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$status_res = mysqli_fetch_assoc($result);
// Check status and update
if($status_res['status']==1){
    $sql = "UPDATE skills SET status = 0 WHERE id ='$id'";
    mysqli_query($conn, $sql);
    header("location:skill.php");
}else{
    $sql = "UPDATE skills SET status = 1 WHERE id ='$id'";
    mysqli_query($conn, $sql);
    header("location:skill.php");
}

