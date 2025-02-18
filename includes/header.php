<?php
// Select login user
$logged_id = $_SESSION['logged_id'];
$sql = "SELECT * FROM users WHERE id = '$logged_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Get message
$sql_msg = "SELECT * FROM messages ORDER BY id desc ";
$result_msg = mysqli_query($conn, $sql_msg);

// Get total message
$total_msg = "SELECT COUNT(*) as total FROM messages ORDER BY id desc ";
$total_res = mysqli_query($conn, $total_msg);
$after_assoc = mysqli_fetch_assoc($total_res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Development Using PHP</title>
    <!-- core:css -->
    <link rel="stylesheet" href="/wdlv2403/dashboard/assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="/wdlv2403/dashboard/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/wdlv2403/dashboard/assets/fonts/feather-font/css/iconfont.css">
    <!-- Data Table Plugin -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="/wdlv2403/dashboard/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/wdlv2403/dashboard/assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/wdlv2403/dashboard/assets/images/favicon.svg" />

</head>
<body>
<div class="main-wrapper">

    <!---*******************************************
    *** Sidebar start Here
    ********************************************-->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="" class="sidebar-brand">
                <h2>Raju</h2>
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="/wdlv2403/dashboard.php" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">web apps</li>
                <li class="nav-item">
                    <a class="nav-link" href="/wdlv2403/users/user.php" >
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Users</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Components</li>
                <li class="nav-item">
                    <a class="nav-link" href="/WDLV2403/components/logo/logo.php">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Logo</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WDLV2403/components/about/about.php">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WDLV2403/components/skill/skill.php">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Skills</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/WDLV2403/components/services/service.php">
                        <i class="link-icon" data-feather="pie-chart"></i>
                        <span class="link-title">Services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WDLV2403/components/portfolio/portfolio.php">
                        <i class="link-icon" data-feather="layout"></i>
                        <span class="link-title">Portfolio</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/WDLV2403/components/message/message.php">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Message</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
                        <i class="link-icon" data-feather="unlock"></i>
                        <span class="link-title">Authentication</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="authPages">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="/wdlv2403/login.php" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="/wdlv2403/register.php" class="nav-link">Register</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!---*******************************************
    *** Sidebar End Here
    ********************************************-->

    <!---*******************************************
    *** Top Right Nav Menu Start Here
    ********************************************-->

    <div class="page-wrapper">
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1 d-none d-md-inline-block">English</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-apps">
                        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="grid"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="appsDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">Web Apps</p>
                                <a href="javascript:;" class="text-muted">Edit</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="d-flex align-items-center apps">
                                    <a href="pages/apps/chat.html"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
                                    <a href="pages/apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
                                    <a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>
                                    <a href="pages/general/profile.html"><i data-feather="instagram" class="icon-lg"></i><p>Profile</p></a>
                                </div>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:;">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-messages">
                        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="mail"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messageDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium"><?= $after_assoc['total']?> New Message</p>
                                <a href="javascript:;" class="text-muted">Clear all</a>
                            </div>
                            <div class="dropdown-body">
                                <?php
                                foreach ($result_msg as $data){
                                    ?>
                                <a href="view.php?id=<?=$data['id']?>" class="dropdown-item border pt-1 <?=$data['status']==0?'bg-secondary':''?>">
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="<?=$data['status']==0?'text-white':''?>"><?= $data['name']?></p>
                                            <p class="sub-text <?=$data['status']==0?'text-white':''?>"><?= $data['created_at']?></p>
                                        </div>
                                        <p class="sub-text <?=$data['status']==0?'text-white':''?>"><?= $data['subject']?></p>
                                    </div>
                                </a>

                                <?php
                                }
                                ?>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="/wdlv2403/components/message/message.php">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-notifications">
                        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell"></i>
                            <div class="indicator">
                                <div class="circle"></div>
                            </div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">6 New Notifications</p>
                                <a href="javascript:;" class="text-muted">Clear all</a>
                            </div>
                            <div class="dropdown-body">
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="user-plus"></i>
                                    </div>
                                    <div class="content">
                                        <p>New customer registered</p>
                                        <p class="sub-text text-muted">2 sec ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="gift"></i>
                                    </div>
                                    <div class="content">
                                        <p>New Order Recieved</p>
                                        <p class="sub-text text-muted">30 min ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="alert-circle"></i>
                                    </div>
                                    <div class="content">
                                        <p>Server Limit Reached!</p>
                                        <p class="sub-text text-muted">1 hrs ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="layers"></i>
                                    </div>
                                    <div class="content">
                                        <p>Apps are ready for update</p>
                                        <p class="sub-text text-muted">5 hrs ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="download"></i>
                                    </div>
                                    <div class="content">
                                        <p>Download completed</p>
                                        <p class="sub-text text-muted">6 hrs ago</p>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:;">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-profile">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!--- Show user image here --->
                            <?php
                            if ($row['photo'] == '') {
                                echo '<img src="/wdlv2403/uploads/user/default_user.png" width="200" />';
                            } else {
                                echo '<img src="/wdlv2403/uploads/user/'.$row['photo'].'" width="250" />';
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    <?php
                                    if ($row['photo'] == '') {
                                        echo '<img src="/wdlv2403/uploads/user/default_user.png" width="250" />';
                                    } else {
                                        echo '<img src="/wdlv2403/uploads/user/'.$row['photo'].'" width="250" />';
                                    }
                                    ?>
                                </div>
                                <div class="info text-center">
                                    <p class="name font-weight-bold mb-0"><?= $row['name'] ?></p>
                                    <p class="email text-muted mb-3"><?= $row['email'] ?></p>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <ul class="profile-nav p-0 pt-3">
                                    <li class="nav-item">
                                        <a href="/wdlv2403/users/user_edit.php?id=<?= $row['id']?>" class="nav-link">
                                            <i data-feather="edit"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="/wdlv2403/logout.php" class="nav-link">
                                            <i data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!---*******************************************
            *** Top Right Nav Menu End Here
            ********************************************-->
        </nav>

        <!------------------Page Content Loaded from Here---------------->
        <div class="page-content">
