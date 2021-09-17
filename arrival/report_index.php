<!-- 
    author: JOACHIM A/L AGOSTAIN CA20017
    MODULE 2
 -->
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Parcel Report List</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>

    <header>
        <img src="images/logo.png" style="float:left" alt="student" height="50px" width="40px">
        <h2>UMP Parcel</h2>

    </header>
    <ul class="uln">
        <li class="lia"><a href="">Homepage</a></li>
        <li class="lia"><a href="index.php">Goods Arrival</a></li>
        <li class="lia"><a href="">Good Collection</a></li>
        <li class="lia"><a href="">Recipient</a></li>
        <li class="lia"><a href="">Complaints</a></li>
        <li class="lia" style="float:right"><a href="account.php">Manage Account</a></li>
    </ul>

    <div id="wrapper" class="active">
        <!-- Sidebar -->

        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" id="sidebar">
                <li><a href="index.php">Good Arrival</a></li>
                <li><a href="track_parcel.php">Track Parcel</a></li>
                <li><a href="report_index.php">Reports List</a></li>
                <li><a href="circle_pie.php"> Status Pie Chart</a></li>
                <li><a href="statistics.php">Statistics</a></li>
                <li><a href="statistics_count.php">Statistics Counts</a></li>
            </ul>
        </div>


        <!-- Page content -->
        <div id="page-content-wrapper">
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    <div class="col-md-14">
                        <div class="container">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">

                            <h3 class="pull-left">Parcel Report List | UMP Parcel</h3>
                            <br><br>
                            <a href="report_create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Record</a>
                        </div>
                        <?php
                        // Include config file
                        require_once "report_config.php";

                        // Attempt select query execution
                        $sql = "SELECT * FROM report";
                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>#</th>";
                                echo "<th>Name</th>";
                                echo "<th>Address</th>";
                                echo "<th>Parcel</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>" . $row['parcel'] . "</td>";
                                    echo "<td>";
                                    echo '<a href="report_read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                    echo '<a href="report_update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                    echo '<a href="report_delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else {
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        // Close connection
                        mysqli_close($link);
                        ?>
                        <br>
                        <center>
                            <a href="index.php">Click Here for Back</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <!--SEARCH FOR USERS -->

        <div class="order-list">
            <div class="search-box">
                <input type="text" placeholder="Search for Users" />
                <button>Search

                    <i class="fa fa-search"></i>
                </button>
            </div>
            <br>

            <div class="header">
                <div class="hdr-item">UserId</div>
                <div class="hdr-item">Student Name</div>
                <div class="hdr-item">Phone Number</div>
                <div class="hdr-item">Parcel Receive</div>
                <div class="hdr-item">Report</div>
                <div class="hdr-item">
                    <div class="status">
                        <button>
                            Status
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <ul class="dropdown">
                            <li class="all">All Users</li>
                            <li class="active">Active</li>
                            <li class="not-active">Not Active</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="list-item item-active">
                <div class="list-col">CA20017</div>
                <div class="list-col">JOACHIM AUGUSTINE</div>
                <div class="list-col">01123891223</div>
                <div class="list-col">8</div>
                <div class="list-col">3</div>
                <div class="list-col yeah">Active</div>
                <div class="list-col-icon">
                    <a href="#" class="icon-style trash">
                        <icon class="fa fa-user-times" title="Deactivate"></icon>
                    </a>
                </div>
            </div>
            <div class="list-item item-active">
                <div class="list-col">CA19144</div>
                <div class="list-col">MUHAMMAD AIDIL </div>
                <div class="list-col">0165128948</div>
                <div class="list-col">15</div>
                <div class="list-col">4</div>
                <div class="list-col yeah">Active</div>
                <div class="list-col-icon">
                    <a href="#" class="icon-style trash">
                        <icon class="fa fa-user-times" title="Deactivate"></icon>
                    </a>
                </div>
            </div>
            <div class="list-item item-not-active">
                <div class="list-col">CB20027</div>
                <div class="list-col">MUHAMMAD AMMERUL</div>
                <div class="list-col">0123570838</div>
                <div class="list-col">10</div>
                <div class="list-col">3</div>
                <div class="list-col not">Not Active</div>
                <div class="list-col-icon">
                    <a href="#" class="icon-style trash">
                        <!-- <icon class="fa fa-user" title="Activate"></icon> -->
                        <icon class="fas fa-user-check" title="Activate"></icon>
                    </a>
                </div>
            </div>
            <div class="list-item item-active">
                <div class="list-col">CD19045</div>
                <div class="list-col">NURAIN FITRI </div>
                <div class="list-col">0174377038</div>
                <div class="list-col">8</div>
                <div class="list-col">0</div>
                <div class="list-col yeah">Active</div>
                <div class="list-col-icon">
                    <a href="#" class="icon-style trash">
                        <icon class="fa fa-user-times" title="Deactivate"></icon>
                    </a>
                </div>
            </div>

            <div class="list-item item-not-active">
                <div class="list-col">CB19117</div>
                <div class="list-col">NUR NAJWA </div>
                <div class="list-col">0174377038</div>
                <div class="list-col">12</div>
                <div class="list-col">1</div>
                <div class="list-col not">Not Active</div>
                <div class="list-col-icon">
                    <a href="#" class="icon-style trash">
                        <!-- <icon class="fa fa-user" title="Activate"></icon> -->
                        <icon class="fas fa-user-check" title="Activate"></icon>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <tr>
        <td>
            <footer class="container-fluid" style="background-color:#0A1133; width:100%;">
                <center>
                    <div class="container">
                        <div class="row footer1">

                            <div class="col-sm-3">
                                <p>ABOUT US</p>
                                <label>Our UMP-Parcel aims to efficiently deliver mail and parcel to students and recipient within a resonable time frame.</label>
                            </div>

                            <div class="col-sm-3">
                                <p>UNIVERSITY MALAYSIA PAHANG INFORMATION</p>
                                <ul class="list-unstyled">
                                    Address: Universiti Malaysia Pahang, 26600 Pekan, Pahang
                                    <br>
                                    <img src="images/contact.png"> &nbsp +609 424 5000
                                    <br>
                                    <img src="images/email.png"> &nbsp pro@ump.edu.myp
                                </ul>
                            </div>

                            <div class="col-sm-3">
                                <p>USEFUL LINKS</p>
                                <ul class="list-unstyled">
                                    <li><a href="https://www.ump.edu.my/en">UMP Frontpage | Official Portal</a> </li>
                                    <li><a href="https://kalam.ump.edu.my/login/index.php">UMP Knowledge and Learning Management System</a> </li>
                                    <li><a href="https://udas.ump.edu.my/login/forgot_password.php">UMP Digital Assessment System</a> </li>
                                    <li><a href="https://community.ump.edu.my/ecommstaff/login_eccom/">UMP E-Community System</a> </li>
                                </ul>
                            </div>

                            <div class="col-sm-3">
                                <p>UMP NEWSLETTER SIGN UP</p>

                                <ul class="list-unstyled">
                                    <li></li>
                                    <li><input type="email" class="form-control" id="emailtxt" placeholder="Enter Your Email" name="email" /><br> </li>
                                    <li><button type="submit" id="btnsubmit" class="btn btn-default footerbtn">SUBMIT</button>
                                    <li><br></li>
                                    <li>
                                        <div class="footer1-border">
                                            <a href="https://www.facebook.com/universiti.malaysia.pahang/"><img src="images/fb-footer.png"></a>
                                            <a href="https://twitter.com/umpmalaysia?lang=en"><img src="images/twitter-footer.png"></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="footer2">

                            <div class="row">

                                <div class="col-sm-6">
                                    <strong style="float:left;color:gray;"> ©UMP Parcel Management System 2021. All right reserved</strong>
                                </div>

                                <div class="col-sm-6">
                                    <div style="float:right;">
                                        <img src="images/master.png">
                                        <img src="images/visa.png">
                                        <img src="images/american-express.png">
                                        <img src="images/discover.png">
                                    </div>
                                </div>

                            </div>

                        </div>
                </center>
            </footer>
        </td>
    </tr>
    </tbody>
    </table>

</body>

</html>