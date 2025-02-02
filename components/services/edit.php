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
$sql = "SELECT * FROM services WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Services</h2>
            </div>
            <div class="card-body">
                <div class="success_message mb-3">
                    <?php
                    if (isset($_SESSION['service_updated_success'])) {
                        ?>
                        <strong class="success_message alert alert-success" style="padding-right: 200px"><?php echo $_SESSION['service_updated_success']; ?></strong>
                        <?php
                    }unset($_SESSION['service_updated_success']);
                    ?>
                </div>
                <form action="update.php" method="POST" multiple="multiple" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']?>">
                    <div class="form-group">
                        <label for="name">Service Name</label>
                        <input type="text" name="name" value="<?= $row['name']?>" class="form-control" id="name">
                    </div>
                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <input type="text" name="description" value="<?= $row['description']?>" class="form-control" id="description">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update Service</button>
                    <a href="/WDLV2403/components/services/service.php" class="btn btn-primary mt-3">Back<a/>
                </form>
            </div>
        </div>
    </div>

</div>
<?php
// Footer
require "../../includes/footer.php";
?>
