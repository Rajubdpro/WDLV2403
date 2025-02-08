<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Header
require '../../includes/header.php';
// get message
$sql = "SELECT * FROM messages ORDER BY id desc ";
$result = mysqli_query($conn, $sql);
?>

    <!---*******************************************
    *** Message List Display Here
    ********************************************-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Messages</h2>
                <div class="delete_message">
                    <?php
                    if (isset($_SESSION['delete'])) {
                        ?>
                        <strong class="success_message alert alert-danger"><?php echo $_SESSION['delete']; ?></strong>
                        <?php

                    }unset($_SESSION['delete']);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($result as $index=>$data){
                        ?>
                    <tr class="<?= $data['status'] ==0?'bg-secondary':''?>">
                        <td><?= $index+=1?></td>
                        <td><?= $data['name']?></td>
                        <td><?= $data['email']?></td>
                        <td><?= $data['subject']?></td>
                        <td><?= $data['message']?></td>
                        <td>
                            <a href="view.php?id=<?= $data['id']?>" class="btn btn-info">View</a>
                            <a href="delete.php?id=<?= $data['id']?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
// Footer
require "../../includes/footer.php";
?>

