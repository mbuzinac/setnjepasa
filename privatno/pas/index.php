<?php
include_once '../../konfiguracija.php';
if(!isset($_SESSION["autoriziran"])){
	header("location: ../../odjava.php");
}
$uvjet="";
		if(isset($_GET["uvjet"])){
			$uvjet="%" . $_GET["uvjet"] . "%";
		}else{
			$uvjet="";
		}
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php
		include_once '../../predlozak/head.php';
		?>
	</head>
	<body>
		<?php
		include_once '../../predlozak/izbornik.php';
		?>
		<a class="success button expanded" href="unos.php">Unos Psa</a>
		<div class="row">
			<div class="large-12 ">
				<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
			<input value="<?php echo str_replace("%","", $uvjet); ?>" type="text" name="uvjet" placeholder="dio imena" />
		</form>
			</div>	
   	<div class="row">
		<?php 
		$izraz=$veza->prepare("select * from pas where ime like :uvjet order by sifra desc");
		$izraz->execute(array("uvjet" => $uvjet));
		
		$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
		
		
		foreach ($rezultati as $red):
		
			include 'detaljipsa.php';
		
		endforeach;
		 ?>
		</div>
		</div>

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
	include_once "../../predlozak/skripta.php";
		?>
		
	</body>
</html>
