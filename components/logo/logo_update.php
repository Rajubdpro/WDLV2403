<?php
global $conn;
session_start();
// Db connect file
require "../../db.php";
// Collect logo
$header_logo = $_FILES['header_logo'];
$footer_logo = $_FILES['footer_logo'];

// Upload header logo and delete old header logo
if($_POST['sub'] == 0) {
    $select = "SELECT * FROM logos";
    $select_res = mysqli_query($conn, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);
    $delete_from = '../../uploads/logo/' . $after_assoc['header_logo'];
    unlink($delete_from);

    $after_explode = explode('.', $header_logo['name']);
    $extension = end($after_explode);
    $file_name = uniqid() . '.' . $extension;
    $new_location = '../../uploads/logo/' . $file_name;
    move_uploaded_file($header_logo['tmp_name'], $new_location);

    $update = "UPDATE logos SET header_logo='$file_name'";
    mysqli_query($conn, $update);
    $_SESSION['update_header_logo'] = "Header logo updated successfully";
    header('location: logo.php');
}else{
    // Upload header logo and delete old header logo
    // Fetch existing footer_logo from DB
    $select = "SELECT * FROM logos LIMIT 1";
    $select_res = mysqli_query($conn, $select);
    if ($select_res && mysqli_num_rows($select_res) > 0) {
        $after_assoc = mysqli_fetch_assoc($select_res);
        $delete_from = '../../uploads/logo/' . $after_assoc['footer_logo'];

        // Check if file exists before deleting
        if (file_exists($delete_from)) {
            unlink($delete_from);
        }
    }

    // Process new logo upload
    $after_explode = explode('.', $footer_logo['name']);
    $extension = end($after_explode);
    $file_name = uniqid() . '.' . $extension;
    $new_location = '../../uploads/logo/' . $file_name;

    if (move_uploaded_file($footer_logo['tmp_name'], $new_location)) {
        // Update database with new file name
        $update = "UPDATE logos SET footer_logo='$file_name'";
        mysqli_query($conn, $update);
        $_SESSION['update_footer_logo'] = "Footer logo updated successfully";
        header('Location: logo.php');
        exit();
    } else {
        header('Location: logo.php');
    }
}
// End code