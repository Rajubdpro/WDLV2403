<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';

$id = $_GET['id'];

$sql = "SELECT status FROM portfolios WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$status_res = mysqli_fetch_assoc($result);

if($status_res['status']==1){
    $sql = "UPDATE portfolios SET status = 0 WHERE id ='$id'";
    mysqli_query($conn, $sql);
    header("location:portfolio.php");
}else{
    $sql = "UPDATE portfolios SET status = 1 WHERE id ='$id'";
    mysqli_query($conn, $sql);
    header("location:portfolio.php");
}

