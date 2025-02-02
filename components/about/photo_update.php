<?php
session_start();
// Db connection
require "../../db.php";
$photo = $_FILES['photo'];

$select = "SELECT * FROM abouts";
$select_res = mysqli_query($conn, $select);
$after_assoc = mysqli_fetch_assoc($select_res);
$delete_from = '../../uploads/about/' . $after_assoc['photo'];
unlink($delete_from);

$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);
$file_name = uniqid() . '.' . $extension;
$new_location = '../../uploads/about/' . $file_name;
move_uploaded_file($photo['tmp_name'], $new_location);

$update = "UPDATE abouts SET photo='$file_name'";
mysqli_query($conn, $update);
$_SESSION['about_photo_update'] = "About photo updated successfully";
header('location: about.php');

