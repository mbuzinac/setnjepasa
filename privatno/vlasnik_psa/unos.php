<?php
include_once '../../konfiguracija.php';
if(!isset($_SESSION["autoriziran"])){
	header("location: ../../odjava.php");
}
include_once 'inputPolja.php';
$poruke=array();

if(isset($_POST["dodaj"])){
	
	include_once 'kontrola.php';
	
	if(count($poruke)==0){
		//radi insert
		unset($_POST["dodaj"]);
		$izraz=$veza->prepare("insert into vlasnik_psa 
		(ime,prezime,pas,adresa,email,telefon,lozinka) values 
		(:ime,:prezime,:pas,:adresa,:email,:telefon,:lozinka)");
		$izraz->execute($_POST);
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
				<legend>Unesite podatke</legend>
				
				
				<?php
				 
				inputPolje("text","ime",$poruke);
				inputPolje("text","prezime",$poruke);
				inputPolje("text","pas",$poruke);
				inputPolje("text","adresa",$poruke);
				inputPolje("text","email",$poruke);
				inputPolje("number","telefon",$poruke);
				inputPolje("text","lozinka",$poruke);
				 ?>
				
				
				
			</fieldset>
		
		
		<div class="row">
			<div class="large-6 columns">
				<a class="alert button expanded" href="index.php">Odustani</a>
		
			</div>
			<div class="large-6 columns">
				<input name="dodaj" class="success button expanded" type="submit" value="Dodaj" />
	
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
