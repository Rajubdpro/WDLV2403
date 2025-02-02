<?php
// session start
session_start();
// db connection
require "../../db.php";

$delid = $_GET['id'];
$sql = "DELETE FROM skills WHERE id='$delid'";
$conn->query($sql);

$_SESSION['delete_skill'] = "Skill Deleted Successfully";
header("location:skill.php");