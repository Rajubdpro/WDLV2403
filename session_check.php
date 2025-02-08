<?php

// Check session
if (!isset($_SESSION['login_success'])) {
    header("Location: login.php");
}
?>