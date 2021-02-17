# Követelményspecifikáció

## 01. Jelenlegi rendszer leírása
A trio megújult csapata egy olyan weboldalt készít, amin különböző startup vállalkozások aloldalait érhetik el a végfelhasználók. Ezen oldalak feltűnése segíti a fejlesztők, vállalkozók számára az elérhetőség növelését, illetve a végfelhasználók számára is kedvező, hiszen több fontos dolgot is megtalálhatnak egy helyen. A jelenlegi helyzet szerint a 4 tag a weboldal 4 alvállalkozásáról fog fejleszteni egy aloldalt, amely hatékony önálló, de mégis közös munkát tesz lehetővé. Fontos az aloldalak jó elhatárolódása egymástól, önálló tér kialakítása számukra, de mégis a felhasználók számára egyszerű váltási lehetőség biztosítása.

## 02. Vágyálomrendszer
Projektünk célja egy olyan gyűjtő weboldalt létrehozni, amely startup vállalkozások weboldalait foglalja magában. Ezek olyan weboldalak, melyek nemcsak tájékoztatnak, hanem valamilyen szolgáltatást is nyújtanak. Ez a szolgáltatás leggyakrabban online vásárlási lehetőség, de nyújthatnak egyéb online igénybe vehető szolgáltatásokat is, melyek lehetnek ingyenesek vagy díjkötelesek egyaránt. Manapság, a járvány idején a vállalkozásoknak nehéz érvényesülniük, tevékenységeiket javarészt interneten keresztül kell végezniük. Az internetes vásárlások és szolgáltatások igénybevételének száma emiatt ugrásszerűen megnőtt, bár eddig is nagyon népszerűek voltak. Weboldalunk a kezdő vállalkozásoknak nyújt segítséget azáltal, hogy egy helyen elérhetővé teszi őket. Fejlesztőink bármilyen, igényeknek megfelelő design-nal létrehozzák a megrendelő oldalát, itt nem kell egy sablonos felépítéshez vagy stílushoz alkalmazkodni, ezek az aloldalak lehetnek teljesen különbözőek, ahogyan funkcióik egyaránt lehetnek változatosak. A weboldalról menüpontokba rendezve érhetőek el a különbőző aloldalak, és ahogyan növekszik ezek száma, egyre több kategóriát alakítunk ki a könnyebb böngészhetőség érdekében. A főoldalon megtalálható minden információ rólunk, többek között az irodánk elérhetőségei, üzenetküldés a fejlesztőknek, linkek a közösségi oldalakra. A többi menüpont viszont mind a megrendelőinké, illetve az ő oldalaiké. A mi weboldalunk arculata tükrözi céljainkat: lehetőséget teremteni kisvállalkozásoknak a felemelkedésre, ezért logónk és nevünk az indián Eagle Flies, ami szerintünk ezt jól kifejezi.

## 06. Követelménylista
|Id|Név|Kifejtés|
|--|---|--------|
|01|Főoldal: információk|Elérhetőségek, beágyazott Google maps térkép, üzenet a fejlesztőknek|
|02|Webshopok menüpont|Itt található meg az összes, webshop kategóriába sorolható oldal. Később ezen belül több kategória lesz kialakítva és kereshető is lesz, ha elég sok weboldal lesz.|
|03|Szolgáltatások menüpont|Olyan vállalkozások weboldalai, melyek valamilyen online elérhető ingyenes vagy díjköteles szolgáltatást nyújtanak. Ezek később szintén több kisebb kategóriába lesznek rendezve és kereshetőek lesznek, ha elég sok lesz belőlük.|
|04|Marketing menüpont|Azoknak a startup vállalkozásoknak a weboldalai tartoznak ide, melyek az előbbi két kategória közül bármelyikbe vagy egyikbe sem sorolhatók be. Később ezek is kereshetőek lesznek és több kategóriára oszlanak majd.|
|05|Reszponzivitás|Alapkövetelmény a gyűjtőoldallal és a weboldalakkal szemben is, hogy minden kijelzőméreten megjelenthető legyen a tartalom.|
|06|Edzséssel kapcsolatos webshop: regisztráció, bejelentkezés|A webshopot regisztrált felhasználók használhatják.|
|07|Edzsés webshop: termékek rendelése|Webshop, melyen keresztül a felhasználók edzőtermi kellékeket, étrendkiegészítőket, vitaminokat stb rendelhetnek.|
|08|Edzés webshop: felugró ablak chat funkció|A vevőszolgálatnak egy felugró chat ablakban lehet üzenetet küldeni, melyre az ügyeletes admin lehetőleg perceken belül reagál.|
|09|Ingatlanos oldal: ingatlan-értékbecslés igénylése|A felhasználó lakásról vagy családi házról kérhet ingatlan-értékbecslést és/ vagy energetikaitanúsítványt|
|10|Ingatlanos oldal: vagyonszerzési illeték meghatározása|A szükséges adatok megadása után a felhasználó megkapja az ingatlanjához tartozó vagyonszerzési illeték pontos összegét|
|11|Ingatlanos oldal: személyi jövedelemadó meghatározása|A szükséges adatok megadása után a felhasználó megkapja az ingatlanjához tartozó személyi jövedelemadó pontos összegét|

