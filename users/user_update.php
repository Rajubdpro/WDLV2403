<?php
// session check
session_start();
// database connection
require '../db.php';
// get id
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$photo = $_FILES['image'];

// Need to write the code for image upload
if ($photo['name']==''){
$sql = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";
mysqli_query($conn, $sql);
    header("Location: user_edit.php?id=$id");
    $_SESSION['user_updated_success'] = "User profile uploaded successfully!";
}else{
    // Delete old image from folder
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $old_photo = $row['photo'];
    unlink('../uploads/user/'.$old_photo);


    // image upload code start here
    $photo_name = $photo['name'];
    $photo_tmp_name = $photo['tmp_name'];
    $photo_size = $photo['size'];
    $photo_error = $photo['error'];
    $photo_ext = explode('.', $photo_name);
    $photo_actual_ext = strtolower(end($photo_ext));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($photo_actual_ext, $allowed)){
        if ($photo_error === 0){
            if ($photo_size < 1000000){
                $photo_name_new = uniqid('', true).".".$photo_actual_ext;
                $photo_destination = '../uploads/user/'.$photo_name_new;
                move_uploaded_file($photo_tmp_name, $photo_destination);
                $sql = "UPDATE users SET name='$name', email='$email', photo='$photo_name_new' WHERE id='$id'";
                mysqli_query($conn, $sql);
                $_SESSION['user_updated_success'] = "User profile uploaded successfully!";
                header("Location: user_edit.php?id=$id");
            }else{
                $_SESSION['image_error'] = "Your file is too big!";
                header("Location: user_edit.php?id=$id");
            }
        }else{
            $_SESSION['image_error'] = "There was an error uploading your file!";
            header("Location: user_edit.php?id=$id");
        }
    }else{
        echo "You cannot upload files of this type!";
        $_SESSION['image_error'] = "You cannot upload files of this type!";
        header("Location: user_edit.php?id=$id");
    }
}


?>