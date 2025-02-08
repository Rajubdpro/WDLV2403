<?php
// session start
session_start();
// db connection
require "../../db.php";
// Get Id
$delid = $_GET['id'];
// Delete Skill
$sql = "DELETE FROM skills WHERE id='$delid'";
$conn->query($sql);
// Set session and redirect
$_SESSION['delete_skill'] = "Skill Deleted Successfully";
header("location:skill.php");