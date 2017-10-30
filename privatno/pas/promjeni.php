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
	
	$izraz=$veza->prepare("select * from pas where sifra=:sifra");
	$izraz->execute($_GET);
	$_POST = $izraz->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST["promjeni"])){
	
	include_once 'kontrola.php';
	
	if(count($poruke)==0){
		//radi insert
		unset($_POST["promjeni"]);
		$izraz=$veza->prepare("update pas 
		set ime=:ime,
		rasa=:rasa,
		spol=:spol, 
		opis=:opis,
		vlasnik_psa=:vlasnik_psa,
		slika=:slika,
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
				
				
				 <label>
			 	<input type="radio" name="spol" value="M">Muško </input>
                <input type="radio" name="spol" value="Ž">Žensko</input>
			 </label>	<?php if (isset($poruke["spol"])): ?>
				<p class="help-text" id="spolPomoc"><?php echo $poruke["spol"]; ?></p>
				<?php endif;  ?>
				
				<?php
				 
				inputPolje("text","ime",$poruke);
				inputPolje("text","rasa",$poruke);
				inputPolje("text","opis",$poruke);
				
				?>
		<label> Vlasnik
<select id="vlasnik" name="vlasnik_psa" aria-describedby="vlasnikPomoc">
	<option value="0">Odaberite Vlasnika psa</option>
		
	<?php 
	$izraz=$veza->prepare("select * from vlasnik_psa");
		$izraz->execute();
		$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
		
		foreach ($rezultati as $red):
			
		?>
		<option <?php 
		if(isset($_POST["vlasnik_psa"]) && $_POST["vlasnik_psa"]==$red->sifra){
			echo " selected=\"selected\" ";
		} 
		?> value="<?php echo $red->sifra ?>" ><?php echo $red->ime ?> <?php echo $red->prezime ?></option>
		<?php
		endforeach;
	
	?>
</select>
</label>
<?php if (isset($poruke["vlasnik_psa"])): ?>
				<p class="help-text" id="vlasnikPomoc"><?php echo $poruke["vlasnik"]; ?></p>
				<?php endif;  ?>
		
				<?php
				 
				inputPolje("text","slika",$poruke);
				
				
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
