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



if(isset($_GET["sifra"])){
	if (!is_numeric($_GET["sifra"])){
		header("location: ../../odjava.php");
	//print_r(is_numeric($_GET["sifra"]));
		exit;
	}
	
	$izraz=$veza->prepare("select count(setac) from setnja where setac=:sifra");
	$izraz->execute($_GET);
	$ukupnosetnja = $izraz->fetchColumn();
}


if(isset($_POST["obrisi"])){
	
	
		unset($_POST["obrisi"]);
		$izraz=$veza->prepare("delete from setac 
		where sifra=:sifra");
		$izraz->execute($_POST);
		//print_r($_POST);
		//exit;
		header("location: index.php");
	
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
			
				
				<input type="hidden" name="sifra" value="<?php echo $_GET["sifra"] ?>" />
				
		
		
		<div class="row">
			<div class="large-6 columns">
				<a class="alert button expanded" href="index.php">Odustani</a>
		
			</div>
			<div class="large-6 columns">
				<?php if($ukupnosetnja==0): ?>
				<input name="obrisi" class="success button expanded" type="submit" value="Da, siguran sam: OBRIŠI" />
				<?php else:?>
					Setac se ne može obrisati jer je prijavljen za šetnju
					<?php endif;?>
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
