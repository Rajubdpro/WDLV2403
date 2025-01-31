<?php
// Check session
session_start();
// session check
require '../session_check.php';
// database connection
require '../db.php';
// header
require '../includes/header.php';

// get id
$id = $_GET['id'];
// get user
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>


<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit User</h2>
            </div>
            <div class="card-body">
                <form action="user_update.php" method="POST" multiple="multiple" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?= $row['name']?>" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group mt-3">
                    <label for="email">Email address</label>

                        <input type="email" name="email" value="<?= $row['email']?>" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group mt-3">
                    <label for="photo">Photo</label>
                        <input type="file" name="image" class="form-control" id="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="user_image">
                        <img id="blah" src="" alt="User Image" width="200" />
                    </div>
                    <input type="hidden" name="id" value="<?= $row['id']?>" class="form-control" id="photo">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>





<?php
// Footer
require '../includes/footer.php';

?>
