<?php
// session start
session_start();
// db connection
require "../../db.php";
// Get Skill data
$id = $_POST['id'];
$skill_name = $_POST['skill_name'];
$percentage = $_POST['percentage'];
// Update Skill
$sql = "UPDATE skills SET skill_name = '$skill_name', percentage='$percentage' WHERE id='$id'";
$conn->query($sql);
$_SESSION['skill_updated_success'] = "Skill Updated successfully";
header("location:edit.php?id=$id");