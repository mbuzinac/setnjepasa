<div class="large-3 columns end">
	<div class="callout">
		<div class="row">
			<div class="large-5 columns">
				<img src="img/<?php 
				
				if(file_exists("img/" . $red->ime . ".jpg")){
					echo  $red->ime;
				}else{
					echo "dogprofil";
				}
				
				
				
				?>.jpg" alt="" />
			</div>
			<div class="large-7 columns">
				<h1><?php echo $red->ime?></h1>
			</div>
		</div>
		<hr />
		<h6><?php 
		
		echo $red->opis;
		
		?></h6>
		<h2><?php echo $red->spol ?></h2>
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