<div class="large-3 columns end">
	<div class="callout">
		<div class="row">
			
			<div class="large-7 columns">
				<h3><?php echo $red->ime?> <?php echo $red->prezime?></h3>
			</div>
		</div>
		<hr />
		<h5><?php 
		
		echo $red->adresa;
		
		?></h5>
		<h6>Email: <?php echo $red->email ?></h6>
		<h5>Tel: <?php echo $red->telefon ?></h5>
		<div class="row">
			<div class="large-6 columns">
				<a class="expanded success button" href="promjeni.php?sifra=<?php echo $red->sifra ?>">Promjeni</a>
			</div>
			<div class="large-6 columns">
				<a class="expanded alert button" href="obrisi.php?sifra=<?php echo $red->sifra ?>">Obriši</a>
			</div>
		</div>
	</div>
</div>