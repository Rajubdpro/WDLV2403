<?php
session_start();
// Session check
require '../../session_check.php';
// Database connection
require '../../db.php';
// Header
require '../../includes/header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM messages WHERE id = '$id'";
$reselt = $conn->query($sql);
$data = mysqli_fetch_assoc($reselt);

$update = "UPDATE messages SET status=1 WHERE id='$id'";
$conn->query($update);

?>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h2>View Message</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                        <td><?= $data['name']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $data['email']?></td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td><?= $data['subject']?></td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td><?= $data['message']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>













<?php
// Footer
require "../../includes/footer.php";
?>
<?php