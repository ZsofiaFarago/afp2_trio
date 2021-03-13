<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
	include_once PROTECTED_DIR.'subpages/estate_agency/controller/calculatorController.php';
	$controller = new calculatorController();
?>
<div id="calculators_page">
	<div class="calculatorForm" id="incomeTaxCalculator">
		<h2>Személyi jövedelemadó kalkulátor</h2>
		<p>Adja meg az alábbi adatokat, és mi megmondjuk, pontosan mekkora összegű személyi jövedelemadóra számíthat ingatlaneladás esetén!</p>
		<form method="POST">
	    		<label for="acquisitionYear">Az ingatlan megszerzésének éve: <em>&#x2a;</em></label>
			<input id="acquisitionYear" name="acquisitionYear" required="" type="text" />

			<label for="acquisitionPrice">Az ingatlan megszerzésének értéke: <em>&#x2a;</em></label>
			<input id="acquisitionPrice" name="acquisitionPrice" required="" type="text" />

			<label for="plannedSellingPrice">Tervezett eladási ár: <em>&#x2a;</em></label>
			<input id="plannedSellingPrice" name="plannedSellingPrice" required="" type="text" />

			<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
			<button name="incomeTax" type="submit">Számítás</button>
		</form>
		<?php
			$controller->getPersonalIncomeTax();
		?>
	</div>

	<div class="calculatorForm" id="acquisitionTaxCalculator">
		<h2>Vagyonszerzési illeték kalkulátor</h2>
		<p>Adja meg az alábbi adatokat, és mi megmondjuk, pontosan mekkora összegű vagyonszerzési illetékre számíthat ingatlanvásárlás esetén!</p>
		<form action="#">
			<label for="acquisitionPrice">Az ingatlan megszerzésének értéke: <em>&#x2a;</em></label>
			<input id="acquisitionPrice" name="acquisitionPrice" required="" type="text" />

			<label for="sellWithinOneYear">Adott el ingatlant egy éven belül? </label>
 			<input type="checkbox" id="sellWithinOneYear" name="sellWithinOneYear" value="sellWithinOneYear">
 			<label for="sellingPrice">Ebben az esetben adja meg az eladott ingatlan értékét!</label>
			<input id="sellingPrice" name="sellingPrice" type="text" />

			<label for="forRelatives">Átruházás házastársak, egyenesági rokonok között? </label>
			<input type="checkbox" id="forRelatives" name="forRelatives" value="forRelatives">

			<label for="newEstate">Új építésű ingatlant vásárol? </label>
			<input type="checkbox" id="newEstate" name="newEstate" value="newEstate">

			<label for="firstProperty">Első lakástulajdon és Ön 35 év alatti? </label>
			<input type="checkbox" id="firstProperty" name="firstProperty" value="firstProperty">

			<label for="selfGoverning">Önkormányzati lakás? </label>
			<input type="checkbox" id="selfGoverning" name="selfGoverning" value="selfGoverning">

			<label for="plot">Telket vásárol és 4 éven belül lakóházat épít rajta? </label>
			<input type="checkbox" id="plot" name="plot" value="plot">

			<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
			<button name="acquisitionTax" type="submit">Számítás</button>
		</form>
	</div>
</div>