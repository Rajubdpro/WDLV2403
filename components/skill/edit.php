<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Header
require '../../includes/header.php';
// get id
$id = $_GET['id'];
// get user
$sql = "SELECT * FROM skills WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!---*******************************************
*** Edit Skill Here
********************************************-->
<div class="row">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                <h3>Edit Skill</h3>
                <div class="success_message">
                    <?php
                    if (isset($_SESSION['skill_updated_success'])) {
                        ?>
                        <strong class="success_message alert alert-success"><?php echo $_SESSION['skill_updated_success']; ?></strong>
                        <?php

                    }unset($_SESSION['skill_updated_success']);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <form action="update.php" method="POST" multiple="multiple" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']?>">
                    <div class="form-group">
                        <label for="name">Skill Name</label>
                        <input type="text" name="skill_name" value="<?= $row['skill_name']?>" class="form-control" id="name">
                    </div>
                    <div class="form-group mt-3">
                        <label for="percentage">Percentage</label>
                        <input type="number" name="percentage" value="<?= $row['percentage']?>" class="form-control" id="percentage">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
                    <a href="/WDLV2403/components/skill/skill.php" class="btn btn-primary mt-3">Back<a/>
                </form>
            </div>
        </div>
    </div>

</div>
<?php
// Footer
require "../../includes/footer.php";
?>
