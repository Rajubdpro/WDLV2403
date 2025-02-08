<?php
global $conn;
session_start();
// Db connection
require "../../db.php";
// Collect Form Data
$title = $_POST['title'];
$category = $_POST['category'];
$photo = $_FILES['photo'];

// Customize File
$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);
$file_name = uniqid(). '.' . $extension;

// Set New location
$new_location = "../../uploads/portfolio/".$file_name;
move_uploaded_file($photo['tmp_name'], $new_location);
// Insert Data
$sql = "INSERT INTO portfolios(title, category, photo) VALUES ('$title', '$category', '$file_name')";
$result = mysqli_query($conn, $sql);
$_SESSION['added_new_portfolio']="Portfolio Added successfully";
header("location:portfolio.php");
