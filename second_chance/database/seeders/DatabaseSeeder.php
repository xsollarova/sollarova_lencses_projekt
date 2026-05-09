<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produkt;
use App\Models\Obrazok; 

class DatabaseSeeder extends Seeder
{
    //naplní databázu produktami
    public function run()
    {

        // admin účet
        User::create([
            'meno'              => 'Admin',
            'priezvisko'        => 'Admin',
            'email'             => 'admin@secondchance.sk',
            'heslo'             => bcrypt('admin123'),
            'rola'              => 'admin',
            'datumRegistracie'  => now(),
        ]);

        $this->call(KategoriaSeeder::class);

        $produkty = [
            //žena - topy - kategória 1

            ['nazov' => 'Čierny top', 'znacka' => 'Reserved', 'kategoria_id' => 1, 'cena' => 8.90, 'velkost' => 'S', 'farba' => ['čierna'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/cierny_top.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cierny_top_mini_01.png',
                'obrazky/oblecenie_obrazky/cierny_top_mini_02.png',
            ],
            'popis' => 'Dámsky čierny top s dlhým rukávom a modernými výrezmi, ktoré dodávajú outfitu štýlový a výrazný vzhľad. Príjemný elastický materiál sa pohodlne nosí a pekne sa prispôsobí postave. Ideálny na bežné nosenie aj večerné outfity. Top je vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],

            ['nazov' => 'Psia mikina', 'znacka' => 'Under Armour', 'kategoria_id' => 1, 'cena' => 13.90, 'velkost' => 'M', 'farba' => ['čierna', 'farebná'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/psia_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/psia_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/psia_mikina_mini_02.png',
                'obrazky/oblecenie_obrazky/psia_mikina_mini_03.png',
            ],
            'popis' => 'Dámska mikina s originálnou potlačou psa vhodná na každodenné nosenie. Mäkký a pohodlný materiál poskytuje komfort počas celého dňa a voľnejší strih sa ľahko kombinuje s rifľami aj teplákmi. Mikina je vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],
            
            ['nazov' => 'Červená mikinka', 'znacka' => 'Vans', 'kategoria_id' => 1, 'cena' => 16.90, 'velkost' => 'S', 'farba' => ['farebná'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/cervena_mikinka.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cervena_mikinka_mini_01.png',
                'obrazky/oblecenie_obrazky/cervena_mikinka_mini_02.png',
            ],
            'popis' => 'Dámska červená mikinka v pohodlnom a jednoduchom štýle vhodná na bežné nosenie. Príjemný materiál zabezpečuje komfort počas celého dňa a výrazná farba dodáva outfitu energiu. Mikinka je zachovalá a vo veľmi dobrom stave.'],

            ['nazov' => 'Kvetové tričko', 'znacka' => 'Neznáma', 'kategoria_id' => 1, 'cena' => 3.90, 'velkost' => 'M', 'farba' => ['biela', 'farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/kvetove_tricko.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/kvetove_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/kvetove_tricko_mini_02.png',
            ],
            'popis' => 'Dámske tričko s kvetovým vzorom vhodné na každodenné nosenie počas teplejších dní. Ľahký a príjemný materiál poskytuje pohodlie a veselý vzor oživí každý outfit. Tričko je vo veľmi dobrom stave bez výrazného opotrebovania.'],

            ['nazov' => 'Biele tričko s dlhým rukávom', 'znacka' => 'Zara', 'kategoria_id' => 1, 'cena' => 9.50, 'velkost' => 'S', 'farba' => ['biela','hnedá'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/biele_tricko_dlhe.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/biele_tricko_dlhe_mini_01.png',
                'obrazky/oblecenie_obrazky/biele_tricko_dlhe_mini_02.png',
                'obrazky/oblecenie_obrazky/biele_tricko_dlhe_mini_03.png',
            ],
            'popis' => 'Dámske biele tričko s dlhým rukávom v jednoduchom a univerzálnom štýle vhodné na každodenné nosenie. Mäkký materiál poskytuje pohodlie počas celého dňa a ľahko sa kombinuje s rôznymi outfitmi. Tričko je vo veľmi dobrom stave bez poškodení.'],

            ['nazov' => 'Ružové tričko', 'znacka' => 'Zara', 'kategoria_id' => 1, 'cena' => 3.90, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/ruzove_tricko.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/ruzove_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/ruzove_tricko_mini_02.png',
            ],
            'popis' => 'Dámske ružové tričko v jednoduchom a pohodlnom štýle vhodné na každodenné nosenie. Príjemný materiál poskytuje komfort počas celého dňa a jemná ružová farba dodáva outfitu svieži vzhľad. Tričko je vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],

            ['nazov' => 'Čierne tričko', 'znacka' => 'Nike', 'kategoria_id' => 1, 'cena' => 13.90, 'velkost' => 'L', 'farba' => ['čierna', 'hnedá'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/cierne_tricko.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cierne_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/cierne_tricko_mini_02.png',
            ],
            'popis' => 'Dámske oversized čierne tričko s výrazným hnedým dizajnom vhodné na pohodlné každodenné nosenie. Voľnejší strih poskytuje komfort počas celého dňa a moderne pôsobí v kombinácii s rifľami, kraťasmi aj legínami. Tričko je z príjemného materiálu a vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],

            ['nazov' => 'Hnedé tielko', 'znacka' => 'H&M', 'kategoria_id' => 1, 'cena' => 4.20, 'velkost' => 'S', 'farba' => ['hnedá'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/hnede_tielko.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/hnede_tielko_mini_01.png',
                'obrazky/oblecenie_obrazky/hnede_tielko_mini_02.png',
            ],
            'popis' => 'Dámske hnedé tielko z príjemného a ľahkého materiálu vhodné na bežné nosenie počas teplých dní. Jednoduchý strih zabezpečuje pohodlie a ľahké kombinovanie s rôznymi outfitmi. Tielko je zachovalé vo veľmi dobrom stave.'],

            ['nazov' => 'Biela mikina', 'znacka' => 'New Balance', 'kategoria_id' => 1, 'cena' => 14.90, 'velkost' => 'L', 'farba' => ['biela'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/biela_zips_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/biela_zips_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/biela_zips_mikina_mini_02.png',
            ],
            'popis' => 'Dámska biela mikina na zips v pohodlnom a modernom prevedení vhodná na každodenné nosenie. Mäkký materiál poskytuje komfort počas celého dňa a praktický zips uľahčuje obliekanie. Mikina je vo veľmi dobrom stave bez poškodení.'],

            ['nazov' => 'Žltá mikina', 'znacka' => 'Puma', 'kategoria_id' => 1, 'cena' => 9.90, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/zlta_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/zlta_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/zlta_mikina_mini_02.png',
            ],
            'popis' => 'Dámska žltá mikina v jednoduchom a pohodlnom štýle vhodná na každodenné nosenie. Príjemný materiál poskytuje komfort počas celého dňa a výrazná farba oživí každý outfit. Mikina je vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],

            ['nazov' => 'Béžový kardigan', 'znacka' => 'Reserved', 'kategoria_id' => 1, 'cena' => 6.00, 'velkost' => 'M', 'farba' => ['hnedá'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/bezovy_kardigan.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/bezovy_kardigan_mini_01.png',
                'obrazky/oblecenie_obrazky/bezovy_kardigan_mini_02.png',
            ],
            'popis' => 'Príjemný hnedý sveter značky Reserved, ktorý je ideálnym spoločníkom na chladnejšie jesenné aj zimné dni. Jemný pletený materiál príjemný na dotyk zahreje aj v tých najchladnejších momentoch. Voľnejší oversized strih sa hodí k rifľam, sukni aj nohaviciam. Zelená farba dodáva outfitu svieži nádych a ľahko sa kombinuje s neutrálnymi farbami ako béžová, hnedá či čierna. Second hand kúsok zachovaný v dobrom stave – bez dier, žmolkov alebo poškodení. Vyzerá takmer ako nový a je pripravený zahrievať ďalšieho majiteľa.'],


            ['nazov' => 'Béžová bunda', 'znacka' => 'Zara', 'kategoria_id' => 1, 'cena' => 7.90, 'velkost' => 'M', 'farba' => ['hnedá'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/bunda_zara.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/bunda_zara_mini_01.jpg',
                'obrazky/oblecenie_obrazky/bunda_zara_mini_02.jpg',
                'obrazky/oblecenie_obrazky/bunda_zara_mini_03.jpg',
                'obrazky/oblecenie_obrazky/bunda_zara_mini_04.jpg',
            ],
            'popis' => 'Elegantná hnedá bunda značky Zara je ideálnym kúskom do prechodného obdobia. Vďaka svojmu minimalistickému dizajnu sa ľahko kombinuje s rôznymi outfitmi – či už do mesta, do školy alebo na bežné každodenné nosenie. Bunda je vyrobená z príjemného a kvalitného materiálu, ktorý poskytuje pohodlie počas celého dňa. Má klasický strih, ktorý lichotí postave a teplú hnedú farbu, ktorá je v posledných sezónach veľmi trendy. Je vybavená praktickými bočnými vreckami a zapínaním na zips. Ide o second hand kúsok vo veľmi dobrom stave – bez viditeľných poškodení, pripravený na ďalšie nosenie.'],
            

            ['nazov' => 'Hnedý kabát', 'znacka' => 'Mango', 'kategoria_id' => 1, 'cena' => 19.00, 'velkost' => 'L', 'farba' => ['hnedá'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/hnedy_kabat.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/hnedy_kabat_mini_01.png',
                'obrazky/oblecenie_obrazky/hnedy_kabat_mini_02.png',
            ],
            'popis' => 'Štýlový hnedý kabát značky Mango s klasickým rovným strihom, ktorý nikdy nevyjde z módy. Kvalitný huňatý materiál poskytuje príjemné teplo aj v chladnejších dňoch bez toho, aby ste sa cítili stiesnene. Kabát má dvojradové zapínanie na gombíky, dve priestranné bočné vrecká a jemne štruktúrovaný povrch, ktorý pôsobí luxusným dojmom. Hodí sa rovnako dobre do práce aj na víkendový výlet. Nosený len niekoľkokrát, stav ako nový – bez akýchkoľvek poškodení, škvŕn či deformácií.'],

            //žena - nohavice - kategória 2
            ['nazov' => 'Rifle Levis', 'znacka' => 'Levis', 'kategoria_id' => 2, 'cena' => 22.00, 'velkost' => 'M', 'farba' => ['modrá'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/rifle_levis.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/rifle_levis_mini_01.png',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_02.png',
            ],
            'popis' => 'Nadčasové modré rifle značky Levis v obľúbenom strihu straight fit, ktorý sluší každej postave. Kvalitný pevný denim materiál, ktorý vydrží roky nosenia a s každým praním získava krajší vintage charakter. Rifle majú kovové nity na namáhaných miestach a charakteristický kožený štítok Levis na zadnom páse. Hodí sa ku každému outfitu – tričku, svetru, košeli aj saku. Minimálne nosené, bez akýchkoľvek poškodení alebo výrazného opotrebovania. Second hand kúsok, ktorý vyzerá takmer ako nový.'],

            ['nazov' => 'Maskáčové nohavice', 'znacka' => 'Pull&Bear', 'kategoria_id' => 2, 'cena' => 9.90, 'velkost' => 'S', 'farba' => ['zelená'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/maskac_nohavice.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/maskac_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/maskac_nohavice_mini_02.png',
                'obrazky/oblecenie_obrazky/maskac_nohavice_mini_03.png',
                'obrazky/oblecenie_obrazky/maskac_nohavice_mini_04.png',
            ],
            'popis' => 'Dámske maskáčové nohavice Pull&Bear sú štýlový a pohodlný kúsok na každodenné nosenie. Príjemný materiál spolu s moderným strihom poskytuje komfort počas celého dňa. Nohavice majú praktické vrecká a maskáčový vzor dodáva outfitu trendy streetwear vzhľad. Jednoducho sa kombinujú s tričkom, mikinou alebo bundou. Používané, ale zachovalé vo veľmi dobrom stave – bez dier, fľakov alebo výrazného opotrebovania.'],

            ['nazov' => 'Tyrkysové nohavice', 'znacka' => 'Mango', 'kategoria_id' => 2, 'cena' => 8.90, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'OK', 'obrazok' => 'obrazky/oblecenie_obrazky/tyrkysove_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/tyrkysove_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/tyrkysove_nohavice_mini_02.png'
            ],
            'popis' => 'Dámske tyrkysové nohavice značky Mango s moderným strihom, ktorý lichotí postave a zároveň poskytuje pohodlie počas celého dňa. Príjemný bavlnený materiál v živej tyrkysovej farbe oživí každý outfit a dodá mu svieži letný nádych. Nohavice sú vybavené zapínaním na zips a gombík, bočnými aj zadnými vreckami. Výrazná farba sa skvele hodí k bielemu tričku, čiernemu tielku alebo jednoduchej blúzke. V dobrom stave – bez výrazného opotrebovania, trhlín alebo škvŕn.'],

            ['nazov' => 'Čierne nohavice', 'znacka' => 'Reserved', 'kategoria_id' => 2, 'cena' => 11.50, 'velkost' => 'S', 'farba' => ['čierna'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/damske_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/damske_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/damske_nohavice_mini_02.png'
                ],
            'popis' => 'Čierne wide leg nohavice s vysokým pásom a elegantným splývavým strihom – kúsok, ktorý zvládne rovnako dobre kancelárske stretnutie aj večer vonku. Záložky na prednom diele dodávajú siluete objem a ženský tvar, zatiaľ čo čierna farba robí zo všetkého štýl. Hodia sa k oversize blazeru, jednoduchému tielku aj k výraznému sviatočnému topu.'],

            ['nazov' => 'Šedé nohavice', 'znacka' => 'Neznáma', 'kategoria_id' => 2, 'cena' => 3.90, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/sede_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/sede_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/sede_nohavice_mini_02.png'
                ],
            'popis' => 'Šedé cargo nohavice so širokým strihom a výraznými bočnými vreckami, ktoré spájajú praktickosť so streetwear štýlom. Vintage nádych a regulovateľné spodné lemy umožňujú prispôsobiť dĺžku podľa chuti. Ideálne k crop topu, oversized mikine alebo jednoduchému tričku. Nosené, viditeľné znaky používania – bez poškodení alebo dier. '],

            ['nazov' => 'Svetlomodré rifle', 'znacka' => 'H&M', 'kategoria_id' => 2, 'cena' => 3.50, 'velkost' => 'S', 'farba' => ['farebná'], 'stav' => 'OK', 'obrazok' => 'obrazky/oblecenie_obrazky/damske_rifle.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/damske_rifle_mini_01.png',
                'obrazky/oblecenie_obrazky/damske_rifle_mini_02.png'
                ],
            'popis' => 'Dámske svetlomodré rifle so širokým strihom a vysokým pásom, ktoré sú momentálne jedným z najpopulárnejších kúskov v každom šatníku. Jemne svetlý denim pôsobí prirodzene a dodáva rifľám ten správny retro charakter. Hodia sa doslova ku všetkému – k tielku, košeli zastrčenej do pásu aj k objemnejšej mikine. Zachované v dobrom stave bez viditeľných poškodení. '],

            ['nazov' => 'Kventinkové rifle', 'znacka' => 'Reserved', 'kategoria_id' => 2, 'cena' => 12.50, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/kvetinkove_rifle.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/kvetinkove_rifle_mini_01.png',
                'obrazky/oblecenie_obrazky/kvetinkove_rifle_mini_02.png'
                ],
            'popis' => 'Dámske modré rifle s ručne vyšívanými kvetmi – ruže, sedmokrásky a lístky pokrývajú predný diel od stehna až po podkolenie a robia z každého kroku malú výstavu. Slim strih s podhrnutými koncami pekne zvýrazní postavu a výšivka hovorí sama za seba, takže stačí jednoduchý biely top. Rifle sú zachované v dobrom stave, výšivka nepoškodená. '],

            ['nazov' => 'Červeno-žlté tepláky', 'znacka' => 'Nike', 'kategoria_id' => 2, 'cena' => 4.90, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'OK', 'obrazok' => 'obrazky/oblecenie_obrazky/cerveno_zlte_teplaky.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/cerveno_zlte_teplaky_mini_01.png',
                'obrazky/oblecenie_obrazky/cerveno_zlte_teplaky_mini_02.png'
                ],
            'popis' => 'Dámske červené tepláky so zlatou grafickou potlačou inšpirovanou runami a geometrickými vzormi – kúsok, ktorý rozhodne nezapadne do davu. Zlatá šnúrka v páse a lemované konce dokončujú detailing, ktorý pôsobí takmer ako nositeľné umenie. Mäkký materiál je príjemný na nosenie celý deň, doma aj vonku. Zachované v dobrom stave bez poškodení alebo vyblednutia vzoru. '],

