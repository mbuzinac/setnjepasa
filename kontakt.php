<?php include_once 'konfiguracija.php';  ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
   <?php include_once 'predlozak/head.php';  ?>
  </head>
  <body>
  	<?php include_once 'predlozak/izbornik.php';  ?>
    
<?php include_once 'predlozak/prijavamodal.php';?>

<div class="row" style="margin-bottom: 2%; margin-top: 1%;">

			<div id="contactForm" class="small-8 medium-8 large-8 columns">
				<form id="myForm" method="post" data-abide>

					<h5>Kontaktiraj nas</h5>
					<label>Ime i prezime</label>
					<input type="text" placeholder="Ime i prezime" required>

					<label>Email</label>
					<input type="email" placeholder="username@address.com" required>
					
					<label>Poruka</label>
					<textarea rows="3" placeholder="Napiši svoju poruku" required></textarea>										
          
 <input type="submit" class="nice blue radius button" value="Pošalji">
					</button></a>
				</form>
			
			
			</div><!--end 8 columns-->
			<div class="large-4 columns">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d986.7219755685255!2d18.53962399092584!3d45.613232249723076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475d200051b5367b%3A0x488bcd036063cc11!2sRepublike+ul.+21%2C+31208%2C+Petrijevci!5e0!3m2!1shr!2shr!4v1483886689213" 
					width="450" height="450" 
					frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		</div>

<footer class="footer">
  <div class="row">
    <div class="small-12 medium-6 medium-push-6 columns">
      <p class="logo show-for-small-only"><i class="fi-target"></i> Šetnje pasa</p> 
      <form class="footer-form">
        <div class="row">
          <div class="medium-9 medium-push-3 columns">
            <label>
              <label for="email" class="contact">Kontaktiraj nas</label>
              <input type="email" id="email" placeholder="Email Adresa" />
            </label>
          </div>
        </div>
        <div class="row">
          <div class="medium-9 medium-push-3 columns">
            <label>
              <textarea rows="5" id="message" placeholder="Poruka"></textarea>
            </label>
          </div>
          <div class="row">
            <div class="medium-9 medium-push-3 columns">
              <button class="submit" type="submit" value="Submit">Pošalji</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="small-12 medium-6 medium-pull-6 columns">
      <p class="logo hide-for-small-only"><i class="fi-target"></i> Šetnje pasa</p> 
      <p class="footer-links">
        <a href="<?php echo $putanjaAPP ?>index.php">Početna</a>
				<a href="<?php echo $putanjaAPP ?>onama.php">O nama</a>
				<a href="<?php echo $putanjaAPP ?>kontakt.php">Kontakt</a>
       </p>
     	<ul class="inline-list social">
				<a href="https://www.facebook.com/"target="_blank"><i class="fi-social-facebook"></i></a>
				<a href="https://twitter.com/"target="_blank"><i class="fi-social-twitter"></i></a>
				<a href="https://www.linkedin.com/"target="_blank"><i class="fi-social-linkedin"></i></a>
				<a href="https://github.com/"target="_blank"><i class="fi-social-github"></i></a>
			</ul>
      <p class="copywrite">Šetnje pasa © 2017</p>
    </div>
  </div>
</footer>
 <?php include_once 'predlozak/skripta.php'; ?>

  </body>
</html>
