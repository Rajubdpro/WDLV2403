<?php
global $conn;
session_start();
// Db connection
require "../../db.php";
// Get skill details
$skill_name = $_POST['skill_name'];
$percentage = $_POST['percentage'];
$flag = false;
// Check skill validation and Update
if(empty($skill_name && $percentage)){
    $flag = true;
    $_SESSION['skill_name_error'] = 'Provide name with percentage';
    header('location:skill.php');
}else{
    $sql = "INSERT INTO skills(skill_name, percentage) VALUES ('$skill_name', '$percentage')";
    mysqli_query($conn, $sql);
    $_SESSION['added_new_skill'] = "New Skill Added Successfully";
    header("location:skill.php");

}


