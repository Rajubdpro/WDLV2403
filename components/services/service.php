<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Header
require '../../includes/header.php';

$sql = "SELECT * FROM services";
$after_assoc = mysqli_query($conn, $sql);
?>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h2>Services List</h2>
               <div class="success_message mb-3" style="display: flex; justify-content: end; margin-top: -50px" >
                    <?php
                    if (isset($_SESSION['delete_service'])) {
                       ?>
                        <strong class="success_message alert alert-danger" style="padding-right: 200px"><?php echo $_SESSION['delete_service']; ?></strong>
                        <?php

                    }unset($_SESSION['delete_service']);
                    ?>
                </div>

            </div>
            <div class="card-header">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Service Name</th>
                        <th>Services Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    foreach ($after_assoc as $index=>$data){
                        ?>
                        <tr>
                            <td><?= $index+=1?></td>
                            <td><?= $data['name']?></td>
                            <td><?= $data['description']?></td>
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
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h2>Add new Service</h2>
            </div>
            <div class="card-body">
                <div class="success_message mb-3">
                    <?php
                    if (isset($_SESSION['added_new_service'])) {
                        ?>
                        <strong class="success_message alert alert-success" style="padding-right: 200px"><?php echo $_SESSION['added_new_service']; ?></strong>
                        <?php

                    }unset($_SESSION['added_new_service']);
                    ?>
                </div>
                <form action="services_post.php" method="POST">
                    <div class="form-group">
                        <label style="font-size: 15px" for="service_name" class="form-check-label">Service Name</label>
                        <input type="text" class="form-control" id="service_name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 15px" for="description" class="form-check-label"> Service Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="">
                    </div>
                    <div class="Error mb-3">
                        <?php
                        if (isset($_SESSION['service_name_error'])) {
                            ?>
                            <strong class="success_message alert alert-danger" style="padding-right: 200px"><?php echo $_SESSION['service_name_error']; ?></strong>
                            <?php

                        }unset($_SESSION['service_name_error']);
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
