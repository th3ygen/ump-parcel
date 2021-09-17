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
    <title>Student | Report</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/admin-dashboard.css">
    <link rel="stylesheet" type="text/css" href="CSS.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
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
                    <a href="./dashboard.php" class="link">
                        <i class="far fa-chart-bar"></i>
                        Goods
                    </a>
                    <a href="./users.php" class="link active">
                        <i class="fas fa-user-friends"></i>
                        Report
                    </a>
                    <a href="./users.php" class="link active">
                        <i class="fas fa-user-friends"></i>
                        Complain
                    </a>
                </nav>
            </div>


        </section>

        <section class="content">
            <h2 style=text-align:center>Report</h2>
            <!--THIS PART TO COUNT ALL DATA ALREADY INTO DATABASE GROUP "arrivedDate"-->
            <?php
            function isDateBetweenDates(DateTime $date, DateTime $startDate, DateTime $endDate)
            {
                return $date > $startDate && $date < $endDate;
            }

            /* select all */
            $query = "SELECT * FROM parcel where recipientName='NUR NAJWA'";

            $monthly = array();
            $weekly = array();
            $daily = array();
            $lastMonth = array();

            if ($res = mysqli_query($mysqli, $query)) {
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_array()) {
                        $date = new DateTime(date($row['dateArrived']));

                        // daily
                        if (isDateBetweenDates($date, new DateTime(date('d-m-Y')), new DateTime(date('d-m-Y') . ' ' . '23:59:59'))) {
                            array_push($daily, $row);
                        }

                        // weekly
                        if (isDateBetweenDates($date, new DateTime(date('d-m-Y')), new DateTime(date('d-m-Y', strtotime('+1 week'))))) {
                            array_push($weekly, $row);
                        }

                        // monthly
                        if (isDateBetweenDates($date, new DateTime(date('d-m-Y')), new DateTime(date('d-m-Y', strtotime('+1 month'))))) {
                            array_push($monthly, $row);
                        }

                        // last month
                        if (isDateBetweenDates($date, new DateTime(date('d-m-Y', strtotime('-1 month'))), new DateTime(date('d-m-Y')))) {
                            array_push($lastMonth, $row);
                        }
                    }
                }
            }
            ?>

            <div class="containers">
                <div class="boxs">
                    <div class="title">Total Parcel</div>
                    <div class="contents">
                        <div class="items">
                            <div class="item">
                                <div class="label">Daily total parcel</div>
                                <div class="value">
                                    <?php echo count($daily) ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label">Weekly total parcel</div>
                                <div class="value">
                                    <?php echo count($weekly) ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label">Monthly total parcel</div>
                                <div class="value">
                                    <?php echo count($monthly) ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label">Last month total parcel</div>
                                <div class="value">
                                    <?php echo count($lastMonth) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <center>
                <div style="float:right">
                    <b> LIST PARCEL </b>
                    <form action="REPORT.php" method="get">
                        <label>POST SERVICES :</label>
                        <input type="text" name="cari">
                        <input type="submit" value="Search">
                    </form>

                    <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        echo "<b>Showing result for : " . $cari . "</b>";
                    }
                    ?>

                    <table border="2px solid powderblue"" cellpadding=" 2" class="table1">
                        <tr>
                            <th>No</th>
                            <th>Tracking Number</th>
                            <th>Post Services</th>
                            <th>Recipient Name</th>
                            <th>Status</th>


                        </tr>
                        <?php
                        // this part is search function for to found out parcel by insert Post service name
                        if (isset($_GET['cari'])) {
                            $cari = $_GET['cari'];
                            $data = mysqli_query($mysqli, "select * from parcel where postService like '%" . $cari . "%'");
                        } else {
                            $data = mysqli_query($mysqli, "select * from parcel");
                        }
                        $no = 1;
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d["trackingNum"]; ?></td>
                                <td><?php echo $d['postService']; ?></td>
                                <td><?php echo $d['recipientName']; ?></td>
                                <td><?php echo $d['status']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
            </center>
            </div>

            <?php

            // This part for graf that according to post services categories.

            $query = "SELECT postService, count(*) as number FROM parcel GROUP BY postService";
            $result = mysqli_query($mysqli, $query);
            ?>
            <div style="float:left" border="2px solid powderblue">
                <center>
                    <b>PARCEL BY POST SERCIVE</b>

                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['postService', 'Number'],
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "['" . $row["postService"] . "', " . $row["number"] . "],";
                                }
                                ?>
                            ]);
                            var options = {
                                //is3D:true,  
                                pieHole: 1.4
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                            chart.draw(data, options);
                        }
                    </script>

                    <br><br>
                    <div>
                        <div id="piechart" style="width: 500px; height: 400px;"></div>

                    </div>
                </center>
            </div>

        </section>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   

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