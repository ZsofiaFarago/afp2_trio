<?php
	include_once PROTECTED_DIR.'subpages/estate_agency/core/MyController.php';
	include_once PROTECTED_DIR.'subpages/estate_agency/controller/serviceController.php';
	$controller = new serviceController();
?>
<div id="services-page">
	<div class="text-content intro">
		<h1>Ingatlan értékbecslés vagy energetikai tanúsítvány igénylése</h1>
		<p>Ha ingatlant szeretne vásárolni vagy eladni, és nem ismeri annak valódi, pontos értékét, akkor szakértők segítségére van szüksége! Ennek meghatározása szakértelmet, tapasztalatot igényel, ezért ha Ön nem ért hozzá ne próbálkozzon vele, mert sok millió forintot is bukhat vele, vásárlás esetén pedig nehezen vagy egyáltalán nem kel el az ingatlanja!</p>
	</div>
	<div class="text-content">
		<h2>Az értékbecslésről</h2>
		<p>Kollégáink konkrét, objektív adatokra alapozva határozzák meg az ingatlan értékét. Elsősorban az alábbiakat veszik figyelembe:</p>
		<ul>
			<li>az épület korát,</li>
			<li>méretét,</li>
			<li>építési módját,</li>
			<li>szerkezeti állapotát,</li>
			<li>esztétikai kialakítását,</li>
			<li>településen belüli elhelyezkedését,</li>
			<li>megközelíthetőségét,</li>
			<li>a várható felújítási költségeket,</li>
			<li>az aktuális piaci viszonyokat</li>
		</ul>
		<p>Ezek mind befolyásolhatják pozitív és negatív irányba egyaránt az ingatlan értékét, és általuk egészen pontos értékhez juthatunk.</p>
	</div>
	<div class="text-content">
		<h2>Az értékbecslés folyamata</h2>
		<ol>
			<li>Regisztráljon oldalunkon, ha még nem tette meg!</li>
			<li>Ha nincs bejelntekzve, jelentkezzen be email címével és jelszavával! Ekkor ebben a menüpontban elérhetővé válik az űrlap.</li>
			<li>Töltse ki az űrlapot a szükséges adatokkal!</li>
			<li>Ingatlanügynökeink 3 munkanapon belül felveszik Önnel a kapcsolatot és időpontot egyeztetnek.</li>
			<li>A megbeszélt időpontban kimennek Önhöz elvégezni a becslést, majd elkészítik a kiértékelést.</li>
			<li>Az elkészült dokumentációt egy héten belül postázzuk!</li>
		</ol>
	</div>
	<div class="text-content">
		<h2>Az értékbecsléshez szükséges dokumentumok</h2>
		<p>
			<ul>
				<li>Az ingatlan 30 napnál nem régebbi tulajdoni lapja. Ha nem áll rendelkezésre, 3500 Ft-ért kiállítjuk.</li>
				<li>Családi ház vagy lakás esetén az alaprajz. Ha nem áll rendelkezésre, 5000 Ft-ért elkészítjük.</li>
				<li>Használatba vételi engedély</li>
			</ul>
		</p>
	</div>
	<div class="text-content table-div">
		<h2>Árajánlat</h2>
		<p></p>
		<table>
			<thead>
				<tr>
					<th colspan="2">Lakás</th>
					<th colspan="2">Családi ház</th>
				</tr>
				<tr>
					<th>Terület</th>
					<th>Bruttó ár</th>
					<th>Terület</th>
					<th>Bruttó ár</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>0-40 m<sup>2</sup></td>
					<td>12 990 Ft</td>
					<td>0-80 m<sup>2</sup></td>
					<td>17 990 Ft</td>
				</tr>
				<tr>
					<td>41-120 m<sup>2</sup></td>
					<td>14 990 Ft</td>
					<td>81-120 m<sup>2</sup></td>
					<td>19 990 Ft</td>
				</tr>
				<tr>
					<td>121-160 m<sup>2</sup></td>
					<td>15 990 Ft</td>
					<td>121-160 m<sup>2</sup></td>
					<td>21 990 Ft</td>
				</tr>
				<tr>
					<td>161-200 m<sup>2</sup></td>
					<td>16 990 Ft</td>
					<td>161-200 m<sup>2</sup></td>
					<td>23 990 Ft</td>
				</tr>
				<tr>
					<td>201-300 m<sup>2</sup></td>
					<td>17 990 Ft</td>
					<td>201-300 m<sup>2</sup></td>
					<td>25 990 Ft</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="text-content">
		<h2>Kedvezményes ajánlat, extrák</h2>
		<p>Üres telek esetén az értékbecslés ára 13850 Ft.  Eltérő, egyedi esetben kérjen egyedi árajánlatot kollégáinktól!</p>
		<p>Az ár tartalmazza: </p>
		<ul>
			<li>a kiszállási díjat,</li>
    		<li>a helyszíni felmérést,</li>
    		<li>a szakértői jelentés elkészítését,</li>
    		<li>a dokumentum kézbesítését.</li>
		</ul>
		<p>Tudta, hogy hiteles energetikai tanúsítvány nélkül ma már egy ingatlan sem adható el Magyarországon? Erre a dokumentumra tehát mindenképp szüksége lesz, ha eladáson gondolkozik – miért is ne intézné el ezt az értékbecsléssel együtt? Energetikai tanúsítás és értékbecslés egyidejű megrendelése esetén az értékbecslés fentebbi árainak 50%-át elengedjük ügyfeleinknek, hogy ezzel is megkönnyítsük az ingatlan adás-vételt számukra.</p>
	</div>

	<?php if($controller->showOrderForm()): ?>
		<div class="form" id="orderService">
			<h2>Szolgáltatások megrendelése</h2>
			<p>Az alábbi űrlap segítségével igényelhet ingatlan-értékbecslést vagy energetikai tanúsítványt, esetleg mindkettőt.</p>
			<form method="POST">
				<label for="city">Város: <em>&#x2a;</em></label>
				<input id="city" name="city" required="" type="text"
					value="<?php echo (isset($_POST['city']))?$_POST['city']:'';?>"
				/>

				<div>
					<label for="zipcode">Irányítószám: </label>
					<input id="zipcode" name="zipcode" required="" type="text"
						value="<?php echo (isset($_POST['zipcode']))?$_POST['zipcode']:'';?>"
					/>
	 			</div>

	 			<label for="streetName">Közterület neve: <em>&#x2a;</em></label>
				<input id="streetName" name="streetName" type="text" 
					value="<?php echo (isset($_POST['streetName']))?$_POST['streetName']:'';?>"
				/>

	 			 <div>
	 				<label for="streetNumber">Házszám: <em>&#x2a;</em></label>
					<input id="streetNumber" name="streetNumber" type="text" 
						value="<?php echo (isset($_POST['streetNumber']))?$_POST['streetNumber']:'';?>"
					/>
	 			</div>

	 			<div>
	 				<label for="size">Telek mérete négyzetméterben: <em>&#x2a;</em></label>
					<input id="size" name="size" type="text" 
						value="<?php echo (isset($_POST['size']))?$_POST['size']:'';?>"
					/>
	 			</div>

	 			<div>
		 			<label for="type">Ingatlan típusa: <em>&#x2a;</em></label>
					<select id="type" name="type">
						<option value="Családi ház">Családi ház</option>
						<option value="Lakás">Lakás</option>
						<option value="Üres telek">Üres telek</option>
						<option value="Egyéb">Egyéb</option>
					</select>
				</div>
				
				<div>
					<label for="evaluation">Igényel ingatlan-értékbecslést? </label>
					<input type="checkbox" id="evaluation" name="evaluation" value="evaluation" 
						<?php echo (isset($_POST['evaluation']))?'checked':'unchecked';?>
					/>
				</div>

				<div>
					<label for="energetic">Igényel energetikai tanúsítványt? </label>
					<input type="checkbox" id="energetic" name="energetic" value="energetic" 
						<?php echo (isset($_POST['energetic']))?'checked':'unchecked';?>
					/>
				</div>

				<div>
					<label for="propertyPaper">Szüksége van tulajdoni lapra? </label>
					<input type="checkbox" id="propertyPaper" name="propertyPaper" value="propertyPaper" 
						<?php echo (isset($_POST['propertyPaper']))?'checked':'unchecked';?>
					/>
				</div>

				<div>
					<label for="plan">Szeretne alaprajzot igényelni? </label>
					<input type="checkbox" id="plan" name="plan" value="plan" 
						<?php echo (isset($_POST['plan']))?'checked':'unchecked';?>
					/>
				</div>

				<h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
				<button name="order" type="submit">Igénylés leadása</button>
				<?php
					$controller->orderService();
				?>
			</form>
		</div>
	<?php else: ?>
		<div class="form">
			<div class = "formResult formErrorMessage">A szolgáltatások igénybevételéhez regisztráció szükséges! Ha még nem regisztrált, tegye meg, ha már megtette, lépjen be! A menüben megtalálja a belépés, illetve regisztráció menüpontokat!</div>
		</div>
	<?php endif; ?>

</div>