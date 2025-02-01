<?php
// Check session
session_start();
// session check
require '../session_check.php';
// database connection
require '../db.php';
// header
require '../includes/header.php';

// get id
$id = $_GET['id'];
// get user
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>


<div class="row">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit User</h2>
            </div>
            <div class="card-body">
                <form action="user_update.php" method="POST" multiple="multiple" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']?>">
                    <div class="success_message mb-3">
                        <?php
                        if (isset($_SESSION['user_updated_success'])) {
                            ?>
                            <strong class="success_message alert alert-success" style="padding-right: 500px"><?php echo $_SESSION['user_updated_success']; ?></strong>
                            <?php

                        }unset($_SESSION['user_updated_success']);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?= $row['name']?>" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group mt-3">
                    <label for="email">Email address</label>

                        <input type="email" name="email" value="<?= $row['email']?>" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group mt-3">
                    <label for="photo">Photo</label>
                        <input type="file" name="image" class="form-control" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <?php
                    if (isset($_SESSION['image_error'])) {
                        ?>
                        <strong style="color: #ff523a; font-size: 17px" class="error_message"><?php echo $_SESSION['image_error']; ?></strong>
                        <?php

                    }unset($_SESSION['image_error']);
                    ?>
                    <div class="user_image">

                        <?php
                        if ($row['photo'] == '') {
                            echo '<img src="/wdlv2403/uploads/user/default_user.png" width="100" />';
                        } else {
                            echo '<img id="blah" src="/wdlv2403/uploads/user/'.$row['photo'].'" width="100" />';
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <form action="user_password_update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id']?>">
                    <div class="success_message mb-3">
                        <?php
                        if (isset($_SESSION['password_success'])) {
                            ?>
                            <strong class="success_message alert alert-success" style="padding-right: 500px"><?php echo $_SESSION['password_success']; ?></strong>
                            <?php

                        }unset($_SESSION['password_success']);
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Current Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                        <?php
                        if (isset($_SESSION['password_error'])) {
                            ?>
                            <strong style="color: #ff523a; font-size: 17px" class="error_message"><?php echo $_SESSION['password_error']; ?></strong>
                            <?php
                        }unset($_SESSION['password_error']);
                        ?>
                    </div>
                    <div class="form-group mt-3">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter new password">
                    </div>
                    <div class="form-group mt-3">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter confirm password">
                    </div>
                    <div class="password_error">
                        <?php
                        if (isset($_SESSION['password_match_error'])) {
                            ?>
                            <strong style="color: #ff523a; font-size: 17px" class="error_message"><?php echo $_SESSION['password_match_error']; ?></strong>
                            <?php
                        }unset($_SESSION['password_match_error']);
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>

</div>





<?php
// Footer
require '../includes/footer.php';

?>
