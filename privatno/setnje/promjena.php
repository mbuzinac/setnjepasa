<?php
include_once '../../konfiguracija.php';
if(!isset($_SESSION[$sid . "autoriziran"])){
	header("location: ../../odjava.php");
}

if(!isset($_GET["sifra"]) && !isset($_POST["sifra"])){
	header("location: ../../odjava.php");
	exit;
}

include_once '../../predlozak/inputPolja.php';
$poruke=array();


if(isset($_GET["sifra"])){
	if (!is_numeric($_GET["sifra"])){
		header("location: ../../odjava.php");
	//print_r(is_numeric($_GET["sifra"]));
		exit;
	}
	
	$izraz=$veza->prepare("select * from setnja where sifra=:sifra");
	$izraz->execute($_GET);
	$_POST = $izraz->fetch(PDO::FETCH_ASSOC);
	$d = strtotime($_POST["vrijeme_pocetka"]);
				if($d!=""){
			$_POST["vrijeme_pocetka"] = date( $formatDatumaPHP, $d ); 
			}else{
				$_POST["vrijeme_pocetka"]="";
			}
}

if(isset($_POST["promjeni"])){
	
	$d = DateTime::createFromFormat($formatDatumaPHP,$_POST["vrijeme_pocetka"]);
	
	if(!$d){
 		$poruke["vrijeme_pocetka"]="Format datum nije dobar";
 	}
	
	include_once 'kontrola.php';
	
	if(count($poruke)==0){
		

		
		//radi insert
		unset($_POST["dodaj"]);
		$izraz=$veza->prepare("update  usluga_setanja_psa
		set 
		vrsta=:vrsta,
		mjesto=:mjesto,
		vrijeme_pocetka=:vrijeme_pocetka,
		vrijeme_zavrsetka=:vrijeme_zavrsetka
		where sifra=:sifra");
		$izraz->bindParam("sifra",$_POST["sifra"]);
	$izraz->bindParam("vrsta",$_POST["vrsta"]);
	$izraz->bindParam("mjesto",$_POST["mjesto"]);
	$izraz->bindParam("predavac",$_POST["predavac"]);
	
	if($_POST["vrijeme_pocetka"]==""){
		$izraz->bindValue("vrijeme_pocetka",$t=null,PDO::PARAM_NULL);
	}else{
		$izraz->bindParam("vrijeme_pocetka",$d->format("Y-m-d"));
	}
	
	if($_POST["vrijeme_zavrsetka"]==""){
		$izraz->bindValue("vrijeme_zavrsetka",$t=null,PDO::PARAM_NULL);
	}else{
		$izraz->bindParam("vrijeme_zavrsetka",$d->format("Y-m-d"));
	}
		
		
		$izraz->execute();
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
		<link rel="stylesheet" href="<?php echo $putanjaAPP ?>css/jquery-ui.css">
	</head>
	<body>
		<?php
		include_once '../../predlozak/izbornik.php';
		?>
		
		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" 
			method="post">
			<fieldset class="fieldset">
				<legend>Promjenite podatke</legend>
				
				Polaznici
				
				<input id="uvjet" type="text" />
					<table>
    				<thead>
    					<tr>
    						<th>Ime i prezime</th>
    						<th>Akcija</th>
    					</tr>
    				</thead>
    				<tbody id="podaci">
    					
    				
    			<?php 
    			
				
				
    			
    		
				   	$izraz = $veza->prepare("select 
				   	a.sifra,
				   	a.brojugovora,
				   	 concat(b.ime, ' ', b.prezime) as polaznik,
				   	 count(c.grupa) as ukupno 
				   	 from polaznik a
				   	 inner join osoba b on a.osoba=b.sifra
				   	 left join clan c on a.sifra=c.polaznik 
				   	 where c.grupa=:grupa 
				   	 group by a.sifra,
				   	 a.brojugovora,
				   	 concat(b.ime, ' ', b.prezime)
				   	 order by b.prezime, b.ime ");
						$izraz->execute(array("grupa" => $_POST["sifra"]));
						$rezultati=$izraz->fetchAll(PDO::FETCH_OBJ);
						//d($rezultati);
						
						foreach ($rezultati as $red) :
							?>
							<tr>
								<td><?php echo $red -> polaznik; ?></td>
								<td><a class="polaznik" id="p_<?php echo $red -> sifra; ?>" href="#">Obriši</a>
									</td>
							</tr>
							
							<?php
							endforeach;
				?>
				</tbody>
    			</table>
				
				
				<?php 	include_once 'atributi.php'; ?>
				
				
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
		<script src="<?php echo $putanjaAPP ?>js/jquery-ui.js"></script>
		<script>
			
			$.datepicker.regional['hr'] = {
					closeText : 'Zatvori',
					prevText : 'Prethodni',
					nextText : 'Sljedeći',
					currentText : 'Trenutni',
					monthNames : ['Siječanj', 'Veljača', 'Ožujak', 'Travanj', 'Svibanj', 'Lipanj', 'Srpanj', 'Kolovoz', 'Rujan', 'Listopad', 'Studeni', 'Prosinac'],
					monthNamesShort : ['sij', 'velj', 'ožu', 'tra', 'svi', 'lip', 'srp', 'kol', 'ruj', 'lis', 'stu', 'pro'],
					dayNames : ['Nedjelja', 'Ponedjeljak', 'Utorak', 'Srijeda', 'Četvrtak', 'Petak', 'Subota'],
					dayNamesShort : ['ned', 'pon', 'uto', 'sri', 'čet', 'pet', 'sub'],
					dayNamesMin : ['N', 'P', 'U', 'S', 'Č', 'P', 'S'],
					weekHeader : 'Tjedan',
					dateFormat : '<?php echo $formatDatumaJS; ?>',
					firstDay : 1,
					isRTL : false,
					showMonthAfterYear : false,
					yearSuffix : '',
					changeMonth : true,
					changeYear : true,
					showButtonPanel : true,
					yearRange : '1940:2020'
				};
      	$.datepicker.setDefaults($.datepicker.regional['hr']);
      	
      	 var datum = document.getElementById('datumpocetka').value;
				
		$("#datumpocetka").datepicker();
		$("#datumpocetka").datepicker("option", $.datepicker.regional['hr']);
		$("#datumpocetka").val(datum);
		
		
		
		$("#uvjet").autocomplete({
				    source: "traziPolaznik.php?grupa=<?php echo $_POST["sifra"] ?>",
				    minLength: 3,
				    focus: function( event, ui ) {
				    	event.preventDefault();
				    	},
				    select: function(event, ui) {
				        $(this).val('').blur();
				        event.preventDefault();
				        spremiUBazu(ui.item);
				    }
					}).data( "ui-autocomplete" )._renderItem = function( ul, objekt ) {
				      return $( "<li>" )
				        .append( "<a>" + objekt.ime + " " + objekt.prezime + "</a>" )
				        .appendTo( ul );
				    };
		
		
		
		function spremiUBazu(polaznik){
			if(polaznik.sifra==0){
				return;
			}
				var grupa = <?php echo $_POST["sifra"] ?>;
				
				$.ajax({
				type: "POST",
				url: "dodajPolaznika.php",
				data: "grupa=" + grupa + "&polaznik=" + polaznik.sifra,
				success: function(vratioServer){
					if(vratioServer=="OK"){
						$("#podaci").append("<tr><td>" + polaznik.ime 
						+ " " + polaznik.prezime + "</td><td>" 
						+ "<a href=\"#\" class=\"polaznik\" id=\"p_" + polaznik.sifra + "\">Obriši</a></td></tr>");
						definirajBrisanje();
						$("#uvjet").focus();
					}else{
						alert(vratioServer);
					}
					}
					
				});
			}
		
		
		
		function definirajBrisanje(){
		$(".polaznik").click(function(){
				var grupa = <?php echo $_POST["sifra"]?>;
				var element = $(this);
				var polaznik =element.attr("id").split("_")[1];
				$.ajax({
				type: "POST",
				url: "obrisiPolaznika.php",
				data: "grupa=" + grupa + "&polaznik=" + polaznik,
				success: function(vratioServer){
					if(vratioServer=="OK"){
						element.parent().parent().remove();
					}else{
						alert(vratioServer);
					}
					}
					
				});
				
				
				return false;
			});
		
		}
		
		definirajBrisanje();
		
		</script>
	</body>
</html>
