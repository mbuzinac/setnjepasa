<?php
include_once '../../konfiguracija.php';
if(!isset($_SESSION["autoriziran"])){
	header("location: ../../odjava.php");
}
include_once 'inputPolja.php';
$poruke=array();

if(isset($_POST["dodaj"])){
			
		$dp = DateTime::createFromFormat($formatDatumaPHP,$_POST["vrijeme_pocetka"]);
	
	if(!$dp){
 		$poruke["vrijeme_pocetka"]="Format datum nije dobar";
 	}
	{
			
		$dz = DateTime::createFromFormat($formatDatumaPHP,$_POST["vrijeme_zavrsetka"]);
		
		
	
	
	if(!$dz){
 		$poruke["vrijeme_zavrsetka"]="Format datum nije dobar";
 	}}
	include_once 'kontrola.php';
	
	if(count($poruke)==0){
		//radi insert
		unset($_POST["dodaj"]);
		$izraz=$veza->prepare("insert into usluga_setanja_psa
		(vrsta,mjesto,vrijeme_pocetka,vrijeme_zavrsetka,cijena) values 
		(:vrsta,:mjesto,:vrijeme_pocetka,:vrijeme_zavrsetka,:cijena)");
		
		$izraz->bindParam("vrsta",$_POST["vrsta"]);
	    $izraz->bindParam("mjesto",$_POST["mjesto"]);

	
	if($_POST["vrijeme_pocetka"]==""){
		$izraz->bindValue("vrijeme_pocetka",$t=null,PDO::PARAM_NULL);
	}else{
		$izraz->bindParam("vrijeme_pocetka",$dp->format("Y-m-d H:i"));
	}
	
	
	if($_POST["vrijeme_zavrsetka"]==""){
		$izraz->bindValue("vrijeme_zavrsetka",$t=null,PDO::PARAM_NULL);
	}else{
		$izraz->bindParam("vrijeme_zavrsetka",$dz->format("Y-m-d H:i"));
	}
		$izraz->bindParam("cijena",$_POST["cijena"]);
		$izraz->execute();
		//$zadnji = $veza->lastInsertId();
		header("location: index.php");
	}else{
		//print_r($poruke);
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
		<link rel="stylesheet" type="text/css" href="<?php echo $putanjaAPP ?>css/datetimepicker.css"/>
		<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}

</style>
	</head>
	<body>
		<?php
		include_once '../../predlozak/izbornik.php';
		?>
		
		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" 
			method="post">
			<fieldset class="fieldset">
				<legend>Unesite podatke</legend>
				
				<label>
			 	<input type="radio" name="vrsta" value="pojedinacna">Pojedinačna</input>
                <input type="radio" name="vrsta" value="grupna">Grupna</input>
			 </label>	<?php if (isset($poruke["spol"])): ?>
				<p class="help-text" id="vrstaPomoc"><?php echo $poruke["vrsta"]; ?></p>
				<?php endif;  ?>
	

</label>
<?php if (isset($poruke["pas"])): ?>
				<p class="help-text" id="vlasnikPomoc"><?php echo $poruke["vlasnik"]; ?></p>
				<?php endif;  ?>
				
		
		
		
				<?php
			
				inputPolje("text","mjesto",$poruke);
				inputPolje("text","vrijeme_pocetka",$poruke);
				inputPolje("text","vrijeme_zavrsetka",$poruke);
				inputPolje("text","cijena",$poruke);
			
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

	<script src="<?php echo $putanjaAPP ?>js/datetimepicker.full.js"></script>
		<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/



$.datetimepicker.setLocale('hr');

$('#vrijeme_pocetka').datetimepicker();
$('#vrijeme_zavrsetka').datetimepicker();


</script>
			
	</body>
</html>