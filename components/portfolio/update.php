<?php
global $conn;
session_start();
require "../../db.php";

$id = $_POST['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$photo = $_FILES['photo'];

// Update portfolio information
if ($photo['name']==''){
    $sql = "UPDATE portfolios SET title='$title', category='$category' WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location:edit.php?id=$id");
    $_SESSION['portfolio_updated_success'] = "portfolio updated successfully!";
}else{
    // Delete old image from folder
    $sql = "SELECT * FROM portfolios WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $old_photo = $row['photo'];
    unlink('../../uploads/portfolio/'.$old_photo);

    // image upload code
    $photo_name = $photo['name'];
    $photo_tmp_name = $photo['tmp_name'];
    $photo_ext = explode('.', $photo_name);
    $photo_actual_ext = strtolower(end($photo_ext));
    $allowed = array('jpg', 'jpeg', 'png');
    $photo_name_new = uniqid('', true).".".$photo_actual_ext;
    $photo_destination = '../../uploads/portfolio/'.$photo_name_new;
    move_uploaded_file($photo_tmp_name, $photo_destination);
    $sql = "UPDATE portfolios SET title='$title', category='$category', photo='$photo_name_new' WHERE id='$id'";
    mysqli_query($conn, $sql);
    $_SESSION['portfolio_updated_success'] = "Portfolio updated successfully!";
    header("Location:edit.php?id=$id");

}
