<?php
session_start();
// session check
require 'session_check.php';
// logout session
session_destroy();
header("Location: login.php");

?>