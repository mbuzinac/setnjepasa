<?php
include_once '../konfiguracija.php';
if(!isset($_SESSION["autoriziran"])) {
	header("location: ../odjava.php");
}
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php
		include_once '../predlozak/head.php';
		?>
	</head>
	<body>
		<?php
		include_once '../predlozak/izbornik.php';
		?>
<table height="100%" width="100%" valign="top"><tr><td align="center"><img src="<?php echo $putanjaAPP ?>slike/era.png" /></td></tr></table>
	
  
  
  <footer class="footer">
	<div class="row">
		<div class="small-12 medium-6 medium-push-6 columns">
			<p class="logo show-for-small-only">
				<i class="fi-target"></i> Šetnje pasa
			</p>
			<form class="footer-form">
				<div class="row">
					<div class="medium-9 medium-push-3 columns">
						<label> <label for="email" class="contact">Kontaktiraj nas</label>
							<input type="email" id="email" placeholder="Email Adresa" />
						</label>
					</div>
				</div>
				<div class="row">
					<div class="medium-9 medium-push-3 columns">
						<label> 							<textarea rows="5" id="message" placeholder="Poruka"></textarea> </label>
					</div>
					<div class="row">
						<div class="medium-9 medium-push-3 columns">
							<button class="submit" type="submit" value="Submit">
								Pošalji
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="small-12 medium-6 medium-pull-6 columns">
			<p class="logo hide-for-small-only">
				<i class="fi-target"></i> Šetnje pasa
			</p>
			<p class="footer-links">
				<a href="<?php echo $putanjaAPP ?>index.php">Početna</a>
				<a href="<?php echo $putanjaAPP ?>onama.php">O nama</a>
				<a href="<?php echo $putanjaAPP ?>kontakt.php">Kontakt</a>
			</p>
				<ul class="inline-list social">
				<a href="https://www.facebook.com/"target="_blank"><i class="fi-social-facebook"></i></a>
				<a href="https://twitter.com/"target="_blank"><i class="fi-social-twitter"></i></a>
				<a href="https://www.linkedin.com/"target="_blank"><i class="fi-social-linkedin"></i></a>
				<a href="https://github.com/"target="_blank"><i class="fi-social-github"></i></a>
			</ul>
			<p class="copywrite">
				Šetnje pasa © 2017
			</p>
		</div>
	</div>
</footer>
		<?php
	include_once '../predlozak/skripta.php';
		?>
		<script src="<?php echo $putanjaAPP ?>js/highcharts.js"></script>
		<script src="<?php echo $putanjaAPP ?>js/exporting.js"></script>

	</body>
</html>
