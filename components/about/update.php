<?php
session_start();
// Database connection
require '../../db.php';
// Collect About Data from form
$designation = $_POST['designation'];
$name = $_POST['name'];
$watermark = $_POST['watermark'];
$short_des = $_POST['short_des'];

// Update About data form to database
$sql = "UPDATE abouts SET designation='$designation', name = '$name', watermark='$watermark', short_des= '$short_des'";
$result = mysqli_query($conn, $sql);
$_SESSION['about_update'] = "About Information Updated Successfully";
header("location:about.php");
// End code Here




