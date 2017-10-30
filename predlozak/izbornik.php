<link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">

<nav class="menu">
  <h1 class="name"><i>Šetnje Pasa</i></a></h1>
  <ul class="inline-list">
    <li><a href="<?php echo $putanjaAPP ?>index.php">Početna</a></li>
    <li><a href="<?php echo $putanjaAPP ?>onama.php">O nama</a></li>
    <li><a href="<?php echo $putanjaAPP ?>kontakt.php">Kontakt</a></li>
     <?php if(isset($_SESSION["autoriziran"])): ?>
      	<li><a href="<?php echo $putanjaAPP ?>privatno/setac/index.php">Šetač</a></li>
      	<?php endif; ?>
      	 <?php if(isset($_SESSION["autoriziran"])): ?>
      	<li><a href="<?php echo $putanjaAPP ?>privatno/pas/index.php">Pas</a></li>
      	<?php endif; ?>
      	 <?php if(isset($_SESSION["autoriziran"])): ?>
      	<li><a href="<?php echo $putanjaAPP ?>privatno/setnje/index.php">Šetnje</a></li>
      	<?php endif; ?>
      	 <?php if(isset($_SESSION["autoriziran"])): ?>
      	<li><a href="<?php echo $putanjaAPP ?>privatno/vlasnik_psa/index.php">Vlasnik Psa</a></li>
      	<?php endif; ?>
  </ul>
  <ul class="inline-list account-action">
    <li>
				<?php if(isset($_SESSION["autoriziran"])): ?>
      		<a   href="<?php echo $putanjaAPP ?>odjava.php">Odjavi <?php echo $_SESSION["autoriziran"]->ime . " ". $_SESSION["autoriziran"]->prezime ?> </a>
      		<?php else: ?>
      	<a  data-open="exampleModal1" href="#">Prijava</a>
      	<?php endif; ?>
				
			</li>
			<?php if(isset($_SESSION["autoriziran"])):
				?>
    <li class=""><a class="signup" href="<?php echo $putanjaAPP ?>privatno/nadzornaploca.php" data-reveal-id="<?php echo $putanjaAPP ?>privatno/nadzornaploca.php">Nadzorna Ploča</a></li>
  <li class=""><a class="signup" href="<?php echo $putanjaAPP ?>privatno/era.php" data-reveal-id="<?php echo $putanjaAPP ?>privatno/era.php">Era</a></li>
  </ul><?php endif; ?>
  
  
  <a class="account hide-for-medium-up" href="<?php echo $putanjaAPP ?>privatno/nadzornaploca.php" data-reveal-id="<?php echo $putanjaAPP ?>privatno/nadzornaploca.php"></a>
</nav>


