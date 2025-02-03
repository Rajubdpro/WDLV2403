<?php
global $conn;
session_start();
require "../../db.php";

$title = $_POST['title'];
$category = $_POST['category'];
$photo = $_FILES['photo'];




$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);
$file_name = uniqid(). '.' . $extension;

$new_location = "../../uploads/portfolio/".$file_name;
move_uploaded_file($photo['tmp_name'], $new_location);

$sql = "INSERT INTO portfolios(title, category, photo) VALUES ('$title', '$category', '$file_name')";
$result = mysqli_query($conn, $sql);
$_SESSION['added_new_portfolio']="Portfolio Added successfully";
header("location:portfolio.php");
