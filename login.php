
<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Development Using PHP</title>
    <!---bootstrap css--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <!---style.css--->
    <link href="assets/style.scss" rel="stylesheet">
    <!---Favicon icon--->
    <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>
<body>

<!---***************************************
* login form here with error message
***************************************--->

<section class="wrapper">
    <div class="form SingIn">
        <header>Login</header>
        <form action="login_post.php" method="POST">
            <!--- success message after registration success-->
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
            <input type="submit" value="Sign In" />
        </form>
    </div>
    <div class="form login">
        <header><a href="/wdlv2403/register.php">Register</a></header>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


