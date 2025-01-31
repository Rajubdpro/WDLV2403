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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <a href="user_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="user_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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
