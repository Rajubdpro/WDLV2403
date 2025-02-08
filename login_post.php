<?php
session_start();
// db connect file
require 'db.php';

// Get form data from login.php form and validate it here
$email = $_POST['email'];
$password = $_POST['password'];

// Validate password with at least one uppercase, one lowercase, one number and one special character
$upa = preg_match('@[A-Z]@', $password);
$lowa = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);
$flag = false;

// Check if the form data is empty or not and set error message accordingly in session variable and redirect to login.php
// check email is empty or not and validate email format
if (empty($email)) {
    $flag = true;
    $_SESSION['email_error'] = "Email is required";
}else{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
        $_SESSION['email_error'] = "Invalid email format";
    }
}

// check password is empty or not and validate password length
if (empty($password)) {
    $flag = true;
    $_SESSION['password_error'] = "Password is required";
}else{
    if (strlen($password) < 6) {
        $flag = true;
        $_SESSION['password_error'] = "Password must be at least 6 characters";
    } elseif (!$upa || !$lowa || !$number || !$specialChars) {
        $flag = true;
        $_SESSION['password_error'] = "Password must contain at least one uppercase, one lowercase, one number and one special character";
    }
}

// If there is any error then redirect to login.php page with error message else show success message
if ($flag){
    header("Location: login.php");
} else {
    // Check if the email exists in the database
    $sql = "SELECT COUNT(*) as total FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    $after_assoc = $result->fetch_assoc();
    if ($after_assoc['total'] == 0) {
        $_SESSION['email_error'] = "Email does not exist";
        header("Location: login.php");
    } else {
        // Check if the password is correct
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        $after_assoc2 = $result->fetch_assoc();
        if (password_verify($password, $after_assoc2['password'])) {
            $_SESSION['login_success'] = "Login successful";
            $_SESSION['logged_id'] = $after_assoc2['id'];
            header("Location: dashboard.php");
        } else {
            $_SESSION['password_error'] = "Password is incorrect";
            header("Location: login.php");
        }
    }
}

?>