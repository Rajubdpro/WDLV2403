<?php
// session check
require '../session_check.php';
// database connection
require '../db.php';
// get id
$id = $_GET['id'];

// Delete old image from folder
// Delete old image from folder
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$old_photo = $row['photo'];
unlink('../uploads/user/'.$old_photo);



// delete user
$sql = "DELETE FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
header("Location: user.php");

?>