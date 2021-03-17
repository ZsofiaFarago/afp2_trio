<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
	include_once PROTECTED_DIR.'subpages/estate_agency/controller/calculatorController.php';
	$controller = new calculatorController();
?>
<div id="calculators_page">

	<div class="calculator-content" id="calculator-intro">
		<h1>Adó és illeték fizetése ingatlan adásvétel esetén</h1>
		<p>Mielőtt lakás eladásba vagy vásárlásba vágsz, érdemes tudnod, hogy az eladásnak és a vásárlásnak is költségei vannak. Ha van egy kereted, amiből vennél, vagy egy elképzelt összeg, mit az eladásból vársz, kellemetlen meglepetések érhetnek, ha nem számolsz Állambácsi pénzével.</p>
	</div>

	<div class="calculator-content" id="icomeTax-text">
		<h2>Adó fizetése ingatlan eladás esetén</h2>
		<p>Ingatlan eladás után személyi jövedelem adót kell fizetni. Az adó mértéke 15%. Ha a tulajdonos drágábban adja el a lakást mint amennyiért megvette, tehát NYERESÉGE van, adófizetési kötelezettsége keletkezik. Az adóalap mértéke az eltelt idő függvényében csökken. A tulajdonos a szerzést követő 5. évben már nem köteles adót fizetni.</p> 
		<p>Az adóalapból levonható:</p>
		<ul>
		    <li>a megszerzésre fordított összeg,</li>
		    <li>a megszerzésével kapcsolatban felmerült kiadás (például megfizetett vagyonszerzési illeték),</li>
		    <li>az eladásra kerülő ingatlanon elvégzett értéknövelő beruházás költsége (az ingatlan, értékét, állagát megóvó ráfordításokon felül az ingatlan forgalmi értékét növelő ráfordítás, például a fűtés korszerűsítése, kerítés építése), és</li>
		    <li>az ingatlan  eladásával kapcsolatban felmerült kiadás (például a hirdetések díja, illetve a közvetítői jutalék).</li>
		</ul>
	</div>

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

	<div class="calculator-content" id="acquisitionTax-text">
		<h2>Vagyonszerzési illeték ingatlanvásárlás esetén</h2>
		<p>Lakásvásárlás esetén a vételár 4%-ára tart igényt Állambácsi. Tehát ha 20 000 000 Ft-ért vettél egy lakást, akkor 800 000 Ft-ot kell majd befizetned. Sokat nem kell várnod a csekkre, mert mikor adásvételi szerződés aláírása után a földhivatalba feljegyzik az adásvétel tényét, a NAV már írja is neked a levelet, hogy fizess. Ha az segítség neked, érdemes részletfizetést kérni.</p>
		<p>Illeték kedvezmények:</p>
		<ul>
			<li><b>Cserét pótló kedvezmény</b> – Ha egy éven belül eladtál és vásárolsz is, akkor csak az eladott lakás és a megvásárolt lakás ára közötti különbözet után kell fizetned, amennyiben az új lakás drágább. Ha olcsóbb lakást vettél, akkor nem kell fizetned. Ha előbb vásárolsz, és utána fogsz csak eladni, akkor jelezd a hatóság felé, hogy a régi lakásodat el kívánod adni, és felfüggesztik a fizetési kötelezettségedet.</li>
			<li><b>Házastársak között</b> illetékmentes az ingatlanvagyon átruházása</li>
			<li><b>Egyenes ági rokonok között</b> szintén nem kell illetéket fizetni</li>
			<li><b>Telek vásárlás</b> esetén nem kell fizetni, amennyiben 4 éven belül megkezdődik a lakóház építése</li>
			<li><b>Új lakás vásárlása</b> esetén 15 MFt-ig illetékmentes a vásárlás, 15MFt fölött pedig 4%-ot kell fizetni, de csak a 15MFt-ot meghaladó részre. Tehát ha 20MFt-ért veszel egy újépítésű lakást, akkor 5MFt után fogsz fizetni.</li>
			<li><b>Első lakástulajdon</b> megszerzése esetén 15MFt-ig 35 év alatt 50%-os kedvezmény jár.</li>
			<li><b>Önkormányzati lakás</b> megvásárlásakor szintén nem kell illetéket fizetni.</li>
		</ul>
		<p>A fenti tájékoztatás nem teljeskörű, de a lényeg benne van. Minden esetben egyeztess ügyvéddel és könyvelővel, mielőtt belevágsz!</p>
	</div>

	<div class="calculatorForm" id="acquisitionTaxCalculator">
		<h2>Vagyonszerzési illeték kalkulátor</h2>
		<p>Adja meg az alábbi adatokat, és mi megmondjuk, pontosan mekkora összegű vagyonszerzési illetékre számíthat ingatlanvásárlás esetén!</p>
		<form action="#">
			<label for="acquisitionPrice">Az ingatlan megszerzésének értéke: <em>&#x2a;</em></label>
			<input id="acquisitionPrice" name="acquisitionPrice" required="" type="text" />

			<div>
				<label for="sellWithinOneYear">Adott el ingatlant egy éven belül? </label>
				<input type="checkbox" id="sellWithinOneYear" name="sellWithinOneYear" value="sellWithinOneYear">
 			</div>

 			<label for="sellingPrice">Ebben az esetben adja meg az eladott ingatlan értékét!</label>
			<input id="sellingPrice" name="sellingPrice" type="text" />

 			 <div>
 				<label for="forRelatives">Átruházás házastársak, egyenesági rokonok között? </label>
 				<input type="checkbox" id="forRelatives" name="forRelatives" value="forRelatives">
 			</div>
			
			<div>
				<label for="newEstate">Új építésű ingatlant vásárol? </label>
				<input type="checkbox" id="newEstate" name="newEstate" value="newEstate">
			</div>

			<div>
				<label for="firstProperty">Első lakástulajdon és Ön 35 év alatti? </label>
				<input type="checkbox" id="firstProperty" name="firstProperty" value="firstProperty">
			</div>

			<div>
				<label for="selfGoverning">Önkormányzati lakás? </label>
				<input type="checkbox" id="selfGoverning" name="selfGoverning" value="selfGoverning">
			</div>

			<div>
				<label for="plot">Telket vásárol és 4 éven belül lakóházat épít rajta? </label>
				<input type="checkbox" id="plot" name="plot" value="plot">
			</div>

			<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
			<button name="acquisitionTax" type="submit">Számítás</button>
		</form>
		<?php
			$controller->getAcquisitionTax();
		?>
	</div>
</div>