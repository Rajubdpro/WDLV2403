<?php
// session start
session_start();
// db connection
require "../../db.php";

$delid = $_GET['id'];
$sql = "DELETE FROM services WHERE id='$delid'";
$conn->query($sql);

$_SESSION['delete_service'] = "Service Deleted Successfully";
header("location:service.php");