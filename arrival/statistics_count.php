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
	<link rel="stylesheet" type="text/css" href="css/responsive_count_style.css" />

	<link rel="stylesheet" type="text/css" href="css/count_bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/count_style_statistics.css" />

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

	<title> Goods Arrival Statistics Counts | UMP Parcel</title>

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
					<center>
						<h2>Statistics on Goods Counts</h2>
					</center>

					<!--Goods Status COUNT-->
					<div class="project-counter-wrp">
						<ul>
							<li>
								<i class="fa fa-briefcase"></i>
								<p id="number1" class="number">10</p>
								<span></span>
								<p>* Total Number Of Goods Arrived *</p>
							</li>
							<li>
								<i class="fa fa-smile-o"></i>
								<p id="number2" class="number">6</p>
								<span></span>
								<p>* Number Of Goods Received *</p>
							</li>
							<li>
								<i class="fa fa-coffee"></i>
								<p id="number3" class="number">4</p>
								<span></span>
								<p>* Number Of Goods Not-Delivered *</p>
							</li>
						</ul>
					</div>


					<script>
						var arrived = setInterval(goodsarrived, 10)
						var collected = setInterval(goodscollected, 10)
						var notdelivered = setInterval(notdelivered, 10)
						let count1 = 1;
						let count2 = 1;
						let count3 = 1;

						function goodsarrived() {
							count1++
							document.querySelector("#number1").innerHTML = count1
							if (count1 == 10) {
								clearInterval(arrived)
							}
						}

						function goodscollected() {
							count2++
							document.querySelector("#number2").innerHTML = count2
							if (count2 == 6) {
								clearInterval(collected)
							}
						}

						function notdelivered() {
							count3++
							document.querySelector("#number3").innerHTML = count3
							if (count3 == 4) {
								clearInterval(notdelivered)
							}
						}
					</script>
					<!--Goods Status COUNT END-->

					<center>
						<a href="index.php">Click Here for Back</a>
					</center>
					<br>

					<!--Responsive Counter up Animation-->

					<div class="counter-up">
						<div class="content">
							<div class="box">
								<div class="icon"><i class="fas fa-users"></i></div>
								<div class="counter">50</div>
								<div class="text">Total Students</div>
							</div>
							<div class="box">
								<div class="icon"><i class="fas fa-gift"></i></div>
								<div class="counter">10</div>
								<div class="text">Goods Arrived</div>
							</div>
							<div class="box">
								<div class="icon"><i class="fas fa-history"></i></div>
								<div class="counter">6</div>
								<div class="text">Goods Received</div>
							</div>
							<div class="box">
								<div class="icon"><i class="fas fa-award"></i></div>
								<div class="counter">4</div>
								<div class="text">Goods Not-Delivered</div>
							</div>
						</div>
					</div>

					<script>
						$(document).ready(function() {
							$('.counter').counterUp({
								delay: 10,
								time: 1200
							});
						});
					</script>

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