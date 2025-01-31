<?php
session_start();
require 'session_check.php';
require 'db.php';
require 'includes/header.php';

?>

    <div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Dashboard</h2>
                </div>
                <div class="card-body">
                    <h1>Welcome to, <?= $row['name']?></h1>
                </div>
            </div>
        </div>
    </div>



<?php
// footer
require 'includes/footer.php';
?>
