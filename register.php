<?php
// Session Start
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Website development using php</title>
    <!---bootstrap css--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!---style.css--->
    <link href="assets/style.scss" rel="stylesheet">
    <!---Favicon icon--->
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>
<body>

<!---***************************************
* User Register form here with error message
***************************************--->

<section class="wrapper">
    <div class="form signup">
        <header>Signup</header>
        <form action="register_post.php" method="POST">
            <!--- success message after registration success-->
            <div class="success_message">
                <?php
                if (isset($_SESSION['success'])) {
                    ?>
                    <strong class="success_message alert alert-success" style="padding-right: 140px"><?php echo $_SESSION['success']; ?></strong>
                    <?php

                }unset($_SESSION['success']);
                ?>
            </div>
            <input type="text" name="name" placeholder="Full name" />
            <!--name error message-->
            <div class="name_error">
                <?php
                if (isset($_SESSION['name_error'])) {
                    ?>
                    <strong class="error_message"><?php echo $_SESSION['name_error']; ?></strong>
                <?php

                }unset($_SESSION['name_error']);
                ?>
            </div>
            <input type="email" name="email" placeholder="Email address" />

            <!--email error message-->
            <div class="name_error">
                <?php
                if (isset($_SESSION['email_error'])) {
                    ?>
                    <strong class="error_message"><?php echo $_SESSION['email_error']; ?></strong>
                    <?php

                }unset($_SESSION['email_error']);
                ?>
            </div>
            <input type="password" name="password" placeholder="Password" />
            <!--email error message-->
            <div class="name_error">
                <?php
                if (isset($_SESSION['password_error'])) {
                    ?>
                    <strong class="error_message"><?php echo $_SESSION['password_error']; ?></strong>
                    <?php
                }unset($_SESSION['password_error']);
                ?>
            </div>
            <input type="submit" value="Signup" />
        </form>
    </div>
    <div class="form login">
        <header><a class="login_btn" href="/wdlv2403/login.php" >Login<a/></header>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>