<?php
session_start();
// Database Connection
require '../../db.php';

// Set Time Zone
date_default_timezone_set('Asia/Dhaka');
$date = date('Y/m/d');

// Collect Message Data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$flag = $flag;

// Name check
if (empty($name)){
    $flag = true;
    $_SESSION['name_error'] = 'Please write your name';
    header("location:../../index.php#contact");
}
// Email Check
if (empty($email)){
    $flag = true;
    $_SESSION['email_error'] = 'Please write your email';
    header("location:../../index.php#contact");
}
// Subject Check
if (empty($subject)){
    $flag = true;
    $_SESSION['sub_error'] = 'Please write your subject';
    header("location:../../index.php#contact");
}
// Message Check
if (empty($message)){
    $flag = true;
    $_SESSION['message_error'] = 'Please write your message';
    header("location:../../index.php#contact");
}
// Check form validation and insert data
if ($flag){
    header("location:../../index.php#contact");
}else{
    $sql = "INSERT INTO messages(name, email, subject, message, created_at) VALUES ('$name', '$email', '$subject', '$message', '$date')";
    $result = $conn->query($sql);
    $_SESSION['Message_success'] = 'Message send successfully';
    header("location:../../index.php#contact");

}
