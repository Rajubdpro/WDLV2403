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
// get portfolio
$sql = "SELECT * FROM portfolios WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
    <!---*******************************************
    *** Edit Portfolio here
    ********************************************-->
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
                    <h2>Edit Portfolio</h2>
                    <div class="success_message">
                        <?php
                        if (isset($_SESSION['portfolio_updated_success'])) {
                            ?>
                            <h5 class="success_message alert alert-success"><?php echo $_SESSION['portfolio_updated_success']; ?></h5>
                            <?php
                        }unset($_SESSION['portfolio_updated_success']);
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <form action="update.php" method="POST" multiple="multiple" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $row['id']?>">
                        <div class="form-group">
                            <label for="title">Portfolio Title</label>
                            <input type="text" name="title" value="<?= $row['title']?>" class="form-control" id="title">
                        </div>
                        <div class="form-group mt-3">
                            <label for="category">Portfolio Category</label>
                            <input type="text" name="category" value="<?= $row['category']?>" class="form-control" id="category">
                        </div>
                        <div class="mt-2">
                            <label for="logo" style="font-size: 17px">Upload photo</label>
                            <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="form-group mt-3">
                            <img width="150" src="../../uploads/portfolio/<?= $row['photo']?>" id="blah" />
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Portfolio</button>
                        <a href="/WDLV2403/components/portfolio/portfolio.php" class="btn btn-primary mt-3">Back<a/>
                    </form>
                </div>
            </div>
        </div>

    </div>
<?php
// Footer
require "../../includes/footer.php";
?>
