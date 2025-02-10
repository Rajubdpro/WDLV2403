<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Header
require '../../includes/header.php';

// Select All About Data Here
$sql = "SELECT * FROM abouts";
$result = $conn->query($sql);
$data = mysqli_fetch_assoc($result);

?>
<div class="row">
    <!----------------Change About Information --------------->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center ">
                <h2 class=""> Change About Information </h2>
                <div class="success_message">
                    <?php
                    if (isset($_SESSION['about_update'])) {
                        ?>
                        <strong class="success_message alert alert-success"><?php echo $_SESSION['about_update']; ?></strong>
                        <?php

                    }unset($_SESSION['about_update']);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <form action="update.php" method="POST">
                <div class="form-group mb-3">
                    <label style="font-size: 14px" for="designation">Designation</label>
                    <input type="text" name="designation" value="<?= $data['designation']?>" id="designation" class="form-control">
                </div>
                    <div class="form-group mb-3">
                    <label style="font-size: 14px" for="name">Name</label>
                    <input type="text" name="name" value="<?= $data['name']?>" id="name" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label style="font-size: 14px" for="watermark">watermark</label>
                    <input type="text" name="watermark" value="<?= $data['watermark']?>" id="watermark" class="form-control">
                </div>
                <div class="form-group mb-3">
                     <label style="font-size: 14px" for="short_des">Short Description</label>
                     <input type="text" name="short_des" value="<?= $data['short_des']?>" id="short_des" class="form-control">
                </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!------------------Change About Photo------------->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class=""> Change About Photo </h2>
                <div class="success_message">
                    <?php
                    if (isset($_SESSION['about_photo_update'])) {
                        ?>
                        <strong class="success_message alert alert-success"><?php echo $_SESSION['about_photo_update']; ?></strong>
                        <?php

                    }unset($_SESSION['about_photo_update']);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <form action="photo_update.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label style="font-size: 14px" for="photo">About Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control" onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="mb-3">
                        <img width="300px" src="../../uploads/about/<?= $data['photo']?>" id="about_image" alt="About Image">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Footer
require '../../includes/footer.php';
?>
