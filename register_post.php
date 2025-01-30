<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$flag = false;
if (empty($name)) {
    $flag = true;
}

if ($flag){
    header("Location: register.php");
    $_SESSION['name_error'] = "Name is required";
} else {
    echo "Signup successful";
}
?>