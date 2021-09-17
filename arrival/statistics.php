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
	<title> Goods Arrival Statistics | UMP Parcel</title>
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<style>
		.b-skills {
			border-top: 1px solid #f9f9f9;
			padding-top: 46px;
			text-align: center;
		}

		.b-skills:last-child {
			margin-bottom: -30px;
		}

		.b-skills h2 {
			margin-bottom: 50px;
			font-weight: 900;
			text-transform: uppercase;
		}

		.skill-item {
			position: relative;
			max-width: 250px;
			width: 100%;
			margin-bottom: 30px;
			color: #555;
		}

		.chart-container {
			position: relative;
			width: 100%;
			height: 0;
			padding-top: 100%;
			margin-bottom: 27px;
		}

		.skill-item .chart,
		.skill-item .chart canvas {
			position: absolute;
			top: 0;
			left: 0;
			width: 100% !important;
			height: 100% !important;
		}

		.skill-item .chart:before {
			content: "";
			width: 0;
			height: 100%;
		}

		.skill-item .chart:before,
		.skill-item .percent {
			display: inline-block;
			vertical-align: middle;
		}

		.skill-item .percent {
			position: relative;
			line-height: 1;
			font-size: 40px;
			font-weight: 900;
			z-index: 2;
		}

		.skill-item .percent:after {
			content: attr(data-after);
			font-size: 20px;
		}

		p {
			font-weight: 900;
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

		<section id="s-team" class="section">
			<div class="b-skills">
				<div class="container">
					<h2>Month-by-Month Statistics on Goods Counts (%)</h2>

					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="skill-item center-block">
								<div class="chart-container">
									<div class="chart " data-percent="92" data-bar-color="#23afe3">
										<span class="percent" data-after="%">92</span>
									</div>
								</div>

								<p>Number of Goods in FEB</p>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="skill-item center-block">
								<div class="chart-container">
									<div class="chart " data-percent="78" data-bar-color="#a7d212">
										<span class="percent" data-after="%">78</span>
									</div>
								</div>

								<p>Number of Goods in MARCH</p>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="skill-item center-block">
								<div class="chart-container">
									<div class="chart " data-percent="95" data-bar-color="#ff4241">
										<span class="percent" data-after="%">95</span>
									</div>
								</div>

								<p>Number of Goods in APRIL</p>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="skill-item center-block">
								<div class="chart-container">
									<div class="chart " data-percent="65" data-bar-color="#edc214">
										<span class="percent" data-after="%">65</span>
									</div>
								</div>

								<p>Number of Goods in MAY</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<br>
		<center>
			<a href="index.php">Click Here for Back</a>
		</center>
		<br><br>


		<script src="plugins/jquery-2.2.4.min.js"></script>
		<script src="plugins/jquery.appear.min.js"></script>
		<script src="plugins/jquery.easypiechart.min.js"></script>
		<script>
			'use strict';

			var $window = $(window);

			function run() {
				var fName = arguments[0],
					aArgs = Array.prototype.slice.call(arguments, 1);
				try {
					fName.apply(window, aArgs);
				} catch (err) {

				}
			};

			/* chart
			================================================== */
			function _chart() {
				$('.b-skills').appear(function() {
					setTimeout(function() {
						$('.chart').easyPieChart({
							easing: 'easeOutElastic',
							delay: 3000,
							barColor: '#369670',
							trackColor: '#fff',
							scaleColor: false,
							lineWidth: 21,
							trackWidth: 21,
							size: 250,
							lineCap: 'round',
							onStep: function(from, to, percent) {
								this.el.children[0].innerHTML = Math.round(percent);
							}
						});
					}, 150);
				});
			};


			$(document).ready(function() {

				run(_chart);


			});
		</script>
		<!--Circlr Pie-->

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