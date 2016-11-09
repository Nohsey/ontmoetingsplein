<!DOCTYPE html>
<html lang="en">
<?php
include_once "DataBase.php";
$userData = new DataBaseUser();
$evenementdata = new DataBaseEvenement();
$loginData = new Login();

if(isset($_POST['btlogin']))
{
	if (isset($_POST['usr']) && $_POST['pass']) {

		$usr = $_POST['usr'];
		$pass = $_POST['pass'];

		if ($loginData->LoginFucntion($usr, $pass))
		{
				$user = $userData->GetFirstName() ." ". $userData->GetLastName();
		}
		else {
				echo "niet goe";
		}
	}
}
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ontmoetingsplein</title>
	<meta name="description" content="Het Ontmoetingsplein is een duurzame groene speeltuin die energie opwekt." />
	<meta name="keywords" content="Ontmoetingsplein, Helmond, Brandevoort, Speelplaats, Speeltuin, Evenementen, Slimme Wijk" />
	<meta name="author" content="Michelle Broens, Rebecca Broens, Tom van Kaathoven, Kyle Ritchi & Mike Kotte" />
	<!-- Favicons (created with http://realfavicongenerator.net/)-->
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="img/favicons/manifest.json">
	<link rel="shortcut icon" href="img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="css/owl.css">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="css/cardio.css">
</head>

<body>
	<div class="preloader">
		<img src="img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="img/logo.png" data-active-url="img/logo-active.png" alt=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="#intro">Introductie</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="#">Evenementen</a>
<?php
	if(isset($user)){
		echo "<li><a href='#' class='btn btn-blue'>$user &nbsp;<i class='fa fa-user' style='font-size:20px; vertical-align: middle;'></i></a></li>";
	}
	else{
		echo "<li><a href='#' data-toggle='modal' data-target='#modal1' class='btn btn-blue'>Inloggen</a></li>";
	}
?>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">Samen spelen,</h3>
							<h1 class="white typed">Voor een beter milieu.</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="cut cut-top"></div>
		<div class="container" style="margin-bottom: -200px">
			<div class="row intro-tables">
				<div class="col-md-6">
					<div class="intro-table intro-table-first">
						<h3 class="white heading">Evenementen</h3>
						<div class="owl-carousel owl-schedule bottom">
							<?php

							date_default_timezone_set('CET');


							// Prints something like: Monday

							$datetime = new DateTime(date('l'));


							$datetime1 = new DateTime(date('l'));
							$datetime1->modify('+1 day');


							$datetime2 = new DateTime(date('l'));
							$datetime2->modify('+2 day');


							$dag1 = $datetime->format('l');
							$dag2 = $datetime1->format('l');
							$dag3 = $datetime2->format('l');

								switch ($dag1) {
									case 'Monday':
										$arrayday= ["Maandag", "Dinsdag", "Woensdag"];
										break;
									case 'Tuesday':
										$arrayday= ["Dinsdag", "Woensdag", "Donderdag"];
										break;
									case 'Wednesday':
										$arrayday= ["Woensdag", "Donderdag", "Vrijdag"];
										break;
									case 'Thursday':
										$arrayday= ["Donderdag", "Vrijdag", "Zaterdag"];
										break;
									case 'Friday':
										$arrayday= ["Vrijdag", "Zaterdag", "Zondag"];
										break;
									case 'Saturday':
										$arrayday= ["Zaterdag", "Zondag", "Maandag"];
										break;
									case 'Sunday':
										$arrayday= ["Zondag", "Maandag", "Dinsdag"];
										break;
								}
								$arraydate= [$datetime->format('d-m-Y'), $datetime1->format('d-m-Y'), $datetime2->format('d-m-Y')];
								$arraydatedb = [$datetime->format('Y-m-d'), $datetime1->format('Y-m-d'), $datetime2->format('Y-m-d')];

								for ($i=0; $i < 3; $i++) {

									echo'
										<div class="item">
											<div class="schedule-row row">
												<div class="col-xs-6">
													<h4 class="regular white">'; echo "$arrayday[$i]"; echo'</h4>
												</div>
												<div class="col-xs-6 text-right">
													<h4 class="white">'; echo "$arraydate[$i]"; echo'</h4>
												</div>
											</div>';

																$title =  $evenementdata->GetEventNameOnDate($arraydatedb[$i]);



																if (isset($title[0][0])) {
																	# code...

																	echo'
																		<div class="schedule-row row">
																			<div class="col-xs-6">
																					<h5 class="regular white">'; echo $title[0][0];  echo'</h5>
																			</div>
																			<div class="col-xs-6 text-right">
																				<h5 class="white">8:30 - 10:00</h5>
																			</div>
																		</div>';
																}
																else {
																	echo'
																		<div class="schedule-row row">
																			<div class="col-xs-12">
																				<h5 class="regular white">Geen beschikbare Evenementen</h5>
																			</div>
																		</div>';
																}
																if (isset($title[1][0])) {
																	# code...

																	echo'
																		<div class="schedule-row row">
																			<div class="col-xs-6">
																				<h5 class="regular white">'; echo $title[1][0]; echo'</h5>
																			</div>
																			<div class="col-xs-6 text-right">
																				<h5 class="white">8:30 - 10:00</h5>
																			</div>
																		</div>';
															}
															else {
																echo'
																	<div class="schedule-row row">
																		<div class="col-xs-12">
																			<h5 class="regular white">Geen beschikbare Evenementen</h5>
																		</div>
																	</div>';
															}
															if (isset($title[2][0])) {
																# code...

															echo'
															<div class="schedule-row row">
																<div class="col-xs-6">
																	<h5 class="regular white">'; echo $title[2][0	]; echo'</h5>
																</div>
																<div class="col-xs-6 text-right">
																	<h5 class="white">8:30 - 10:00</h5>
																</div>
															</div>';
														}
														else {
															echo'
																<div class="schedule-row row">
																	<div class="col-xs-12">
																		<h5 class="regular white">Geen beschikbare Evenementen</h5>
																	</div>
																</div>';
														}

														echo'
																<div class="schedule-row row">
																	<div align="center" class="col-xs-12">
																		<a href="#"><h4 class="regular white">More</h4></a>
																	</div>

																</div>
															</div>';

														}


							 ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="intro-table intro-table-third">
						<h5 class="white heading">Happy Clients</h5>
						<canvas id="myChart" width="400" height="200"></canvas>

<script src="js/Chart.js"></script>
<script>
var canvas = document.getElementById('myChart');
var data = {
				labels: ["Energie opgehaald vandaag", "Highscore"],
				datasets: [
								{
												label: "Energie",
												backgroundColor: "white",
												borderWidth: 0,
												hoverBackgroundColor: "white",
												data: [45, 319],
								}
				]
};
var option = {
animation: {
								duration:5000
}

};


var myBarChart = Chart.Bar(canvas,{
		data:data,
		options:option
});
</script>
						<div class="owl-testimonials bottom">

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="services" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Services</h2>
				<h4 class="light muted">Achieve the best results with our wide variety of training options!</h4>
			</div>
			<div class="row services">
				<div class="col-md-4">
					<div class="service home">
						<div class="icon-holder">
							<img src="img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Cardio Training</h4>
						<p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service home">
						<div class="icon-holder">
							<img src="img/icons/guru-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Yoga Pilates</h4>
						<p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service home">
						<div class="icon-holder">
							<img src="img/icons/weight-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Power Training</h4>
						<p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section class="section section-padded blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="owl-twitter owl-carousel">
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="light-white light">#health #training #exercise</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="light-white light">#health #training #exercise</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="light-white light">#health #training #exercise</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Inloggen</h3>
				<form action="" method="POST"  class="popup-form">
					<input type="text" name="usr" class="form-control form-white" placeholder="Gebruikersnaam">
					<input type="password" name="pass" class="form-control form-white" placeholder="Wachtwoord">
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="None" id="squaredOne" name="check" />
							<label for="squaredOne"><span>Onthoud mijn gegevens</span></label>
						</div>
					</div>
					<button type="submit" name="btlogin" class="btn btn-submit">Inloggen</button>
				</form>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Reserve a Free Trial Class!</h3>
					<h5 class="light regular light-white">Shape your body and improve your health.</h5>
					<a href="#" class="btn btn-blue ripple trial-button">Start Free Trial</a>
				</div>
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Opening Hours <span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Mon - Fri</h5>
							<h3 class="regular white">9:00 - 22:00</h3>
						</div>
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Sat - Sun</h5>
							<h3 class="regular white">10:00 - 18:00</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2015 All Rights Reserved. Powered by <a href="http://www.phir.co/">PHIr</a> exclusively for <a href="http://tympanus.net/codrops/">Codrops</a></p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://www.twitter.com/codrops"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/101095823814290637419"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<!-- Scripts -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.onepagenav.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
