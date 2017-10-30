<div class="large-3 columns end">
	<div class="callout">
		<div class="row">
			<div class="large-5 columns">
				<img src="img/<?php 
				
				if(file_exists("img/" . $red->sifra . ".jpg")){
					echo  $red->sifra;
				}else{
					echo "nepoznato";
				}
				
				
				
				?>.jpg" alt="" />
			</div>
			<div class="large-7 columns">
				<h3><?php echo $red->ime . " " . $red->prezime ?></h3>
			</div>
		</div>
		<hr />
		<h6><?php echo $red->email;?></h6>
		<h4>Tel: <?php echo $red->telefon;?></h4>
		<h2><?php echo $red->mjesto ?></h2>
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