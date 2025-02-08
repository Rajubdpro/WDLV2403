<?php
session_start();
// Db connection
require '../../db.php';
// Get it
$id = $_GET['id'];
// Delete message
$sql = "DELETE FROM messages WHERE id='$id'";
$conn->query($sql);
$_SESSION['delete']= "Message Deleted Successfully";
header('location:message.php');