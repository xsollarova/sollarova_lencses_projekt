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
        $this->call(KategoriaSeeder::class);

        $produkty = [
            //žena - topy 1
            ['nazov' => 'Tričko Nike', 'znacka' => 'Nike', 'kategoria_id' => 1, 'cena' => 7.90, 'velkost' => 'XS', 'farba' => 'biela', 'stav' => 'OK', 'obrazok' => 'obrazky/oblecenie_obrazky/tricko_nike.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/tricko_nike_mini_01.jpg',
                'obrazky/oblecenie_obrazky/tricko_nike_mini_02.jpg',
                'obrazky/oblecenie_obrazky/tricko_nike_mini_03.jpg',
                'obrazky/oblecenie_obrazky/tricko_nike_mini_04.jpg',
            ],
            'popis' => 'Klasické biele tričko značky Nike s ikonickým Swoosh logom na hrudi. Vyrobené z mäkkej, priedušnej bavlny ktorá zaručuje pohodlie počas celého dňa – či už na ranný beh, tréning v posilňovni alebo len tak na prechádzku mestom. Tričko má klasický okrúhly výstrih a voľnejší strih ktorý lichotí rôznym typom postavy. Neutrálna biela farba sa ľahko kombinuje s čímkoľvek – rifľami, teplákami aj šortkami. Ide o second hand kúsok v dobrom stave – bez škvŕn, dier alebo poškodení. Po vypraní vyzerá ako nové a je pripravené na ďalšie nosenie.'],


            ['nazov' => 'Sveter Reserved', 'znacka' => 'Reserved', 'kategoria_id' => 1, 'cena' => 11.00, 'velkost' => 'M', 'farba' => 'hnedá', 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/sveter_reserved.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/sveter_reserved_mini_01.jpg',
                'obrazky/oblecenie_obrazky/sveter_reserved_mini_02.jpg',
                'obrazky/oblecenie_obrazky/sveter_reserved_mini_03.jpg',
                'obrazky/oblecenie_obrazky/sveter_reserved_mini_04.jpg',
            ],
            'popis' => 'Príjemný hnedý sveter značky Reserved, ktorý je ideálnym spoločníkom na chladnejšie jesenné aj zimné dni. Jemný pletený materiál príjemný na dotyk zahreje aj v tých najchladnejších momentoch. Voľnejší oversized strih sa hodí k rifľam, sukni aj nohaviciam. Zelená farba dodáva outfitu svieži nádych a ľahko sa kombinuje s neutrálnymi farbami ako béžová, hnedá či čierna. Second hand kúsok zachovaný v dobrom stave – bez dier, žmolkov alebo poškodení. Vyzerá takmer ako nový a je pripravený zahrievať ďalšieho majiteľa.'],


            ['nazov' => 'Bunda Zara', 'znacka' => 'Zara', 'kategoria_id' => 1, 'cena' => 14.90, 'velkost' => 'M', 'farba' => 'hnedá', 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/bunda_zara.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/bunda_zara_mini_01.jpg',
                'obrazky/oblecenie_obrazky/bunda_zara_mini_02.jpg',
                'obrazky/oblecenie_obrazky/bunda_zara_mini_03.jpg',
                'obrazky/oblecenie_obrazky/bunda_zara_mini_04.jpg',
            ],
            'popis' => 'Elegantná hnedá bunda značky Zara je ideálnym kúskom do prechodného obdobia. Vďaka svojmu minimalistickému dizajnu sa ľahko kombinuje s rôznymi outfitmi – či už do mesta, do školy alebo na bežné každodenné nosenie. Bunda je vyrobená z príjemného a kvalitného materiálu, ktorý poskytuje pohodlie počas celého dňa. Má klasický strih, ktorý lichotí postave a teplú hnedú farbu, ktorá je v posledných sezónach veľmi trendy. Je vybavená praktickými bočnými vreckami a zapínaním na zips. Ide o second hand kúsok vo veľmi dobrom stave – bez viditeľných poškodení, pripravený na ďalšie nosenie.'],
            

            ['nazov' => 'Kabát Mango', 'znacka' => 'Mango', 'kategoria_id' => 1, 'cena' => 25.00, 'velkost' => 'S', 'farba' => 'hnedá', 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/kabat_mango.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/kabat_mango_mini_01.jpg',
                'obrazky/oblecenie_obrazky/kabat_mango_mini_02.jpg',
                'obrazky/oblecenie_obrazky/kabat_mango_mini_03.jpg',
                'obrazky/oblecenie_obrazky/kabat_mango_mini_04.jpg',
            ],
            'popis' => 'Štýlový hnedý kabát značky Mango s klasickým rovným strihom, ktorý nikdy nevyjde z módy. Kvalitný huňatý materiál poskytuje príjemné teplo aj v chladnejších dňoch bez toho, aby ste sa cítili stiesnene. Kabát má dvojradové zapínanie na gombíky, dve priestranné bočné vrecká a jemne štruktúrovaný povrch, ktorý pôsobí luxusným dojmom. Hodí sa rovnako dobre do práce aj na víkendový výlet. Nosený len niekoľkokrát, stav ako nový – bez akýchkoľvek poškodení, škvŕn či deformácií.'],

            //žena - nohavice 2
            ['nazov' => 'Rifle Levis', 'znacka' => 'Levis', 'kategoria_id' => 2, 'cena' => 22.00, 'velkost' => 'M', 'farba' => 'modrá', 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/rifle_levis.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/rifle_levis_mini_01.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_02.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_03.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_04.jpg',
            ],
            'popis' => 'Nadčasové modré rifle značky Levis v obľúbenom strihu straight fit, ktorý sluší každej postave. Kvalitný pevný denim materiál, ktorý vydrží roky nosenia a s každým praním získava krajší vintage charakter. Rifle majú kovové nity na namáhaných miestach a charakteristický kožený štítok Levis na zadnom páse. Hodí sa ku každému outfitu – tričku, svetru, košeli aj saku. Minimálne nosené, bez akýchkoľvek poškodení alebo výrazného opotrebovania. Second hand kúsok, ktorý vyzerá takmer ako nový.'],

            //žena - šaty 3
            ['nazov' => 'Šaty H&M', 'znacka' => 'H&M', 'kategoria_id' => 3, 'cena' => 12.00, 'velkost' => 'S', 'farba' => 'čierna', 'stav' => 'nové', 'obrazok' => 'obrazky/oblecenie_obrazky/saty_H&M.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/saty_H&M_mini_01.jpg',
                'obrazky/oblecenie_obrazky/saty_H&M_mini_02.jpg',
                'obrazky/oblecenie_obrazky/saty_H&M_mini_03.jpg',
                'obrazky/oblecenie_obrazky/saty_H&M_mini_04.jpg',
            ],
            'popis' => 'Elegantné čierne šaty značky H&M, ktoré sú vhodné na rôzne príležitosti – od pracovných stretnutí cez rodinné večere až po večerné vychádzky s priateľmi. Čierna farba je nadčasová a vždy pôsobí elegantne. Šaty majú lichotivý áčkový strih, ktorý zvýrazňuje pás a opticky predlžuje postavu. Príjemný materiál s miernym leskom dodáva šatám slávnostný nádych. Dĺžka po kolená je praktická a elegantná zároveň. Predávané ako nové – nikdy nosené, so všetkými visačkami.'],

            //žena - mikiny 4
            ['nazov' => 'Mikina Adidas', 'znacka' => 'Adidas', 'kategoria_id' => 4, 'cena' => 8.50, 'velkost' => 'S', 'farba' => 'modrá', 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/mikina_adidas.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/mikina_adidas_mini_01.jpg',
                'obrazky/oblecenie_obrazky/mikina_adidas_mini_02.jpg',
                'obrazky/oblecenie_obrazky/mikina_adidas_mini_03.jpg',
                'obrazky/oblecenie_obrazky/mikina_adidas_mini_04.jpg',
            ],
            'popis' => 'Pohodlná modrá mikina značky Adidas s charakteristickými troma pruhmi na rukávoch. Mäkký flísový materiál zvnútra zahreje a zároveň je dostatočne priedušný na aktívne nosenie počas celého dňa. Mikina má praktické vrecko vpredu a stahovateľnú kapucňu. Voľnejší strih umožňuje pohodlný pohyb pri športe aj relaxe. Modrá farba je svieža a ľahko sa kombinuje s čiernou, bielou aj sivou. Použitá, ale starostlivo udržiavaná – bez poškodení, dier ani vybliednutia.'],

            //žena - topánky 5
            ['nazov' => 'Topánky Vans', 'znacka' => 'Vans', 'kategoria_id' => 5, 'cena' => 15.90, 'velkost' => 'EU 38', 'farba' => 'zelená', 'stav' => 'ok', 'obrazok' => 'obrazky/oblecenie_obrazky/topanky_vans.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/topanky_vans_mini_01.jpg',
                'obrazky/oblecenie_obrazky/topanky_vans_mini_02.jpg',
                'obrazky/oblecenie_obrazky/topanky_vans_mini_03.jpg',
                'obrazky/oblecenie_obrazky/topanky_vans_mini_04.jpg',
            ],
            'popis' => 'Ikonické zelené tenisky značky Vans v klasickom modeli Old Skool s charakteristickým bočným pruhom. Pevná plátená časť a odolná gumová podrážka zaručujú dlhú životnosť a pohodlie pri každodennom nosení. Tenisky majú univerzálny streetwear štýl, ktorý sa hodí k rifľam, šatám, šortkám aj sukni. Zelená farba je originálna a vyčnieva z davu. Vnútorná stielka poskytuje príjemné tlmenie pri chôdzi. Použité v dobrom stave – podrážka neopotrebovaná.'],

            //muž - tričká 6
            ['nazov' => 'Tričko Nike', 'znacka' => 'Nike', 'kategoria_id' => 6, 'cena' => 9.90, 'velkost' => 'L', 'farba' => 'biela', 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/tricko_nike.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/tricko_nike_mini_01.jpg',
                'obrazky/oblecenie_obrazky/tricko_nike_mini_02.jpg',
                'obrazky/oblecenie_obrazky/tricko_nike_mini_03.jpg',
                'obrazky/oblecenie_obrazky/tricko_nike_mini_04.jpg',
            ],
            'popis' => 'Pánske biele tričko Nike s veľkým logom na hrudi – klasický kúsok, ktorý nechýba v šatníku žiadneho muža. Ľahký priedušný materiál odvádza vlhkosť od tela čo ho robí ideálnym na šport aj bežné nosenie. Strih regular fit poskytuje dostatok priestoru pre pohodlný pohyb bez toho, aby tričko pôsobilo príliš voľne. Okrúhly výstrih je klasický a vždy moderný. Hodí sa k akýmkoľvek nohaviciam – rifľam, teplákom aj kraťasom. Stav ako nové – minimálne nosené, bez akýchkoľvek poškodení alebo vybliednutia.'],

            //muž - košele 7
            ['nazov' => 'Tričko Nike', 'znacka' => 'Nike', 'kategoria_id' => 7, 'cena' => 7.90, 'velkost' => 'M', 'farba' => 'biela', 'stav' => 'OK', 'obrazok' => 'obrazky/oblecenie_obrazky/tricko_nike.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/tricko_nike_mini_01.jpg',
                'obrazky/oblecenie_obrazky/tricko_nike_mini_02.jpg',
                'obrazky/oblecenie_obrazky/tricko_nike_mini_03.jpg',
                'obrazky/oblecenie_obrazky/tricko_nike_mini_04.jpg',
            ],
            'popis' => 'Jednoduché biele tričko Nike vhodné na každodenné nosenie aj ľahký šport. Kvalitná bavlna je mäkká na dotyk a zároveň odolná voči opakovanému praniu bez straty tvaru či farby. Klasický strih s okrúhlym výstrihom a krátkymi rukávmi je nadčasový a hodí sa ku všetkému. Malé logo Nike na hrudi pôsobí diskrétne a elegantne. Neutrálna biela farba je vždy vhodná a ľahko sa kombinuje s čímkoľvek v šatníku. Zachovaný v OK stave – po vypraní bez škvŕn alebo poškodení.'],

            //muž - nohavice 8
            ['nazov' => 'Rifle Levis', 'znacka' => 'Levis', 'kategoria_id' => 8, 'cena' => 15.50, 'velkost' => 'XL', 'farba' => 'modrá', 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/rifle_levis.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/rifle_levis_mini_01.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_02.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_03.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_04.jpg',
            ],
            'popis' => 'Pánske modré rifle Levis vo veľkosti XL s rovným klasickým strihom, ktorý poskytuje dostatok priestoru pre pohodlný pohyb počas celého dňa. Odolný denim materiál je zárukou dlhej životnosti a charakteristického štýlu tejto legendárnej značky. Kovové nity a charakteristický kožený štítok Levis sú znakom kvality. Modrá farba je univerzálna a hodí sa k akémukoľvek vrchnému oblečeniu. Nosené, ale zachované v dobrom stave – bez výrazného opotrebovania, trhlín alebo škvŕn.'],

            //muž - mikiny 9
            ['nazov' => 'Mikina Adidas', 'znacka' => 'Adidas', 'kategoria_id' => 9, 'cena' => 10.50, 'velkost' => 'L', 'farba' => 'modrá', 'stav' => 'použité', 'obrazok' => 'obrazky/oblecenie_obrazky/mikina_adidas.png',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/mikina_adidas_mini_01.jpg',
                'obrazky/oblecenie_obrazky/mikina_adidas_mini_02.jpg',
                'obrazky/oblecenie_obrazky/mikina_adidas_mini_03.jpg',
                'obrazky/oblecenie_obrazky/mikina_adidas_mini_04.jpg',
            ],
            'popis' => 'Pánska modrá mikina Adidas s predným zipsom a kapucňou – praktický kúsok na každú príležitosť. Teplý materiál s mäkkou vnútornou stranou zahreje v chladnejšom počasí a zároveň umožňuje pohodlný pohyb. Predné vrecko je praktické na každodenné nosenie. Charakteristické tri pruhy Adidas dodávajú mikine športový štýl. Použitá a udržiavaná v dobrom stave – bez poškodení, dier alebo výrazného opotrebovania.'],

            //muž - topánky 10
            ['nazov' => 'Topánky Vans', 'znacka' => 'Vans', 'kategoria_id' => 10, 'cena' => 15.90, 'velkost' => 'EU 42', 'farba' => 'zelená', 'stav' => 'ok', 'obrazok' => 'obrazky/oblecenie_obrazky/topanky_vans.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/topanky_vans_mini_01.jpg',
                'obrazky/oblecenie_obrazky/topanky_vans_mini_02.jpg',
                'obrazky/oblecenie_obrazky/topanky_vans_mini_03.jpg',
                'obrazky/oblecenie_obrazky/topanky_vans_mini_04.jpg',
            ],
            'popis' => 'Pánske zelené tenisky Vans v obľúbenom modeli s plochou gumovou podrážkou – symbol skateboardovej kultúry, ktorý sa stal módnou ikonou po celom svete. Odolná podrážka zaručujú spoľahlivosť pri každodennom nosení. Univerzálny streetwear štýl sa hodí k rifľam, teplákom aj šortkám. Zelená farba je originálna voľba, ktorá oživí akýkoľvek outfit. Klasické šnurovanie umožňuje prispôsobiť tesnosť podľa potreby. Použité v OK stave – podrážka funkčná.'],
        ];

        //pre každý produkt sa vytvorí záznam v databáze
        foreach ($produkty as $p) {
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