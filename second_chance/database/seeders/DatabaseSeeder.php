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
            ['nazov' => 'Rifle Levis', 'znacka' => 'Levis', 'kategoria_id' => 2, 'cena' => 22.00, 'velkost' => 'M', 'farba' => ['modrá'], 'stav' => 'ako nové', 'obrazok' => 'obrazky/oblecenie_obrazky/rifle_levis.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/rifle_levis_mini_01.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_02.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_03.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_04.jpg',
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

            //muž - nohavice - kategória 5
            ['nazov' => 'Rifle Levis', 'znacka' => 'Levis', 'kategoria_id' => 5, 'cena' => 15.50, 'velkost' => 'XL', 'farba' => ['farebná'], 'stav' => 'dobré', 'obrazok' => 'obrazky/oblecenie_obrazky/rifle_levis.jpg',
            'miniatury' => [
                'obrazky/oblecenie_obrazky/rifle_levis_mini_01.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_02.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_03.jpg',
                'obrazky/oblecenie_obrazky/rifle_levis_mini_04.jpg',
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