            ['nazov' => 'Žlto-biele pásikaté nohavice', 'znacka' => 'H&M', 'kategoria_id' => 2, 'cena' => 3.90, 'velkost' => 'S', 'farba' => ['biela','farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/pasikate_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/pasikate_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/pasikate_nohavice_mini_02.png'
                ],
            'popis' => 'Dámske žlto-biele pruhované nohavice, ktoré si nevyžadujú žiadne doplnky – samé o sebe sú celý outfit. Širší zvislý prúžok a obrúbený spodný lem dávajú kúsku taliansky letný charakter, ktorý si rovnako dobre sadne na promenádu aj na terasu reštaurácie. Stačí jednoduchý biely top a nohavice urobia zvyšok. Zachované v dobrom stave. '],

            ['nazov' => 'Tmavomodré rifle', 'znacka' => 'Levis', 'kategoria_id' => 2, 'cena' => 10.90, 'velkost' => 'S', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/rifle_levis.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/rifle_levis_mini_01.png',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_02.png',
            ],
            'popis' => 'Dámske tmavomodré rifle Reserved s rovným klasickým strihom vhodným na každodenné nosenie. Sýta tmavomodrá farba pôsobí čisto a elegantnejšie ako klasická modrá – ľahko sa kombinuje aj s formálnejšími vrchnými dielmi. Denim má prirodzený charakter po nosení, materiál zostal bez trhlín alebo škvŕn. Second hand kúsok s dušou – viditeľne nosené, ale stále plné života.'],

            ['nazov' => 'Zelené baggy nohavice', 'znacka' => 'New Balance', 'kategoria_id' => 2, 'cena' => 6.90, 'velkost' => 'S', 'farba' => ['farebná'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/baggy_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/baggy_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/baggy_nohavice_mini_02.png'
                ],
            'popis' => 'Dámske olivové cargo nohavice s uvoľneným baggy strihom a šnúrkou v páse – pohodlie a štýl v jednom. Bočné cargo vrecká sú dosť priestranné na to, aby ste konečne nechali kabelku doma, a podhrnutý lem s kontrastným švom pridáva workwear detail, ktorý ladí s celým charakterom kúsku. Hodia sa k cropped tričku, tanktopu aj oversized košeli. '],

            ['nazov' => 'Semišové nohavice', 'znacka' => 'Levis', 'kategoria_id' => 2, 'cena' => 4.50, 'velkost' => 'L', 'farba' => ['hnedá'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/semisove_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/semisove_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/semisove_nohavice_mini_02.png'
                ],
            'popis' => 'Dámske hnedé semišové cargo nohavice s uvoľneným strihom a sťahovacou šnúrkou v páse – jesenný kúsok, ktorý kombinuje praktickosť s materiálovou zaujímavosťou. Jemný semišový povrch je príjemný na dotyk a dodáva hnedej farbe hĺbku a teplo. Bočné cargo vrecká sú priestranné, obrúbené lemy zakončujú strih s workwear detailom. Skvele ladia s krémovým tričkom, oversized bundou alebo koženou bundou. Zachované v dobrom stave. '],

            ['nazov' => 'Smokingové nohavice', 'znacka' => 'Reserved', 'kategoria_id' => 2, 'cena' => 15.50, 'velkost' => 'S', 'farba' => ['čierna'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/damske_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/damske_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/damske_nohavice_mini_02.png'
                ],
            'popis' => 'Dámske čierne smokingové nohavice s vysokým pásom, záložkami na prednom diele a širokým palazzo strihom, ktorý splýva elegantne pri každom kroku. Čierna farba a štruktúrovaný materiál robia z týchto nohavíc ideálnu voľbu na večerné udalosti, divadlo alebo firemné večierky – no zvládnu aj business look s klasickou blúzkou. Kombinujú sa skvele so saténovým topom, bielou košeľou aj výrazným blazerom. Zachované v dobrom stave.'],

            //žena - šaty - kategória 3
            ['nazov' => 'Čierne šaty', 'znacka' => 'H&M', 'kategoria_id' => 3, 'cena' => 12.00, 'velkost' => 'S', 'farba' => ['čierna'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/cierne_saty.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cierne_saty_mini_01.jpg',
                'obrazky/oblecenie_obrazky/cierne_saty_mini_02.jpg',
                'obrazky/oblecenie_obrazky/cierne_saty_mini_03.jpg',
                'obrazky/oblecenie_obrazky/cierne_saty_mini_04.jpg',
            ],
            'popis' => 'Elegantné čierne šaty značky H&M, ktoré sú vhodné na rôzne príležitosti – od pracovných stretnutí cez rodinné večere až po večerné vychádzky s priateľmi. Čierna farba je nadčasová a vždy pôsobí elegantne. Šaty majú lichotivý áčkový strih, ktorý zvýrazňuje pás a opticky predlžuje postavu. Príjemný materiál s miernym leskom dodáva šatám slávnostný nádych. Dĺžka po kolená je praktická a elegantná zároveň. Predávané ako nové – nikdy nosené, so všetkými visačkami.'],

            ['nazov' => 'Červené šaty', 'znacka' => 'H&M', 'kategoria_id' => 3, 'cena' => 12.90, 'velkost' => 'S', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/cervene_saty.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cervene_saty_mini_01.png',
                'obrazky/oblecenie_obrazky/cervene_saty_mini_02.png',
                'obrazky/oblecenie_obrazky/cervene_saty_mini_03.png',
                'obrazky/oblecenie_obrazky/cervene_saty_mini_04.png',
            ],
            'popis' => 'Dámske červené šaty H&M sú elegantný a výrazný kúsok vhodný na spoločenské udalosti aj bežné nosenie počas teplejších dní. Ľahký a príjemný materiál sa pohodlne nosí, zatiaľ čo ženský strih pekne zvýrazní postavu. Jednoduchý dizajn dopĺňa sýta červená farba, ktorá pôsobí štýlovo a ľahko sa kombinuje s doplnkami. Šaty sú používané, ale vo veľmi dobrom stave – bez dier, fľakov alebo výrazného opotrebovania.'],

            //muž - tričká - kategória 4
            ['nazov' => 'Biela košeľa', 'znacka' => 'Zara', 'kategoria_id' => 4, 'cena' => 12.90, 'velkost' => 'M', 'farba' => ['biela'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/biela_kosela.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/biela_kosela_mini_01.png',
                'obrazky/oblecenie_obrazky/biela_kosela_mini_02.png',
                'obrazky/oblecenie_obrazky/biela_kosela_mini_03.png',
            ],
            'popis' => 'Pánska biela košeľa v elegantnom a nadčasovom štýle vhodná na formálne príležitosti aj bežné nosenie. Príjemný materiál poskytuje pohodlie počas celého dňa a klasický strih sa ľahko kombinuje s nohavicami aj rifľami. Košeľa je vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],

            ['nazov' => 'Čierne tričko', 'znacka' => 'Nike', 'kategoria_id' => 4, 'cena' => 13.90, 'velkost' => 'L', 'farba' => ['čierna', 'hnedá'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/cierne_tricko.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cierne_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/cierne_tricko_mini_02.png',
            ],
            'popis' => 'Pánske oversized čierne tričko s hnedým dizajnom v modernom streetwear štýle vhodné na každodenné nosenie. Voľnejší strih poskytuje maximálne pohodlie a dobre sa kombinuje s rifľami, cargo nohavicami aj kraťasmi. Príjemný materiál zabezpečuje komfort počas celého dňa. Tričko je vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],

            ['nazov' => 'Zelené tričko', 'znacka' => 'Under Armour', 'kategoria_id' => 4, 'cena' => 4.90, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/zelene_tricko.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/zelene_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/zelene_tricko_mini_02.png'
                ],
            'popis' => 'Pánske olivové tričko s klasickým okrúhlym výstrihom a textúrou materiálu, ktorý mu dodáva prirodzený vintage charakter. Drobné detaily – kovový gombík pri výstrihu a jemné distressed miesta na prednom diele – robia z tohto trička niečo viac ako len basic kúsok. Voľnejší strih je pohodlný na celý deň a olivová farba sa kombinuje s čím chceš – rifľami, cargo nohavicami aj šortkami. Zachované v dobrom stave. '],

            ['nazov' => 'Pólo tričko', 'znacka' => 'Reserved', 'kategoria_id' => 4, 'cena' => 3.90, 'velkost' => 'L', 'farba' => ['biela','farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/polo_tricko.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/polo_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/polo_tricko_mini_02.png'
                ],
            'popis' => 'Pánske biele polo tričko s kontrastným červeným golierom a lemami rukávov, ktoré mu dodávajú športový a svieži charakter. Klasický polo strih s trojgombíkovým zapínaním sa hodí na bežné nosenie aj neformálne príležitosti. Na prednom diele sú viditeľné menšie škvrny – cena to plne zohľadňuje. Materiál je inak bez poškodení, trhlín alebo deformácií. '],

            ['nazov' => 'Čierne tričko s farebnou potlačou', 'znacka' => 'Neznáma', 'kategoria_id' => 4, 'cena' => 9.90, 'velkost' => 'S', 'farba' => ['čierna','farebná'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/cierno_farebne_tricko.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/cierno_farebne_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/cierno_farebne_tricko_mini_02.png'
                ],
            'popis' => 'Pánske čierne polo tričko s výraznou geometrickou potlačou na prednom diele – hexagóny, trojuholníky a neonové línie v tyrkysovej, ružovej, oranžovej a modrej farbe. Červený golier a lemy rukávov dopĺňajú farebný kontrast a zabraňujú tomu, aby outfit vyzeral len ako tričko. Zadný diel je čistý a minimalistický, čo dáva potlači priestor vyniknúť. Kúsok pre tých, čo sa neboja byť videní. '],

            ['nazov' => 'Modré tričko s dlhým rukávom', 'znacka' => 'New Balance', 'kategoria_id' => 4, 'cena' => 5.50, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'OK', 'obrazok' => 'obrazky/oblecenie_obrazky/modre_dlhe_tricko.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/modre_dlhe_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/modre_dlhe_tricko_mini_02.png'
                ],
            'popis' => 'Pánske modré tričko s dlhým rukávom a okrúhlym výstrihom – ten typ základného kúsku, ktorý v šatníku vždy chýba, kým ho nemáš. Sýta kráľovská modrá farba je výrazná, no stále univerzálna – hodí sa pod bundu, k cargo nohaviciam aj ako vrstvenie pod košeľu. Príjemný materiál sa pohodlne nosí celý deň. Zachované v dobrom stave bez poškodení. '],

            ['nazov' => 'Žlté tričko', 'znacka' => 'Mango', 'kategoria_id' => 4, 'cena' => 5.90, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'OK', 'obrazok' => 'obrazky/oblecenie_obrazky/zlte_tricko.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/zlte_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/zlte_tricko_mini_02.png'
                ],
            'popis' => 'Pánske horčicovožlté tričko s malým vreckom na hrudi a jemnou slub textúrou materiálu, ktorá dodáva jednoduchému strihu charakter. Malé vyšité logo na vrecku je nenápadný detail, ktorý odlišuje tričko od bežného basic kúsku. Teplá horčicová farba funguje skvele na jeseň aj v lete – hodí sa k olivovým, hnedým aj tmavomodrým nohaviciam. Zachované v dobrom stave bez poškodení. '],

            ['nazov' => 'Šedé športové tričko', 'znacka' => 'Under Armour', 'kategoria_id' => 4, 'cena' => 4.90, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/sede_tricko.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/sede_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/sede_tricko_mini_02.png'
                ],
            'popis' => 'Pánske šedé športové tričko s funkčným materiálom, kontrastnými bielymi švami na ramenách a bokoch a jemnou textúrou, ktorá odvádza vlhkosť od tela. Anatomický strih sleduje postavu a neobmedzuje pohyb – ideálne na beh, posilňovňu aj outdoorové aktivity. Šedá farba je klasická voľba, ktorá sa nezašpiní na prvý pohľad a dobre vyzerá aj po tréningu. Zachované v dobrom stave bez poškodení. '],

            ['nazov' => 'Denim košeľa', 'znacka' => 'H&M', 'kategoria_id' => 4, 'cena' => 6.90, 'velkost' => 'S', 'farba' => ['farebná'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/kosela_denim.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/kosela_denim_mini_01.png',
                'obrazky/oblecenie_obrazky/kosela_denim_mini_02.png'
                ],
            'popis' => 'Pánska džínsová košeľa s western inšpiráciou – dve náprsné vrecká, kontrastné prešívanie a kovové cvočky namiesto gombíkov robia z nej niečo viac ako len basic kúsok. Strednomodrý denim má prirodzený vintage charakter a materiál je príjemne mäkký na nosenie. Hodí sa na telo ako hlavný kúsok, zastrčená do nohavíc alebo rozopnutá cez tričko. Zachované v dobrom stave bez poškodení. '],

            ['nazov' => 'Palmová košeľa', 'znacka' => 'H&M', 'kategoria_id' => 4, 'cena' => 4.50, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/palmova_kosela.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/palmova_kosela_mini_01.png',
                'obrazky/oblecenie_obrazky/palmova_kosela_mini_02.png'
                ],
            'popis' => 'Pánska krémová košeľa s krátkym rukávom a tropickou potlačou paliem, listov a kvetov – havajský štýl, ktorý nepotrebuje vysvetlenie. Ľahký ľanový materiál je ideálny na teplé dni a krátky rukáv s náprsným vreckom na gombík dodáva kúsku uvoľnený resort charakter. Hodí sa rovnako dobre na pláž, letný festival aj na večeru vonku. Drevené gombíky sú príjemný prírodný detail. Zachované v dobrom stave bez poškodení. '],

            ['nazov' => 'Károvaná košeľa', 'znacka' => 'Levis', 'kategoria_id' => 4, 'cena' => 2.90, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/karovana_kosela.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/karovana_kosela_mini_01.png',
                'obrazky/oblecenie_obrazky/karovana_kosela_mini_02.png'
                ],
            'popis' => 'Pánska flanelová košeľa s červeno-modrým károvaným vzorom a dlhým rukávom – klasický workwear kúsok, ktorý sa nosí rovnako dobre na drevorubačskom výlete aj v meste cez tričko ako alternatíva k bunde. Dvojité náprsné vrecká s gombíkmi a hustý flanelový materiál robia z košele spoľahlivého spoločníka na chladnejšie dni. Teplá kombinácia červenej a nočnej modrej je nadčasová a ľahko sa kombinuje s rifľami aj cargo nohavicami. Zachované v dobrom stave bez poškodení. '],

            ['nazov' => 'Čierne tričko s bielymi bodkami', 'znacka' => 'Reserved', 'kategoria_id' => 4, 'cena' => 10.50, 'velkost' => 'S', 'farba' => ['čierna'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/cierno_biele_tricko.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/cierno_biele_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/cierno_biele_tricko_mini_02.png'
                ],
            'popis' => 'Pánske čierne tričko s ručne pôsobiacou bielou paint splatter potlačou – ako keby niekto namočil štetec a pustil ho na plátno. Každý kus vyzerá trochu inak, čo z neho robí takmer unikát. Nosí sa skvele samo o sebe k čiernym aj modrým rifľam, alebo ako základ pod otvorenú košeľu. Zachované v dobrom stave bez poškodení. '],

            ['nazov' => 'Hnedé tričko', 'znacka' => 'Neznáma', 'kategoria_id' => 4, 'cena' => 4.90, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/hnede_tricko.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/hnede_tricko_mini_01.png',
                'obrazky/oblecenie_obrazky/hnede_tricko_mini_02.png'
                ],
            'popis' => 'Pánske hnedé tričko s kontrastnými čiernymi pruhmi na ramenách, ktoré mu dodávajú retro športový charakter. Dvojité pruhy siahajúce od goliera po rukávy sú jednoduchý detail, ktorý mení obyčajné tričko na niečo s osobnosťou. Teplá hnedá farba ladí s čiernou, béžovou aj olivovou. Pohodlný klasický strih vhodný na každodenné nosenie. Zachované v dobrom stave bez poškodení. '],

            //muž - nohavice - kategória 5
            ['nazov' => 'Rifle Levis', 'znacka' => 'Levis', 'kategoria_id' => 5, 'cena' => 15.50, 'velkost' => 'XL', 'farba' => ['farebná'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/rifle_levis.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/rifle_levis_mini_01.png',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_02.png',
            ],
            'popis' => 'Pánske modré rifle Levis vo veľkosti XL s rovným klasickým strihom, ktorý poskytuje dostatok priestoru pre pohodlný pohyb počas celého dňa. Odolný denim materiál je zárukou dlhej životnosti a charakteristického štýlu tejto legendárnej značky. Kovové nity a charakteristický kožený štítok Levis sú znakom kvality. Modrá farba je univerzálna a hodí sa k akémukoľvek vrchnému oblečeniu. Nosené, ale zachované v dobrom stave – bez výrazného opotrebovania, trhlín alebo škvŕn.'],

            ['nazov' => 'Nohavice Pull&Bear', 'znacka' => 'Pull&Bear', 'kategoria_id' => 5, 'cena' => 11.50, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/maskac_nohavice.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/maskac_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/maskac_nohavice_mini_02.png',
                'obrazky/oblecenie_obrazky/maskac_nohavice_mini_03.png',
                'obrazky/oblecenie_obrazky/maskac_nohavice_mini_04.png',
            ],
            'popis' => 'Pánske maskáčové nohavice Pull&Bear sú štýlový a pohodlný kúsok na každodenné nosenie. Odolný materiál spolu s praktickým strihom poskytuje dostatok komfortu aj pri dlhšom nosení. Nohavice majú viacero vreciek, čo zvyšuje ich praktickosť, a moderný maskáčový vzor dodáva outfitu výrazný streetwear vzhľad. Používané, ale zachovalé v dobrom stave – bez dier, fľakov alebo výrazného opotrebovania.'],

            ['nazov' => 'Hnedé nohavice', 'znacka' => 'Zara', 'kategoria_id' => 5, 'cena' => 7.50, 'velkost' => 'M', 'farba' => ['hnedá'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/hnede_nohavice.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/hnede_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/hnede_nohavice_mini_02.png'
            ],
            'popis' => 'Pánske hnedé nohavice s klasickým rovným strihom, ktorý poskytuje pohodlný pohyb počas celého dňa. Vyrobené z kvalitného bavlneného materiálu v tmavohnedej farbe, ktorá dodáva eleganciu aj ležérnosť zároveň. Nohavice sú vybavené predným zapínaním na zips a gombík, bočnými vreckami pre pohodlné nosenie. Tmavohnedá farba je všestranná a skvele sa kombinuje s bielymi, krémovými či béžovými vrchnými dielmi. Zachované v dobrom stave – bez výrazného opotrebovania, trhlín alebo škvŕn.'],

            ['nazov' => 'Tyrkysové nohavice', 'znacka' => 'Mango', 'kategoria_id' => 5, 'cena' => 4.50, 'velkost' => 'S', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/tyrkysove_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/tyrkysove_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/tyrkysove_nohavice_mini_02.png'
            ],
            'popis' => 'Pánske tyrkysové nohavice značky Mango vo veľkosti S s klasickým strihom inšpirovaným rifľami, ktorý poskytuje pohodlný pohyb počas celého dňa. Vyrobené z kvalitného bavlneného materiálu v živej tyrkysovej farbe, ktorá dodáva outfitu výrazný a svieži nádych. Nohavice sú vybavené predným zapínaním na zips a gombík, bočnými aj zadnými vreckami pre každodennú praktickosť. Tyrkysová farba sa skvele kombinuje s bielym, čiernym alebo krémovým vrchným oblečením. Používané, ale zachované v dobrom stave – bez výrazného opotrebovania, trhlín alebo škvŕn.'],

            ['nazov' => 'Šedé nohavice', 'znacka' => 'H&M', 'kategoria_id' => 5, 'cena' => 8.90, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/sede_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/sede_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/sede_nohavice_mini_02.png'
                ],
            'popis' => 'Pánske šedé cargo nohavice s voľným strihom a funkčnými bočnými vreckami – klasika workwear štýlu, ktorá nikdy nevyjde z módy. Odolný bavlnený materiál v šedej farbe sa ľahko kombinuje s čímkoľvek od basic tričiek až po hoodies. Spodné lemy s reguláciou dávajú možnosť viacerých nosení. Používané, s bežnými znakmi nosenia – bez trhlín alebo škvŕn. '],

            ['nazov' => 'Červeno-žlté tepláky', 'znacka' => 'Nike', 'kategoria_id' => 5, 'cena' => 7.90, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/cerveno_zlte_teplaky.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/cerveno_zlte_teplaky_mini_01.png',
                'obrazky/oblecenie_obrazky/cerveno_zlte_teplaky_mini_02.png'
                ],
            'popis' => 'Pánske červené tepláky s výraznou zlatou potlačou geometrických a runových motívov – pre tých, ktorí sa neboja zaujať. Pohodlný strih so stiahnutým spodným lemom drží tvar a zlatá šnúrka v páse pridáva štýlový detail. Fleecový materiál príjemne zahreje a zároveň dobre drží farbu aj vzor. Zachované v dobrom stave, vzor bez poškodenia alebo vyblednutia. '],

            ['nazov' => 'Oblekové nohavice', 'znacka' => 'Mango', 'kategoria_id' => 5, 'cena' => 15.50, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/oblekove_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/oblekove_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/oblekove_nohavice_mini_02.png'
                ],
            'popis' => 'Pánske tmavomodré oblekové nohavice s klasickým tailored strihom a spodným lemom – detail, ktorý okamžite prezradí dôraz na kvalitu. Štruktúrovaný materiál drží tvar počas celého dňa a tmavomodrá farba je univerzálna voľba, ktorá funguje rovnako s bielou košeľou a sakom ako s polo tričkom v business casual outfite. Do kancelárie, na svadbu alebo na pohovor. Zachované vo veľmi dobrom stave, bez záhybov alebo poškodení. '],

            ['nazov' => 'Žlto-biele pásikaté nohavice', 'znacka' => 'Neznáma', 'kategoria_id' => 5, 'cena' => 9.90, 'velkost' => 'L', 'farba' => ['biela','farebná'], 'stav' => 'OK', 'obrazok' => 'obrazky/oblecenie_obrazky/pasikate_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/pasikate_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/pasikate_nohavice_mini_02.png'
                ],
            'popis' => 'Pánske žlto-biele pruhované nohavice pre tých, čo sa neboja farby. Tailored strih s obrúbeným lemom ich drží na hranici medzi plážovým štýlom a retro eleganciou – niekto povie Riviera, niekto povie Wes Anderson. Hodia sa k bielej košeli, navy tričku alebo ľanové saku. Zachované v dobrom stave bez poškodení. '],

            ['nazov' => 'Svetlomodré rifle', 'znacka' => 'Reserved', 'kategoria_id' => 5, 'cena' => 5.90, 'velkost' => 'S', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/rifle_levis.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/rifle_levis_mini_01.png',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_02.png',
            ],
            'popis' => 'Pánske svetlomodré rifle Reserved vo veľkosti S s rovným klasickým strihom vhodným na každodenné nosenie. Denim má prirodzený charakter po nosení – farba je živá a materiál zostal bez trhlín alebo škvŕn. Kombinujú sa ľahko s čímkoľvek od básic trička až po košeľu. Typický second hand kúsok s dušou – viditeľne nosené, ale stále plné života.'],

            ['nazov' => 'Zelené baggy nohavice', 'znacka' => 'New Balance', 'kategoria_id' => 5, 'cena' => 8.90, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/baggy_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/baggy_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/baggy_nohavice_mini_02.png'
                ],
            'popis' => 'Pánske olivové cargo nohavice s baggy strihom a pohodlnou šnúrkou v páse namiesto tuhého opasku – na celodennné nosenie stvorené. Bočné vrecká zvládnu všetko od peňaženky po telefón a podhrnutý spodný lem s kontrastným švom je ten typ detailu, ktorý si všimnú ľudia čo rozumejú veci. Kombinujú sa bez námahy s bielym tričkom alebo fleece mikinou. Zachované v dobrom stave. '],

            ['nazov' => 'Semišové nohavice', 'znacka' => 'Mango', 'kategoria_id' => 5, 'cena' => 9.50, 'velkost' => 'S', 'farba' => ['hnedá'], 'stav' => 'OK', 'obrazok' => 'obrazky/oblecenie_obrazky/semisove_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/semisove_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/semisove_nohavice_mini_02.png'
                ],
            'popis' => 'Pánske hnedé semišové cargo nohavice s voľným strihom, sťahovacou šnúrkou a funkčnými bočnými vreckami – ideálny jesenno-zimný kúsok pre tých, čo chcú viac ako len basic. Semišový materiál má bohatú textúru, ktorá povýši aj najjednoduchší outfit. Teplá hnedá farba sa hodí k béžovej, olivovej aj čiernej. Obrúbené spodné lemy a kontrastné stehy dodávajú detailing, ktorý stojí za povšimnutie. Zachované v dobrom stave. '],

            ['nazov' => 'Roztrhané rifle', 'znacka' => 'Zara', 'kategoria_id' => 5, 'cena' => 8.50, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/roztrhane_rifle.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/roztrhane_rifle_mini_01.png',
                'obrazky/oblecenie_obrazky/roztrhane_rifle_mini_02.png'
                ],
            'popis' => 'Tmavomodré distressed rifle s výraznými trhlinami a strapatými hranami – zámerný dizajn, ktorý hovorí za seba. Silne vyšisovaný denim s podhrnutými lemami má autentický vintage charakter, aký sa nedá kúpiť nový. Trhliny sú súčasťou štýlu, nie poškodením. Hodia sa k oversized tričku, crop topu alebo jednoduchej bielej košeli. Typický streetwear kúsok pre tých, čo majú radi výraz. '],

            ['nazov' => 'Pracovné nohavice', 'znacka' => 'Neznáma', 'kategoria_id' => 5, 'cena' => 3.90, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/pracovne_nohavice.png',
                'miniatury' => [
                'obrazky/oblecenie_obrazky/pracovne_nohavice_mini_01.png',
                'obrazky/oblecenie_obrazky/pracovne_nohavice_mini_02.png'
                ],
            'popis' => 'Pánske tmavomodré pracovné nohavice s dvojitým predným dielom na kolenách, kovovými nitmi a robustným denim materiálom – stavané na výdrž, nie na výstavu. Charakteristický carpenter strih s bočným vreckom na náradie a zosilnenými švami hovorí o tom, že tieto nohavice vedia, čo je práca. Viditeľné znaky používania dodávajú autentický workwear charakter, materiál zostal pevný a bez poškodení. Fungujú rovnako dobre na stavbe aj v streetwear outfite. '],

            //muž - mikiny - kategória 6

            ['nazov' => 'Hnedá mikina na zips', 'znacka' => 'Neznáma', 'kategoria_id' => 6, 'cena' => 14.50, 'velkost' => 'L', 'farba' => ['hnedá'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/hneda_zips_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/hneda_zips_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/hneda_zips_mikina_mini_02.png',
            ],
            'popis' => 'Pánska hnedá mikina na zips s pohodlným strihom vhodná na každodenné nosenie. Mäkký materiál poskytuje komfort počas chladnejších dní a praktický zips uľahčuje obliekanie. Jednoduchý dizajn sa dobre kombinuje s rôznymi outfitmi. Mikina je vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],

            ['nazov' => 'Čierny sveter', 'znacka' => 'H&M', 'kategoria_id' => 6, 'cena' => 8.50, 'velkost' => 'M', 'farba' => ['čierna'], 'stav' => 'ok', 'obrazok' => 'obrazky/oblecenie_obrazky/cierny_sveter.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cierny_sveter_mini_01.png',
                'obrazky/oblecenie_obrazky/cierny_sveter_mini_02.png',
            ],
            'popis' => 'Pánsky čierny sveter v jednoduchom elegantnom štýle vhodný na každodenné nosenie aj formálnejšie príležitosti. Príjemný materiál poskytuje pohodlie počas chladnejších dní a dobre sa kombinuje s rifľami aj nohavicami. Zachovalý stav bez výrazných známok opotrebovania.'],

            ['nazov' => 'Zelený pulóver', 'znacka' => 'Neznáma', 'kategoria_id' => 6, 'cena' => 6.50, 'velkost' => 'S', 'farba' => ['farebná'], 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/zeleny_pulover.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/zeleny_pulover_mini_01.png',
                'obrazky/oblecenie_obrazky/zeleny_pulover_mini_02.png',
                'obrazky/oblecenie_obrazky/zeleny_pulover_mini_03.png',
            ],
            'popis' => 'Pánsky zelený pulóver v elegantnom a pohodlnom prevedení vhodný na každodenné nosenie aj formálnejšie príležitosti. Príjemný materiál poskytuje komfort počas celého dňa a dobre sa kombinuje s rifľami aj nohavicami. Pulóver je vo veľmi dobrom stave bez poškodení alebo výrazných známok opotrebovania.'],

            ['nazov' => 'Béžový sveter', 'znacka' => 'Mango', 'kategoria_id' => 6, 'cena' => 9.90, 'velkost' => 'S', 'farba' => ['hnedá'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/bezovy_sveter.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/bezovy_sveter_mini_01.png',
                'obrazky/oblecenie_obrazky/bezovy_sveter_mini_02.png'
            ],
            'popis' => 'Pánsky béžový sveter v elegantnom a univerzálnom štýle vhodný na každodenné nosenie aj formálnejšie príležitosti. Príjemný materiál poskytuje pohodlie počas celého dňa a dobre sa kombinuje s rifľami aj nohavicami. Sveter je vo veľmi dobrom stave bez výrazných známok opotrebovania.'],

            ['nazov' => 'Zebra mikina', 'znacka' => 'Nike', 'kategoria_id' => 6, 'cena' => 16.50, 'velkost' => 'L', 'farba' => ['čierna','biela'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/zebra_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/zebra_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/zebra_mikina_mini_02.png',
                'obrazky/oblecenie_obrazky/zebra_mikina_mini_03.png',
            ],
            'popis' => 'Pánska zebra mikina s výrazným čierno-bielym vzorom, ktorý zaujme na prvý pohľad. Pohodlný materiál a voľnejší strih zabezpečujú komfort počas celého dňa. Ideálna na bežné nosenie alebo ako štýlový doplnok moderného outfitu. Mikina je vo veľmi dobrom stave bez poškodení.'],

            ['nazov' => 'Biely sveter', 'znacka' => 'Mango', 'kategoria_id' => 6, 'cena' => 7.90, 'velkost' => 'M', 'farba' => ['biela'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/biely_sveter.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/biely_sveter_mini_01.png',
                'obrazky/oblecenie_obrazky/biely_sveter_mini_02.png',
            ],
            'popis' => 'Pánsky biely sveter v jednoduchom a elegantnom štýle vhodný na každodenné nosenie aj formálnejšie príležitosti. Mäkký a príjemný materiál poskytuje pohodlie počas celého dňa a dobre sa kombinuje s rôznymi outfitmi. Sveter je vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],

             ['nazov' => 'Čierny sveter', 'znacka' => 'H&M', 'kategoria_id' => 6, 'cena' => 12.90, 'velkost' => 'S', 'farba' => ['čierna'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/cierny_sveter.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cierny_sveter_mini_01.png',
                'obrazky/oblecenie_obrazky/cierny_sveter_mini_02.png',
            ],
            'popis' => 'Pánsky čierny sveter s nadčasovým dizajnom vhodný na bežné nosenie aj elegantnejšie príležitosti. Mäkký a pohodlný materiál príjemne zahreje počas chladnejších dní a zároveň sa ľahko kombinuje s rifľami, nohavicami či košeľou. Sveter je zachovalý vo veľmi dobrom stave bez viditeľných poškodení alebo výrazného opotrebovania.'],

            ['nazov' => 'Biela mikina na zips', 'znacka' => 'Puma', 'kategoria_id' => 6, 'cena' => 10.90, 'velkost' => 'S', 'farba' => ['biela'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/biela_zips_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/biela_zips_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/biela_zips_mikina_mini_02.png',
            ],
            'popis' => 'Pánska biela mikina na zips v modernom a pohodlnom prevedení vhodná na každodenné nosenie. Mäkký materiál poskytuje komfort počas celého dňa a praktický zips umožňuje jednoduché obliekanie. Mikina sa ľahko kombinuje s rôznymi outfitmi a je vo veľmi dobrom stave bez poškodení.'],
            
            ['nazov' => 'Žltá mikina', 'znacka' => 'New Balnance', 'kategoria_id' => 6, 'cena' => 5.90, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'ok', 'obrazok' => 'obrazky/oblecenie_obrazky/zlta_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/zlta_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/zlta_mikina_mini_02.png',
                'obrazky/oblecenie_obrazky/zlta_mikina_mini_03.png',
            ],
            'popis' => 'Pánska žltá mikina v pohodlnom a modernom prevedení vhodná na každodenné nosenie. Mäkký materiál poskytuje komfort počas celého dňa a zároveň dobre drží tvar. Výrazná žltá farba dodáva outfitu energiu a ľahko sa kombinuje s rifľami alebo teplákmi. Mikina je vo veľmi dobrom stave bez poškodení alebo výrazného opotrebovania.'],
            
            ['nazov' => 'Béžový sveter', 'znacka' => 'Mango', 'kategoria_id' => 6, 'cena' => 9.90, 'velkost' => 'L', 'farba' => ['hnedá'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/bezovy_sveter.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/bezovy_sveter_mini_01.png',
                'obrazky/oblecenie_obrazky/bezovy_sveter_mini_02.png'
            ],
            'popis' => 'Pánsky béžový pletený sveter vhodný na bežné nosenie počas chladnejších dní. Príjemný materiál je pohodlný a dobre sedí. Jednoduchý dizajn sa ľahko kombinuje s rifľami aj nohavicami. Sveter je zachovalý a vo veľmi dobrom stave bez výrazného opotrebovania.'],

            ['nazov' => 'Zelený pulóver', 'znacka' => 'Neznáma', 'kategoria_id' => 6, 'cena' => 5.50, 'velkost' => 'M', 'farba' => ['farebná'], 'stav' => 'ok', 'obrazok' => 'obrazky/oblecenie_obrazky/zeleny_pulover.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/zeleny_pulover_mini_01.png',
                'obrazky/oblecenie_obrazky/zeleny_pulover_mini_02.png',
                'obrazky/oblecenie_obrazky/zeleny_pulover_mini_03.png',
            ],
            'popis' => 'Pánsky zelený pulóver v elegantnom a pohodlnom prevedení vhodný na každodenné nosenie aj formálnejšie príležitosti. Príjemný materiál poskytuje komfort počas celého dňa a dobre sa kombinuje s rifľami aj nohavicami. Pulóver je vo veľmi dobrom stave bez poškodení alebo výrazných známok opotrebovania.'],

            ['nazov' => 'Biela mikina', 'znacka' => 'Tommy Hilfiger', 'kategoria_id' => 6, 'cena' => 12.90, 'velkost' => 'M', 'farba' => ['biela'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/biela_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/biela_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/biela_mikina_mini_02.png',
                'obrazky/oblecenie_obrazky/biela_mikina_mini_03.png',
            ],
            'popis' => 'Pánska biela mikina v jednoduchom a univerzálnom dizajne vhodná na každodenné nosenie. Mäkký a príjemný materiál zabezpečuje pohodlie počas celého dňa. Mikina má klasický strih, ktorý sa dobre kombinuje s rifľami aj teplákmi. Zachovalý stav bez výrazných známok nosenia.'],

            ['nazov' => 'Červená mikina', 'znacka' => 'Nike', 'kategoria_id' => 6, 'cena' => 16.50, 'velkost' => 'L', 'farba' => ['farebná'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/cervena_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cervena_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/cervena_mikina_mini_02.png',
                'obrazky/oblecenie_obrazky/cervena_mikina_mini_03.png',
                'obrazky/oblecenie_obrazky/cervena_mikina_mini_04.png',
            ],
            'popis' => 'Pánska červená mikina s pohodlným strihom a príjemným materiálom vhodná na bežné nosenie. Mikina poskytuje komfort počas chladnejších dní a zároveň pôsobí moderne a športovo. Zachovalý stav bez poškodení alebo výrazného opotrebovania.'],

            ['nazov' => 'Čierna mikina', 'znacka' => 'Vans', 'kategoria_id' => 6, 'cena' => 16.20, 'velkost' => 'L', 'farba' => ['čierna'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/cierna_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/cierna_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/cierna_mikina_mini_02.png',
                'obrazky/oblecenie_obrazky/cierna_mikina_mini_03.png',
            ],
            'popis' => 'Pánska čierna mikina v minimalistickom štýle vhodná na šport aj každodenné nosenie. Kvalitný materiál je pohodlný a dobre drží tvar aj po viacerých praniach. Praktický a univerzálny kúsok do každého šatníka.'],

            ['nazov' => 'Biela mikina', 'znacka' => 'Tommy Hilfiger', 'kategoria_id' => 6, 'cena' => 11.90, 'velkost' => 'L', 'farba' => ['biela'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/biela_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/biela_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/biela_mikina_mini_02.png',
                'obrazky/oblecenie_obrazky/biela_mikina_mini_03.png',
            ],
            'popis' => 'Pánska biela mikina v pohodlnom a nadčasovom prevedení vhodná na každodenné nosenie. Príjemný mäkký materiál poskytuje komfort počas celého dňa a klasický strih umožňuje jednoduché kombinovanie s rifľami, teplákmi aj športovým outfitom. Mikina je vo veľmi dobrom stave bez viditeľných poškodení alebo výrazného opotrebovania.'],


            ['nazov' => 'Hnedá mikina', 'znacka' => 'Nike', 'kategoria_id' => 6, 'cena' => 18.90, 'velkost' => 'M', 'farba' => ['hnedá'], 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/hneda_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/hneda_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/hneda_mikina_mini_02.png',
                'obrazky/oblecenie_obrazky/hneda_mikina_mini_03.png',
            ],
            'popis' => 'Pánska hnedá mikina s pohodlným strihom a mäkkým materiálom vhodná na každodenné nosenie. Jednoduchý dizajn sa ľahko kombinuje s rôznymi outfitmi. Mikina je vo veľmi dobrom stave bez viditeľných poškodení.'],

            ['nazov' => 'Biela mikina na zips', 'znacka' => 'Levis', 'kategoria_id' => 6, 'cena' => 17.90, 'velkost' => 'S', 'farba' => 'biela', 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/biela_zips_mikina.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/biela_zips_mikina_mini_01.png',
                'obrazky/oblecenie_obrazky/biela_zips_mikina_mini_02.png'
            ],
            'popis' => 'Pánska biela mikina na zips v modernom a pohodlnom prevedení vhodná na každodenné nosenie. Mäkký materiál poskytuje komfort počas celého dňa a praktický zips umožňuje jednoduché obliekanie. Mikina sa ľahko kombinuje s rôznymi outfitmi a je vo veľmi dobrom stave bez poškodení.'],
             ];

        //pre každý produkt sa vytvorí záznam v databáze
        foreach ($produkty as $index => $p) {
            $produkt = Produkt::create([
                'kategoria_id' => $p['kategoria_id'],
                'nazov'        => $p['nazov'],
                'znacka'       => $p['znacka'],
                'cena'         => $p['cena'],
                'velkost'      => $p['velkost'],
                'farba'        => $p['farba'],
                'stav'         => $p['stav'],
                'popis'        => $p['popis'],
                'dostupnost'   => true,
                'created_at'   => now()->addSeconds($index),
                'updated_at'   => now()->addSeconds($index)
            ]);

            //uloží sa hlavný obrázok
            Obrazok::create([
                'produkt_id' => $produkt->id,
                'url'        => $p['obrazok'],
                'hlavny'     => true,
                'poradie'    => 1,
            ]);


            //uložia sa miniatúry
            if (isset($p['miniatury'])) {
                foreach ($p['miniatury'] as $index => $mini) {
                    Obrazok::create([
                        'produkt_id' => $produkt->id,
                        'url'        => $mini,
                        'hlavny'     => false,
                        'poradie'    => $index + 2,
                    ]);
                }
            }
        }
    }
}