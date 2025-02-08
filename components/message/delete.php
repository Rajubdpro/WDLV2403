<?php
session_start();
require '../../db.php';

$id = $_GET['id'];
$sql = "DELETE FROM messages WHERE id='$id'";
$conn->query($sql);
$_SESSION['delete']= "Message Deleted Successfully";
header('location:message.php');