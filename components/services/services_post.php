<?php
global $conn;
session_start();
// Db Connection
require "../../db.php";
// Get form Data
$name = $_POST['name'];
$description = $_POST['description'];
$flag = false;
// Check validation and Update
if(empty($name && $description)){
    $flag = true;
    $_SESSION['service_name_error'] = 'Provide name with description';
    header('location:service.php');
}else{
    $sql = "INSERT INTO services(name, description) VALUES ('$name', '$description')";
    mysqli_query($conn, $sql);
    $_SESSION['added_new_service'] = "New Service Added Successfully";
    header("location:service.php");
}


