<?php
// session check
require '../session_check.php';
// database connection
require '../db.php';
// get id
$id = $_GET['id'];
// delete user
$sql = "DELETE FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
header("Location: user.php");

?>