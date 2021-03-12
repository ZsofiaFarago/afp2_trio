<div id="calculators_page">
	<div class="calculatorForm" id="incomeTaxCalculator">
		<h2>Személyi jövedelemadó kalkulátor</h2>
		<p>Adja meg az alábbi adatokat, és mi megmondjuk, pontosan mekkora összegű személyi jövedelemadóra számíthat ingatlaneladás esetén!</p>
		<form action="#">
	    	<label for="acquisitionYear">Az ingatlan megszerzésének éve: <em>&#x2a;</em></label>
			<input id="acquisitionYear" name="acquisitionYear" required="" type="text" />
			<label for="acquisitionPrice">Az ingatlan megszerzésének értéke: <em>&#x2a;</em></label>
			<input id="acquisitionPrice" name="acquisitionPrice" required="" type="email" />
			<label for="plannedSellingPrice">Tervezett eladási ár: <em>&#x2a;</em></label>
			<input id="plannedSellingPrice" name="plannedSellingPrice" required="" type="text" />
			<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
			<button id="customerOrder" type="submit">Számítás</button>
		</form>
	</div>

	<div class="calculatorForm" id="acquisitionTaxCalculator">
		<h2>Személyi jövedelemadó kalkulátor</h2>
		<p>Adja meg az alábbi adatokat, és mi megmondjuk, pontosan mekkora összegű vagyonszerzési illetékre számíthat ingatlanvásárlás esetén!</p>
		<form action="#">
			<label for="acquisitionPrice">Az ingatlan megszerzésének értéke: <em>&#x2a;</em></label>
			<input id="acquisitionPrice" name="acquisitionPrice" required="" type="email" />
			<label for="sellWithinOneYear">Adott el ingatlant egy éven belül? </label>
 			<input type="checkbox" id="sellWithinOneYear" name="sellWithinOneYear" value="sellWithinOneYear">
			<label for="forRelatives">Átruházás házastársak, egyenesági rokonok között? </label>
			<input type="checkbox" id="forRelatives" name="forRelatives" value="forRelatives">
			<label for="firstProperty">Első lakástulajdon? </label>
			<input type="checkbox" id="firstProperty" name="firstProperty" value="Boat">
			<label for="selfGoverning">Önkormányzati lakás? </label>
			<input type="checkbox" id="selfGoverning" name="selfGoverning" value="selfGoverning">
			<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
			<button id="customerOrder" type="submit">Számítás</button>
		</form>
	</div>
</div>