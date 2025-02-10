<?php
// session start
session_start();
// db connection
require "../../db.php";
// Get ID
$id = $_GET['id'];

// Delete old image from folder
$sql = "SELECT * FROM portfolios WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$old_photo = $row['photo'];
unlink('../../uploads/portfolio/'.$old_photo);

// Delete user
$sql = "DELETE FROM portfolios WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$_SESSION['delete_skill'] = "Skill Deleted Successfully";
header("location:portfolio.php");