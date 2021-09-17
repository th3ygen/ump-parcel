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
    <title>Error | UMP Parcel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
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
                        <h2 class="mt-5 mb-3">Invalid Request</h2>
                        <div class="alert alert-danger">Sorry, you've made an invalid request. Please <a href="report_index.php" class="alert-link">go back</a> and try again.</div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <td>
            <center>
                <img src="images/ump.jpg" height="260" width="90%">
        </td>
        </center>
        <br>

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