<?php
include_once '../../konfiguracija.php';
if(!isset($_SESSION["autoriziran"])){
	header("location: ../../odjava.php");
	exit;
}
if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
	header("location: ../../odjava.php");
	exit;
}
include_once 'inputPolja.php';
$poruke=array();


if(isset($_GET["sifra"])){
	if (!is_numeric($_GET["sifra"])){
		header("location: ../../odjava.php");
	//print_r(is_numeric($_GET["sifra"]));
		exit;
	}
	
	$izraz=$veza->prepare("select * from vlasnik_psa where sifra=:sifra");
	$izraz->execute($_GET);
	$_POST = $izraz->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST["promjeni"])){
	
	include_once 'kontrola.php';
	
	if(count($poruke)==0){
		//radi insert
		unset($_POST["promjeni"]);
		$izraz=$veza->prepare("update vlasnik_psa 
		set ime=:ime,
		prezime=:prezime,
		pas=:pas,
		adresa=:adresa, 
		email=:email,
		telefon=:telefon,
		lozinka=:lozinka
		where sifra=:sifra");
		$izraz->execute($_POST);
		//print_r($_POST);
		//exit;
		header("location: index.php");
	}
}

//$poruke["naziv"]="Naziv obavezno";

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
		
		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" 
			method="post">
			<fieldset class="fieldset">
				<legend>Promjenite podatke</legend>
				
				
				<?php
				 
				inputPolje("text","ime",$poruke);
				inputPolje("text","prezime",$poruke);
				inputPolje("text","pas",$poruke);
				inputPolje("text","adresa",$poruke);
				inputPolje("text","email",$poruke);
				inputPolje("number","telefon",$poruke);
				inputPolje("text","lozinka",$poruke);
				 ?>
				
				<input type="hidden" name="sifra" value="<?php echo $_POST["sifra"] ?>" />
				
			</fieldset>
		
		
		<div class="row">
			<div class="large-6 columns">
				<a class="alert button expanded" href="index.php">Odustani</a>
		
			</div>
			<div class="large-6 columns">
				<input name="promjeni" class="success button expanded" type="submit" value="Promjeni" />
	
			</div>
		</div>
		
		</form>
			
		<?php
	include_once "../../predlozak/skripta.php";
		?>
		<script>
			<?php 
			if(!isset($_POST["dodaj"])){
				?>
				$("#naziv").focus();
				<?php
			}else{
				foreach ($poruke as $key => $value) {
					?>
					$("#<?php echo $key ?>").focus();
					<?php
					break;
				}
				?>
				
				<?php
			}
			?>
		</script>
	</body>
</html>
