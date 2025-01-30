<?php
session_start();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.scss" rel="stylesheet">
</head>
<body>

<section class="wrapper">
    <div class="form signup">
        <header>Signup</header>
        <form action="register_post.php" method="POST">
            <input type="text" name="name" placeholder="Full name" />
            <div class="name_error">
                <?php
                if (isset($_SESSION['name_error'])) {
                    ?>
                    <span class="text-danger"><?php echo $_SESSION['name_error']; ?></span>
                <?php

                }unset($_SESSION['name_error']);
                ?>

            </div>
            <input type="text" name="email" placeholder="Email address" />
            <input type="password" name="password" placeholder="Password" />
            <input type="submit" value="Signup" />
        </form>
    </div>
    <div class="form login">
        <header>Login</header>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>