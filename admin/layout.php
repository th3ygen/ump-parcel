<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

session_start();

include('../config.php');
include('../common/db.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
        session_destroy();

        header('Location: ' . URL . '/index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/admin-dashboard.css">
</head>

<body>
    <?php
    if (!isset($_SESSION['userid'])) {
        return header('Location: ' . URL . '/login.php');
    }

    $query = 'SELECT * FROM user WHERE id = ' . $_SESSION['userid'];

    $firstName = '';
    $lastName = '';
    $subName = '';

    if ($res = $mysqli->query($query)) {
        if ($res->num_rows > 0) {
            $user = $res->fetch_assoc();

            $firstName = $user['firstname'];
            $lastName = $user['lastname'];
            $subName = (isset($user['matrixId'])) ? $user['matrixId'] : $user['email'];
        } else {
            header('Location: ' . URL . '/login.php');
        }
    } else {
        header('Location: ' . URL . '/login.php');
    }

    ?>

    <section class="wrapper">
        <section class="topbar">
            <div class="title">UMP Parcel - Dashboard</div>
            <nav class="group-navs">
                <a href="#" class="nav active">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div>1337</div>
                    </div>
                    All
                </a>
                <a href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div>1337</div>
                    </div>
                    KK1
                </a>
                <a href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div>1337</div>
                    </div>
                    KK2
                </a>
                <a href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div>1337</div>
                    </div>
                    KK3
                </a>
                <a href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div>1337</div>
                    </div>
                    KK4
                </a>
                <a href="#" class="nav">
                    <div class="value">
                        <i class="fas fa-user"></i>
                        <div>1337</div>
                    </div>
                    KK5
                </a>
            </nav>
            <div class="date">
                <div class="day">Monday</div>
                <div class="date">11 Nov 1337</div>
            </div>
            <a href="?action=logout" class="btn-logout">
                <i class="fas fa-door-open"></i>
                Logout
            </a>
            <div class="bg"></div>
        </section>
        <section class="sidebar">
            <div class="header">
                <div class="bg">
                    <div class="stripe-1"></div>
                    <div class="stripe-2"></div>
                </div>
            </div>
            <div class="logo">
                <img src="../res/logo/Logo UMP-Official.png" alt="">
            </div>

            <div class="body">
                <div class="user-details">
                    <div class="avatar">
                        <div class="photo">
                            <img src="../res/placeholder/user-photo.jpg" alt="">
                        </div>
                        <div class="role">Admin</div>
                    </div>
                    <div class="title">
                        <div class="name"><?php echo $firstName ?></div>
                        <div class="sub"><?php echo $subName ?></div>
                    </div>
                </div>

                <nav class="navlinks">
                    <a href="./dashboard.php" class="link active">
                        <i class="far fa-chart-bar"></i>
                        Dashboard
                    </a>
                    <a href="./users.php" class="link">
                        <i class="fas fa-user-friends"></i>
                        Manage users
                    </a>
                </nav>
            </div>


        </section>

        <section class="content"></section>
    </section>
</body>

</html>