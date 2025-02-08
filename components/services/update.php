<?php
// session start
session_start();
// db connection
require "../../db.php";
// Get edit data
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
// Update services
$sql = "UPDATE services SET name ='$name', description='$description' WHERE id='$id'";
$conn->query($sql);
$_SESSION['service_updated_success'] = "Services Updated successfully";
header("location:edit.php?id=$id");