<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Header
require '../../includes/header.php';
// Select skills
$sql = "SELECT * FROM skills";
$after_assoc = mysqli_query($conn, $sql);
?>
<!---*******************************************
*** Display skill list here
********************************************-->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Skill List</h3>
                <div class="success_message" >
                    <?php
                    if (isset($_SESSION['delete_skill'])) {
                        ?>
                        <strong class="success_message alert alert-danger" style="padding-right: 200px"><?php echo $_SESSION['delete_skill']; ?></strong>
                        <?php

                    }unset($_SESSION['delete_skill']);
                    ?>
                </div>

            </div>
            <div class="card-header">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Skill</th>
                        <th>Percentage</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    foreach ($after_assoc as $index=>$data){
                        ?>
                    <tr>
                        <td><?= $index+=1?></td>
                        <td><?= $data['skill_name']?></td>
                        <td><?= $data['percentage']?></td>
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
    *** Add new skill Here
    ********************************************-->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Add new skill</h3>
                <div class="success_message">
                    <?php
                    if (isset($_SESSION['added_new_skill'])) {
                        ?>
                        <strong class="success_message alert alert-success"><?php echo $_SESSION['added_new_skill']; ?></strong>
                        <?php

                    }unset($_SESSION['added_new_skill']);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <form action="skill_post.php" method="POST">
                    <div class="form-group">
                        <label style="font-size: 15px" for="skill_name" class="form-check-label">Skill Name</label>
                        <input type="text" class="form-control" id="skill_name" name="skill_name" value="">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px" for="percentage" class="form-check-label">Percentage</label>
                        <input type="number" class="form-control" id="percentage" name="percentage" value="">
                    </div>
                    <div class="Error mb-3">
                        <?php
                        if (isset($_SESSION['skill_name_error'])) {
                            ?>
                            <strong class="success_message alert alert-danger" style="padding-right: 200px"><?php echo $_SESSION['skill_name_error']; ?></strong>
                            <?php

                        }unset($_SESSION['skill_name_error']);
                        ?>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Submit</button>
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
