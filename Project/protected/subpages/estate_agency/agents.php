<div class="records-div">
	<div id="experts-main-div">
		<h1>Kérje szakértőink segítségét!</h1>
		<p>Csapattagjaink mind profi ingatlanügynökök, akik a szakma különböző területeinek a szakértői. Bátran keressék őket emailben, telefonon vagy akár személyesen is minden hétköznap 9 és 15 óra között! Ők azok, akik további tudnivalókkal rendelkeznek szolgáltatásainkról, és az oldalunkon közölt legfontosabb tudnivalókon kívül bővebb információval állnak rendelkezésre.</p>
	</div>
	<?php
		include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
		include_once PROTECTED_DIR.'subpages/estate_agency/controller/agentController.php';
		$controller = new agentController();
		$controller->index();
	?>
</div>