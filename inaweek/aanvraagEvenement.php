<!DOCTYPE html>
<html lang="nl">
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
				echo "niet goed";
		}
	}
}
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Speelwerkplaats - Aanvraag</title>
	<meta name="description" content="Het Speelwerkplaats is een duurzame groene speeltuin die energie opwekt." />
	<meta name="keywords" content="Speelwerkplaats, Helmond, Brandevoort, Speelplaats, Speeltuin, Evenementen, Slimme Wijk" />
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
					<span class="sr-only">Navigatie menu</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img src="img/logo.png" data-active-url="img/logo-active.png" alt=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="speelwerkplaats.php">Speelwerkplaats</a></li>
					<li><a href="evenementen.php">Evenementen</a></li>
					<li><a href="aanvraagEvenement.php">Aanvragen</a></li>
<?php
	if(isset($_SESSION['GId'])){
		$user = $userData->GetFirstName() ." ". $userData->GetLastName();
		echo "<li><a href='profilepage.php' class='btn btn-blue'>$user &nbsp;<i class='fa fa-user' style='font-size:20px; vertical-align: middle;'></i></a></li>";
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
				<div class="col-md-12">
						<div class="intro-table intro-table-first" style="width: 100%; height:100%; background-color: #1ABC9C; padding: 20px 70px; margin-bottom: -200px;">
						<form action="" method="POST">
						<h3 class="white heading" style="text-align: center;">Evenementen aanvragen</h3>
						<h5 class="white heading" >Contactgegevens:</h5>
							<input type="text" name="gVname" style="width: 40%; padding: 10px; color: #1ABC9C;" placeholder="Voornaam" required>
							<input type="text" name="gTvg" style="width: 19%; padding: 10px; color: #1ABC9C;" placeholder="Tussen voegsel">
							<input type="text" name="gAname" style="width: 40%; padding: 10px; color: #1ABC9C;" placeholder="Achternaam" required><br/><br/>
							<input type="email" name="gEmail" style="width: 60%; padding: 10px; color: #1ABC9C;"placeholder="E-mail" required>
							<input type="tel" name="gTel" style="width: 39%; padding: 10px; color: #1ABC9C;" placeholder="Telefoonnummer" required><br/><br/>
							<h5 class="white heading">Evenement gegevens:</h5>
							<input type="text" name="eName" style="width: 40%; padding: 10px; color: #1ABC9C;" placeholder="Evenement naam" required>
							<input type="date" name="eDate" style="width: 20%; padding: 10px; color: #1ABC9C;" placeholder="Datum" required>
							<input type="text" name="eBtijd" style="width: 19%; padding: 10px; color: #1ABC9C;" placeholder="Begin tijd" required>
							<input type="text" name="eEtijd" style="width: 19%; padding: 10px; color: #1ABC9C;" placeholder="Eind tijd" required><br/><br/>
							<textarea name="eInhoud" cols="10" rows="10" style="width: 100%; padding: 10px; color: #1ABC9C;" placeholder="Omschrijving van het evenement"  required></textarea> <br/>><br/><br/><br/>
							<button type="submit" name="btAanvraag" class="btn btn-submit">Vraag evenement aan</button><br><br><br>
						</form>
						<?php
						//Connectie includen
						include_once "DataBase.php";
						if(isset($_POST['btAanvraag']))
						{
							//Sla de gegevens op
							$eName = $_POST['eName'];
							$eInhoud = $_POST['eInhoud'];
							$eDate = $_POST['eDate'];
							$eBtijd = $_POST['eBtijd'];
							$eEtijd = $_POST['eEtijd'];
							$gVname = $_POST['gVname'];
							$gTvg = $_POST['gTvg'];
							$gAname = $_POST['gAname'];
							$gEmail = $_POST['gEmail'];
							$gTel = $_POST['gTel'];

							//Connectie als string op slaan
								$connection = $_SESSION['Connection'];
								//Query voor het invoeren van de aanvraag
								$sql = "insert into AanvraagEvenement(aeName, aeInhoud, aeDate, aeBeginTijd, aeEindTijd, aeContactFName, aeContactTVG, aeContactAName, aeContactEmail, aeContactTel) values ('$eName', '$eInhoud', '$eDate', '$eBtijd', '$eEtijd'	, '$gVname', '$gTvg', '$gAname', '$gEmail', '$gTel')";

								//Query uitvoeren + foutafhandeling
								if (!($result = mysqli_query($connection, $sql))) {
						      echo "Er is een fout opgetreden.";
						    }
						    else {
						      echo 'De aanvraag is succesvol aangekomen.';
						    }

							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="services" class="section section-padded">
		<div class="container">

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
							<h4 class="white light">Onze site is online! Bekijk hem eens</h4>
							<h4 class="light-white light">#Brandevoort #InovationIAW #Helmond</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">Kom eens gezellig wat drinken of spelen bij het Speelwerkplaats</h4>
							<h4 class="light-white light">#Gezellig #Speeltuin #Speelwerkplaats</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">Wil jij ook duurzame energie opwekken? Kom dan eens langs</h4>
							<h4 class="light-white light">#GroeneEnergie #Duurzaam #Helmond</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">Je kunt op onze site ook evenementen aanvragen!</h4>
							<h4 class="light-white light">#MovieNights #DansNight #Speelwerkplaats</h4>
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
					<h3 class="white">Openings uren<span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Maandag - Vrijag</h5>
							<h3 class="regular white">9:00 - 22:00</h3>
						</div>
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Zaterdag - Zondag</h5>
							<h3 class="regular white">10:00 - 18:00</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2016 Tom, Kyle, Michelle, Rebecca & Mike <a href="http://www.summa-ict.nl/" target="_blank">SUMMA ICT</a></p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
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