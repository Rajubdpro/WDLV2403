<?php
session_start();
// Session check
require '../session_check.php';
// Database connection
require '../db.php';
// Header
require '../includes/header.php';
?>

<!---- Display all users ---->
<div class="row">
    <div class="col-lg-12 m-auto">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Users</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-vcenter">
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
                                    if($user['id'] != 1){
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
