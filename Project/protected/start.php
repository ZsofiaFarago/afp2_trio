<?php require_once PROTECTED_DIR.'header.php'; ?>
		<div class="main">
			<h2>Az Eagle Flies-ról</h2>
			<p>Oldalunk egy olyan gyűjtő weboldal, amely startup vállalkozások weboldalait foglalja magában. Ezek olyan weboldalak, melyek nemcsak tájékoztatnak, hanem valamilyen szolgáltatást is nyújtanak. Ez a szolgáltatás leggyakrabban online vásárlási lehetőség, de nyújthatnak egyéb online igénybe vehető szolgáltatásokat is, melyek lehetnek ingyenesek vagy díjkötelesek egyaránt. Manapság, a járvány idején a vállalkozásoknak nehéz érvényesülniük, tevékenységeiket javarészt interneten keresztül kell végezniük. Az internetes vásárlások és szolgáltatások igénybevételének száma emiatt ugrásszerűen megnőtt, bár eddig is nagyon népszerűek voltak. Weboldalunk a kezdő vállalkozásoknak nyújt segítséget azáltal, hogy egy helyen elérhetővé teszi őket. Fejlesztőink bármilyen, igényeknek megfelelő design-nal létrehozzák a megrendelő oldalát, itt nem kell egy sablonos felépítéshez vagy stílushoz alkalmazkodni, ezek az aloldalak lehetnek teljesen különbözőek, ahogyan funkcióik egyaránt lehetnek változatosak. A weboldalról menüpontokba rendezve érhetőek el a különbőző aloldalak, és ahogyan növekszik ezek száma, egyre több kategóriát alakítunk ki a könnyebb böngészhetőség érdekében. A főoldalon megtalálható minden információ rólunk, többek között az irodánk elérhetőségei, üzenetküldés a fejlesztőknek, linkek a közösségi oldalakra. A többi menüpont viszont mind a megrendelőinké, illetve az ő oldalaiké. A mi weboldalunk arculata tükrözi céljainkat: lehetőséget teremteni kisvállalkozásoknak a felemelkedésre, ezért logónk és nevünk az indián Eagle Flies, ami szerintünk ezt jól kifejezi.</p>
			<p>Másképp fogalmazva weboldalunk célja az itthoni, Magyarországi startup vállakozások megjelenítése. Ezzel segítve a munkájukat a nagyközösség elérésevel azoknak akik nem rendelkeznek - vagy nem megfelelő - média csapattal. Napjainkban egyébként is nagy szerepet játszik az online médiában történő megjelenés, mondhatni amelyik cég nincs fent az interneten az nem is működik teljes erővel (bár ez erős túlzással azért). Mindazonáltal még mindig napjain része a COVID-19, az emberek amúgy is a számítógép és a telefon előtt töltött ideje mégjobban megnőtt a vírusra és bezártságra való tekintettel, emiatt még inkább érdemes minnél több helyen megjelenni az interneten a vállakozások számára. A gyűjtői oldalon akár saját weboldallal is megjelenhetnek a vállalkozások, ám ha nincs még nekik vagy nem készült el valamilyen oknál fogva, akkor sem kell csüggedni, a fejlesztőink igénybe vehetőek webfejlesztési munkálatokra vagy annak besegítésére. A menüben megjelenő menüpontok felosztják és különböző kategóriákba rendezik a cégeket, ezáltal bárki aki a fő honlapon jár könnyen átlátja és megtalálja az általa keresett dolgokat, valamint ezzel a kategorizálással segítjük, hogy a vállalkozások csak a számukra releváns részben jelenjenek meg.</p>
			
			<div id="contact-us">
				<h2>Lépjen velünk kapcsolatba!</h2>
				<p>Ha Ön jelenlegi partnerünkként, megrendelőnként képzlei el magát, vagy csak érdeklődne ajánlatainkról, vegye fel velünk a kapcsolatot az alábbi űrlap segítségével!</p>
				 <form action="#">
				    <label for="customerName">NÉV <em>&#x2a;</em></label>
					<input id="customerName" name="customerName" required="" type="text" />
					<label for="customerEmail">EMAIL <em>&#x2a;</em></label>
					<input id="customerEmail" name="customerEmail" required="" type="email" />
					<label for="customerPhone">TELEFONSZÁM</label>
					<input id="customerPhone" name="customerPhone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" type="tel" />
					<label for="customerNote">ÜZENET<em>&#x2a;</em></label>
					<textarea id="customerNote" name="customerNote" required="" rows="4"></textarea>
				    <h3>A *-gal jelölt mezők kitöltése kötelező.</h3>
				    <button id="customerOrder" type="submit">Küldés</button>
				</form>
			</div>
		</div>
<?php include_once PROTECTED_DIR.'footer.php'; ?>