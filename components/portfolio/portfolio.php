<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Header
require '../../includes/header.php';
// Select Portfolios Data
$sql = "SELECT * FROM portfolios ORDER BY id DESC ";
$port_res = mysqli_query($conn, $sql);

?>
<!---*******************************************
*** Portfolio List Display Here
********************************************-->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Portfolio List</h2>
                <div class="success_message">
                    <?php
                    if (isset($_SESSION['delete_portfolio'])) {
                        ?>
                        <strong class="success_message alert alert-danger"><?php echo $_SESSION['delete_portfolio']; ?></strong>
                        <?php

                    }unset($_SESSION['delete_portfolio']);
                    ?>
                </div>

            </div>
            <div class="card-header">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $i = 1;
                    foreach ($port_res as $data){
                        ?>
                        <tr>
                            <td><?= $i++?></td>
                            <td><?= $data['title']?></td>
                            <td><?= $data['category']?></td>
                            <td>
                                <img src="/wdlv2403/uploads/portfolio/<?= $data['photo']?>">
                            </td>

                            <td>
                                <a href="status.php?id=<?php echo $data['id']; ?>" class="btn btn-<?= $data['status']==0?'secondary':'success'?>"><?= $data['status']==0?'Deactive':'Active'?></a>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Edit</a>
                                <a style="margin-left: 10px" href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        <tr/>
                        <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>

    <!---*******************************************
    *** Add New Portfolio
    ********************************************-->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Add New Portfolio</h3>
                <div class="success_message">
                    <?php
                    if (isset($_SESSION['added_new_portfolio'])) {
                        ?>
                        <strong class="success_message alert alert-success"><?php echo $_SESSION['added_new_portfolio']; ?></strong>
                        <?php

                    }unset($_SESSION['added_new_portfolio']);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label style="font-size: 15px" for="title" class="form-check-label">Portfolio Name</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Portfolio name">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px" for="category" class="form-check-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Category name">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px" for="photo" class="form-check-label">Category</label>
                        <input type="file" class="form-control" id="photo" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="portfolio_image">
                          <img id="blah" src="/wdlv2403/uploads/user/'.$row['photo'].'" width="300" />'
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Portfolio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Footer
require "../../includes/footer.php";
?>
