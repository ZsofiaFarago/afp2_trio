<div id="main">
	<div id="catalogue">
		<div class="slideshow-container">
			<div class="mySlides fade">
				<img src="<?=PUBLIC_DIR.'/images/estate_agency/estate_001.jpg'?>">
			</div>
			<div class="mySlides fade">
				<img src="<?=PUBLIC_DIR.'/images/estate_agency/estate_002.jpg'?>">
			</div>
			<div class="mySlides fade">
				<img src="<?=PUBLIC_DIR.'/images/estate_agency/estate_003.jpg'?>">
			</div>
			<div class="mySlides fade">
				<img src="<?=PUBLIC_DIR.'/images/estate_agency/estate_004.jpg'?>">
			</div>
		</div>
		<br/>
		<div id="dots">
			<span class="dot"></span>
			<span class="dot"></span>
			<span class="dot"></span>
			<span class="dot"></span>
		</div>
	</div>

	<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			
			for (i = 0; i < slides.length; i++) {
			    slides[i].style.display = "none";  
			}
			slideIndex++;
			if (slideIndex > slides.length) {slideIndex = 1} 
			for (i = 0; i < dots.length; i++) {
			    dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
			setTimeout(showSlides, 2000);
		}
	</script>

	<div id="offer">
		<div class="div_content">
			<h2>Kedvező ajánlat</h2>
			<p>Vegye igénybe egyszerre két szolgáltatásunkat és kérjen ingatlan-értékbecslést energetikai tanúsítvánnyal! Ekkor 20% kedvezményt adunk a teljes árból.</p>
			<a href=""><div class="go_on">Érdekel</div></a>
		</div>
	</div>

	<div id="calculate">
		<div class="div_content">
			<h2>Számítsa ki kiadásait!</h2>
			<p>Ingatlant szeretne eladni vagy vásárolni, és érdeklik a felmerülő költségek! Kalkulátoraink segítségével számtsa ki az Önt érintő személyi jövedelemadó vagy vagyonszerzési illeték értékét!</p>
			<a href=""><div class="go_on">Érdekel</div></a>
		</div>
	</div>

	<div id="experts">
		<div class="div_content">
			<h2>Kérje szakértőink segítségét!</h2>
			<p>Ingatlan-ügynökeink elérhetőségei nyilvánosak, kérje bátran segítségüket!</p>
			<a href=""><div class="go_on">Érdekel</div></a>
			<div id="flex-container">
				<div id="flex-child">
		    		<img src="<?=PUBLIC_DIR.'/images/estate_agency/agent_001.jpg'?>" />
		    		<p class="expert_name">Gordon Ramsay</p>
		  		</div>
		  		<div id="flex-child">
		    		<img src="<?=PUBLIC_DIR.'/images/estate_agency/agent_002.jpg'?>" />
		    		<p class="expert_name">Cersei Lannister</p>
		  		</div>
		  		<div id="flex-child">
		    		<img src="<?=PUBLIC_DIR.'/images/estate_agency/agent_003.png'?>" />
		    		<p class="expert_name">Anakin Skywalker</p>
		  		</div>
		  		<div id="flex-child">
		    		<img src="<?=PUBLIC_DIR.'/images/estate_agency/agent_004.jpg'?>" />
		    		<p class="expert_name">Perselus Piton</p>
		  		</div>
			</div>
		</div>

	</div>

	<div id="contact_us">
		<div class="div_content">
			<h2>Lépjen velünk kapcsolatba!</h2>
			<p>Kapcsolati űrlapunk segítségével neve, email címe megadásával üzenetet küldhet nekünk, melyben felteheti kérdéseit ingatlanos ügyeivel kapcsolatban, és szakértőink igyekeznek azt rövid időn belül megválaszolni az Ön által megadott email címre küldött üzenetben.</p>
			<a href=""><div class="go_on">Érdekel</div></a>
		</div>
	</div>

	<div id="contact_details">
		<div class="column" id="details_left">
			<div>
				<h3>Estate Agency</h3>
				<p id="links">
					<a href="#">Home</a> |
					<a href="#">Blog</a> |
					<a href="#">Pricing</a> |
					<a href="#">About</a> |
					<a href="#">Faq</a> |
					<a href="#">Contact</a>
				</p>
				<p id="company_name">Estate Agency &copy; 2021</p>
			</div>
		</div>

		<div class="column" id="details_center">
			<div>
				<div>
					<i class="fas fa-map-marker-alt"></i>
					<p><span>Leányka u. 4.</span>3300, Eger</p>
				</div>
				<div>
					<i class="fas fa-phone"></i>
					<p>+1 555 123456</p>
				</div>
				<div>
					<i class="fas fa-envelope"></i>
					<a href="mailto:contact@trio.com">contact@trio.com</a>
				</div>
			</div>
		</div>

		<div class="column" id="details_right">
			<div>
				<h3>A vállalkozásról</h3>
				<p>Küldetésünk, hogy az emberek tisztában legyenek az ingatlanuk értékével, ne veszítsenek az ingatlan vagyonukból hanem a legjobb áron, könnyedén értékesíteni tudják azt bármikor. Ehhez az Estate biztosít átlátható platformot, melyet bárki igénybe vehet, és így az ingatlanvagyon biztonságos formában, könnyen kezelhetővé válik.</p>
			</div>
		</div>
	</div>
</div>