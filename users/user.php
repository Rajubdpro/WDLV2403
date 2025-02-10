<?php
session_start();
// Session check
require '../session_check.php';
// Database connection
require '../db.php';
// Header
require '../includes/header.php';
// Select login user
$logged_id = $_SESSION['logged_id'];
$sql = "SELECT * FROM users WHERE id = '$logged_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!---***************************************
*  Display All User Here
***************************************--->
<div class="row">
    <div class="col-lg-12 m-auto">
        <div class="card card-default">
            <div class="card-header  d-flex justify-content-between align-items-center">
                <h2>Users</h2>
                <div class="success_message">
                    <?php
                    if (isset($_SESSION['delete_user'])) {
                        ?>
                        <strong class="success_message alert alert-success"><?php echo $_SESSION['delete_user']; ?></strong>
                        <?php

                    }unset($_SESSION['delete_user']);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-vcenter display"  id="myTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM users";
                        $users = mysqli_query($conn, $sql);
                        $i = 1;
                        foreach ($users as $user){
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>
                                    <?php
                                    if ($user['photo'] == '') {
                                        echo '<img src="/wdlv2403/uploads/user/default_user.png" width="250" />';
                                    } else {
                                        echo '<img src="/wdlv2403/uploads/user/'.$user['photo'].'" width="250" />';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td>
                                    <a href="user_edit.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Edit</a>
                                    <?php
                                    if($user['id'] !=$logged_id){
                                        ?>
                                        <a href="user_delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
// Footer
require '../includes/footer.php';
?>
