<div class="column medium-4">

	<ul class="pricing-table no-bullet text-center">
		<li class="title">
			Vrsta: <?php echo $red->vrsta ?>
		</li>
		<li class="price">
			Mjesto: <?php echo $red->mjesto ?>
		</li>
		<li class="description">
			Pocetak:
			<?php 
			
			
				$d = strtotime($red->vrijeme_pocetka);
				if($d!=""){
			echo date($formatDatumaPHP, $d ); 
			}else{
				echo "&nbsp;";
			}
			?>
		</li>
		<li>
			Zavrsetak: <?php echo $red->vrijeme_zavrsetka ?>
		</li>
		<li>
			Cijena: <?php echo $red->cijena ?> kn
		</li>
		
		
		<li>
			<a class="button" href="promjena.php?sifra=<?php echo $setnja->sifra ?>">Upiši se</a>
		</li>
	</ul>

</div>