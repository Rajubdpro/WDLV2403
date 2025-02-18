<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Header
require '../../includes/header.php';
// Select Logo
$sql = "SELECT * FROM logos";
$result = $conn->query($sql);
$after_assoc = mysqli_fetch_assoc($result);
?>

<!---*******************************************
*** Change logo form here
********************************************-->
<form method="POST" action="logo_update.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Change Header Logo</h3>
                    <div class="success_message">
                        <?php
                        if (isset($_SESSION['update_header_logo'])) {
                            ?>
                            <strong class="success_message alert alert-success"><?php echo $_SESSION['update_header_logo']; ?></strong>
                            <?php

                        }unset($_SESSION['update_header_logo']);
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-2">
                        <label for="logo" style="font-size: 17px">Upload Logo</label>
                        <input type="file" name="header_logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="form-group mt-3">
                        <img width="150" src="../../uploads/logo/<?= $after_assoc['header_logo']?>" id="blah" />
                    </div>
                    <div class="mt-2">
                        <button name="sub" value="0" type="submit" class="btn btn-info btn-lg">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-centers">
                    <h3>Change Footer Logo</h3>
                    <div class="success_message">
                        <?php
                        if (isset($_SESSION['update_footer_logo'])) {
                            ?>
                            <strong class="success_message alert alert-success"><?php echo $_SESSION['update_footer_logo']; ?></strong>
                            <?php

                        }unset($_SESSION['update_footer_logo']);
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-2">
                        <label for="logo" style="font-size: 17px">Upload Logo</label>
                        <input type="file" name="footer_logo" class="form-control" onchange="document.getElementById('footer_logo').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="form-group mt-3">
                        <img width="150" src="../../uploads/logo/<?= $after_assoc['footer_logo']?>" id="footer_logo" />
                    </div>
                    <div class="mt-2">
                        <button name="sub" value="1" type="submit" class="btn btn-info btn-lg">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
// Footer
require '../../includes/footer.php';
?>
