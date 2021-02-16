# Funkcionális specifikáció
## 02. Jelenlegi helyzet
Megkeresést kaptunk, egy gyűtő weboldal megvalósítására amelynek célja, hogy az itthoni, Magyarországi startup vállakozások megjelenítése. Ezzel segítve a munkájukat a nagyközösség elérésevel azoknak akik nem rendelkeznek - vagy nem megfelelő - média csapattal. Napjainkban egyébként is nagy szerepet játszik az online médiában történő megjelenés, mondhatni amelyik cég nincs fent az interneten az nem is működik teljes erővel (bár ez erős túlzással azért). Mindazonáltal még mindig napjain része a COVID-19, az emberek amúgy is a számítógép és a telefon előtt töltött ideje mégjobban megnőtt a vírusra és bezártságra való tekintettel, emiatt még inkább érdemes minnél több helyen megjelenni az interneten a vállakozások számára. A gyűjtői oldalon akár saját weboldallal is megjelenhetnek a vállalkozások, ám ha nincs még nekik vagy nem készült el valamilyen oknál fogva, akkor sem kell csüggedni, a fejlesztőink igénybe vehetőek webfejlesztési munkálatokra vagy annak besegítésére. A menüben megjelenő menüpontok felosztják és különböző kategóriákba rendezik a cégeket, ezáltal bárki aki a fő honlapon jár könnyen átlátja és megtalálja az általa keresett dolgokat, valamint ezzel a kategorizálással segítjük, hogy a vállalkozások csak a számukra releváns részben jelenjenek meg.

## 05. Követelménylista
| Modul       | ID      | Név                     | Verzió | Kifejtés                                 |
|-------------|---------|-------------------------|--------|------------------------------------------|
| Felület     | F#0101  | Főoldal                 | 1.0    | A főoldal felülete jelenik meg először, itt találhatók az általános információk és innen navigálható tovább a különböző menüpontokra. |
| Felület     | F#0201  | Webshopok menüpont      | 1.0    | Csak a webshopok megjelenítése           |
| Felület     | F#0202  | Szolgáltatások menüpont | 1.0    | Csak azok a cégek megjelenítése akik szolgáltatással rendelkeznek. |
| Felület     | F#0203  | Marketing               | 1.0    |                                          |
| Jogosultság | J#01    | Regisztrálás            | 1.0    | A felhasználók tudnak új fiókot létrehozni a megadott rendszerekbe a funkciók eléréséhez. |
| Jogosultság | J#02    | Bejelentkezés           | 1.0    | Az oldalt látógató felhasználók be tudnak jelentkezni az adott rendszerbe, hogy elérjék a további funkciókat. |
| Jogosultság | J#03    | Kijelentkezés           | 1.0    | A bejelentkezett felhasználó kiléptetése a rendszerből. |
| Jogosultság | J#04    | Jelszó cseréje          | 1.0    | Elfelejtett jelszó vagy csak biztonsági okokból történő jelszó cseréje. |
| Vásárlás    | V#001  | Termékek                 | 1.0    | A webshopokban megjelenő termékek megjelenítése részletes leírással.         |
| Vásárlás    | V#002  | Kosár                    | 1.0    | Webshopokban bejelentkezés után a kosár tartalmának elérése, szerkesztése           |
| Vásárlás    | V#003  | Rendelés                 | 1.0    | Rendelés leadása a webshopokban. |


## 10. Képernyőtervek
Weboldalunk egy gyűjtőoldal, mely menükbe rendezve, katogorizálva szolgáltat startup cégeknek egy közös platformot, ahonnan elérhetőek a weboldalaik, melyeket szintén mi fejlesztünk a megrendelők számára. Azonban ezek megjelenése, felépítése, nagysága és funkciói teljesen eltérőek is lehetnek, nem kell követniük semmilyen szabályt. A gyűjtőoldal megjelenése és felépítése egyszerű, stílusa és logója a vadnyugati időket idézi, neve az indián Eagle Flies, mely kifejezi a weboldal küldetését, mely nem más, mint kezdő kisvállalkozások segítése a felemelkedésben. Az alábbi képernyőterven ennek az oldalnak a vázlata látható. A főoldalon majd az információk és elérhetőségek találhatóak meg.  
![A főoldal képernyőterve](Kepek/fooldal.png)  
Az oldal kezdetben kevés menüponttal indul, melyek száma később bővülni fog, ha majd egyre több megrendelő weboldalát készítjük el és kategorizáljuk, a menüpontokon belül ezeket szintén kisebb csoportokba fogjuk sorolni és kereshetővé tesszük. Az egyes menüpontok alatt rövid leírással, képpel érhetőek el a weboldalakra vezető linkek.  
![Az egyik menüpont képernyőterve](Kepek/menupont.png)  
Az elkészített oldalak stílusa a weboldalunktól és egymástól is teljesen független, a megrendelők maguk dönthetnek róla. Nemcsak a színekről, hanem a menü, a tartalom elrendezéséről is. Egyszerű navigációs szabályok betartása mellett a fejlesztők szabadon elkészíthetik a megrendelőnek leginkább megfelelő oldalt. A képernyőterv is azért szürke színű és általános, mert ezt a szabadságot fejezi ki.  
![Az egyik weboldal képernyőterve](Kepek/aloldal.png)