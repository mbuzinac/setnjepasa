<link href="<?php echo $putanjaAPP ?>http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">

<header>

	<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
		<ul class="orbit-container">
			<button class="orbit-previous" aria-label="previous">
				<span class="show-for-sr">Previous Slide</span>&#9664;
			</button>
			<button class="orbit-next" aria-label="next">
				<span class="show-for-sr">Next Slide</span>&#9654;
			</button>
			<li class="orbit-slide is-active">
				<img src="<?php echo $putanjaAPP ?>slike/slika1.jpg" alt="" />
			</li>
			<li class="orbit-slide">
				<img src="<?php echo $putanjaAPP ?>slike/slika4.jpg" alt="" />
			</li><li class="orbit-slide">
				<img src="<?php echo $putanjaAPP ?>slike/dog.jpg" alt="" />
			</li>


	</div>

</header>
<footer class="footer">
	<div class="row">
		<div class="small-12 medium-6 medium-push-6 columns">
			<p class="logo show-for-small-only">
				<i class="fi-target"></i> Šetnje pasa
			</p>
			<form class="footer-form">
				<div class="row">
					<div class="medium-9 medium-push-3 columns">
						<label> <label for="email" class="contact">Kontaktiraj nas</label>
							<input type="email" id="email" placeholder="Email Adresa" />
						</label>
					</div>
				</div>
				<div class="row">
					<div class="medium-9 medium-push-3 columns">
						<label> 							<textarea rows="5" id="message" placeholder="Poruka"></textarea> </label>
					</div>
					<div class="row">
						<div class="medium-9 medium-push-3 columns">
							<button class="submit" type="submit" value="Submit">
								Pošalji
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="small-12 medium-6 medium-pull-6 columns">
			<p class="logo hide-for-small-only">
				<i class="fi-target"></i> Šetnje pasa
			</p>
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
			<p class="copywrite">
				Šetnje pasa © 2017
			</p>
		</div>
	</div>
</footer>