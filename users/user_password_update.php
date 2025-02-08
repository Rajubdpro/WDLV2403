<?php
// session check
session_start();
// database connection
require '../db.php';
// get id
$id = $_POST['id'];
$password = $_POST['password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
// check password and confirm password verification
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(password_verify($password, $row['password'])){
    // Validate password with at least one uppercase, one lowercase, one number and one special character
    if ($new_password != $confirm_password) {
        $_SESSION['password_match_error'] = "New password and confirm password does not match";
        header("Location: user_edit.php?id=$id");
    }else{
        $upa = preg_match('@[A-Z]@', $new_password);
        $lowa = preg_match('@[a-z]@', $new_password);
        $number = preg_match('@[0-9]@', $new_password);
        $specialChars = preg_match('@[^\w]@', $new_password);
        $flag = false;
        if (strlen($new_password) < 6) {
            $flag = true;
            $_SESSION['password_error'] = "Password must be at least 6 characters";
        } elseif (!$upa || !$lowa || !$number || !$specialChars) {
            $flag = true;
            $_SESSION['password_error'] = "Password must contain at least one uppercase, one lowercase, one number and one special character";
        }
        if ($flag){
            header("Location: user_edit.php?id=$id");
        }else {
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password='$new_password_hash' WHERE id='$id'";
            mysqli_query($conn, $sql);
            header("Location: user_edit.php?id=$id");
            $_SESSION['password_success'] = "Password updated successfully";
        }
    }
}else{
    $_SESSION['password_error'] = "Password does not exist";
    header("Location: user_edit.php?id=$id");
}

?>