## 07. A rendszerre vonatkozó szabályok
#### Általános szabályok:
- A felhasználók számára könnyen érthetőnek és használhatónak kell lennie a felületeknek.
-  Átláthatóan, logikusan kell, hogy működjön.
- Többnyire a jelenlegi legfejlettebb technológiákat kell használnia.
#### Bőngésző követelmények:
A webalkamazásoknak megfelelően kell működniük és megjelnniuk a leggyakrabban használt böngészőkben:
- Google Chrome
- Microsoft Edge
- Mozilla Firefox
- Safari
#### Süti tájékoztató
Adatok kiértékelése révén értékes ismereteket lehet nyerni a felhasználók igényeiről. Ezek az ismeretek hozzájárulnak a szolgáltatás minőségének további javításához. Konkrétan minden egyes hozzáféréssel kapcsolatban az alábbi adatok kerülnek korlátlanul tárolásra:
- hozzáférés, illetve a kérés napja és időpontja
- a felkeresett oldal, illetve fájl neve
- hivatkozás az oldalra, ahonnan hozzáfértek ehhez az oldalhoz
- a felhasználó által alkalmazott böngésző, beleértve a böngésző verzióját
- a felhasználó által használt operációs rendszer

## 08. Fogalomszótár 
#### Startup:
A startup mint szó az utóbbi évek egyik legjelentősebb kifejezésévé vált a vállalkozói és gazdasági létben. Magyarországra csak az elmúlt pár évben szivárgott be a magyar nyelvbe, bár az emberek többsége még mindig széttárja karját, ha pontosan meg kellene fogalmazni a szó tényleges jelentését. Tulajdonképpen nem hiába. Pontos definíciót talán nem is tudunk rá mondani, mégis ha felsoroljuk a jellemzőit, akkor meg tudjuk határozni egy vállalkozás startup mivoltát. A startup mondhatni egy kultúra, egy vállalti forma, modell, egy módszertan. Már ebből a felsorolásból láthatjuk, hogy egy igen sokrétegű fogalomról van szó. Ha nagyon le szeretnék egyszerűsíteni, akkor mondhatjuk azt, hogy a startup egy olyan vállalat, amely nagyon gyors – pár éves – növekedési potenciállal kecsegtet, nemzetközi piacokat céloz és valami innovatív szolgáltatást vagy terméket vezet be, mindezt minimális saját tőkével.
#### Reszponzív felület:
Az okostelefonok, táblagépek, laptop-ok hatalmas fejlődésen mennek keresztül az utóbbi években. A reszponzív webdesign lehetőséget ad arra, hogy ugyanaz a weboldal eszköztől, operációs rendszertől, böngészőtől függetlenül bármilyen környezetben tökéletesen jelenjen meg. Tökéletes megjelenés alatt a képernyőhöz igazodó ablak méretet, a könnyű olvashatóságot jelentő betű méretet és kontrasztot, a kijelzőhöz igazodó kép méretet és a könnyű navigációt értem. 
#### Front-End 
A front-end, a weboldal legfelsőbb rétege, ami kapcsolatban van a felhasználóval. Feladata az adatok megjelenése, befogadása a felhasználó (vagy ritkábban egy másik rendszer) felől. Weboldal esetén a front-end foglalkozik a HTML, a CSS vagy egyes JavaScript kódokkal. 
#### Back-End
A back-end a, weboldalnak a hátsó, a felhasználó elől rejtett, a tényleges számításokat végző része. Feladata a front-end, a felhasználóval kapcsolatban lévő rész felől érkező adatok feldolgozása, és az eredményeknek a front-end felé történő visszaírása. Weboldal esetén a back-end foglalkozik a PHP kóddal és az adatbázissal.
#### HTML:
Hyper Text Makeup Langauge - hiperszöveges jelölőnyelv- weboldalak készítéséhez kifejlesztett leírónyelv.
#### CSS:
Cascading Style Sheets - egymásba ágyazott stílusalapok - stílusleíró nyelv, mely a HTML típusú strukturált dokumentumok stílusát, megjelenését írja le
#### Javascript:
A JavaScriptet (röviden JS) első sorban arra használt, hogy gazdagabb, felhasználóbarát élményeket teremtsenek vele az internetet böngészők számára. Dinamikusan frissülő weboldalak, intuitív felhasználói felületek menük, párbeszédpanelek, grafikák, térképek, videólejátszók, és számos egyéb eleme illetve funkció megvalósítésa.
#### PHP:
A PHP egy általános szerveroldali szkriptnyelv. Az első szkriptnyelvek egyike, amely külső fájl használata helyett HTML oldalba ágyazható. A kódot a webszerver PHP feldolgozómodulja értelmezi.
