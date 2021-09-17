<!-- 
    author: NUR NAJWA BINTI AB RAHMAN CB19117
    MODULE 4
 -->
 <?php
session_start();

include('../config.php');
include('../common/db.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
        session_destroy();

        header('Location: ' . URL . '/login.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'del') {
        $query = 'DELETE FROM user WHERE id = ' . $_POST['id'];

        $mysqli->query($query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | Goods list</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/admin-dashboard.css">
    <link rel="stylesheet" type="text/css" href="CSS.css">
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

    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">Scan QR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="qrcode"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <section class="wrapper">
        <section class="topbar">
            <div class="title">UMP Parcel - Manage users</div>

            <div class="date" id="datetime">
                <div class="day"></div>
                <div class="date"></div>
            </div>
            <a href="#" onclick="logout()" class="btn-logout">
                <i class="fas fa-door-open"></i>
                Logout
            </a>
            <a href="#" class="btn-profile" onclick="selectUpdateUser('<?php echo $_SESSION['username']; ?>');">
                <i class="fas fa-cog"></i>
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
                            <img src="../res/placeholder/user-photo.png" alt="">
                        </div>
                        <div class="role"><?php echo $_SESSION['role']; ?></div>
                    </div>
                    <div class="title">
                        <div class="name"><?php echo $firstName ?></div>
                        <div class="sub"><?php echo $subName ?></div>
                    </div>
                </div>

                <nav class="navlinks">
                    <a href="#" class="link active">
                        <i class="far fa-chart-bar"></i>
                        Goods
                    </a>
                    <a href="./report.php" class="link">
                        <i class="fas fa-user-friends"></i>
                        Report
                    </a>
                    <a href="../complaint" class="link">
                        <i class="fas fa-user-friends"></i>
                        Complain
                    </a>
                </nav>
            </div>


        </section>

        <section class="content">
            <link rel="stylesheet" type="text/css" href="CSS.css">
            <h1 style="text-align:center;">Good List</h1>
            <table border="1" cellpadding="4" class="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tracking Number</th>
                        <th>Pos Services</th>
                        <th>Arrived Date</th>
                        <th>Status</th>
                        <th>QR</th>
                    </tr>
                </thead>
                <?php

                include "controller.php";
                $query = mysqli_query($mysqli, "SELECT trackingNum, postService, dateArrived, status FROM parcel WHERE ownerId=" . $_SESSION['userid'])
                ?>
                <tbody>
                    <?php if (mysqli_num_rows($query) > 0) { ?>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row["trackingNum"]; ?></td>
                                <td><?php echo $row["postService"]; ?></td>
                                <td><?php echo $row["dateArrived"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
                                <?php
                                if ($row['status'] == 'Collected') {
                                ?>
                                    <td>
                                        <button onclick="scanQr('<?php echo $row['trackingNum']; ?>')">Scan QR</button>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>

                        <?php $no++;
                        } ?>
                    <?php } ?>
                </tbody>
            </table>

            <p>*Deliver: The parcel that the student will receives.<br>
                *Collected:The parcel that the student can collect at Pusat Mel.<br>
                *Receives:Student already take the parcel.<br></p>
            </center>

            <center><a href=#HOME><button class="button">HOME</button></a><a href=goodlist2.php><button class="button">NEXT</button></a></center>
        </section>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./lib/qr/qrcode.min.js"></script>

    <script>
        function updateDateTime() {
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            // datetime
            const now = new Date(Date.now());

            const datetimeElem = document.querySelector('#datetime');

            datetimeElem.querySelector('.day').innerHTML = days[now.getDay()];
            datetimeElem.querySelector('.date').innerHTML = now.toString().split(' ').splice(1, 4).join(' ');
        }
    </script>

    <script>
        let qrCode = new QRCode(document.getElementById("qrcode"), "http://localhost/sites/ump-parcel/recipient/setReceived.php?");
;
        const scanQr = trackNum => {
            qrCode.makeCode("http://localhost/sites/ump-parcel/recipient/setReceived.php?trackNum="+trackNum);

            $('#qrModal').modal('toggle');
        };

        const logout = async () => {
            const confirm = await swal({
                title: 'Are you sure',
                text: 'You are about to logout from the system',
                icon: 'warning',
                buttons: true
            });

            if (confirm) {
                window.location.href = '?action=logout';
            }
        };

        window.onload = function() {
            updateDateTime()
            setInterval(() => updateDateTime(), 1000);
        };
    </script>
</body>

</html>