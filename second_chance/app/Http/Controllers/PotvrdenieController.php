<?php

namespace App\Http\Controllers;

use App\Models\Kosik;
use App\Models\Adresa;
use App\Models\Objednavka;
use App\Models\Platba;
use App\Models\PolozkaObjednavky;
use App\Models\Produkt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PotvrdenieController extends Controller
{
    //načíta košík z databázy alebo session a zobrazí potvrdenie
    public function index()
    {
        if (!session()->has('order.udaje')) {
            return redirect()->route('udaje.index')->with('error', 'Najprv vyplňte dodacie údaje.');
        }

        if (!session()->has('order.platba')) {
            return redirect()->route('platba.index')->with('error', 'Najprv vyberte dopravu a platbu.');
        }

        $kosik = $this->nacitajKosik();

        $platba     = session('order.platba');
        $cenaDopravy = ($platba['shipping'] ?? '') === 'kurier' ? 4.50 : 0.00;
        $cenaPlatby  = ($platba['payment']  ?? '') === 'dobierka' ? 0.50 : 0.00;
        $celkova_cena = array_sum(array_map(fn($p) => $p['cena'] * $p['mnozstvo'], $kosik)) + $cenaDopravy + $cenaPlatby;

        return view('potvrdenie', compact('kosik', 'celkova_cena', 'cenaDopravy', 'cenaPlatby', 'platba'));
    }

    public function store(Request $request)
    {
        $udaje = session('order.udaje');
        $platbaData = session('order.platba');
        $kosik = $this->nacitajKosik();
 
        //odfiltrovanie položiek s množstvom 0
        $kosik = array_filter($kosik, fn($p) => $p['mnozstvo'] > 0);
 
        //doprava a platba
        $cenaDopravy = $platbaData['shipping'] === 'kurier' ? 4.50 : 0.00;
        $cenaPlatby  = $platbaData['payment'] === 'dobierka' ? 0.50 : 0.00;
        $celkovaSuma = array_sum(array_map(fn($p) => $p['cena'] * $p['mnozstvo'], $kosik)) + $cenaDopravy + $cenaPlatby;
 
        //uoženie dodacej adresy
        $adresa = Adresa::create([
            'user_id'    => Auth::id(),
            'meno'       => $udaje['meno'],
            'priezvisko' => $udaje['priezvisko'],
            'telefon'    => $udaje['telefon'],
            'email'      => $udaje['email'],
            'mesto'      => $udaje['mesto'],
            'psc'        => $udaje['psc'],
            'cislo_domu' => $udaje['cislo_domu'],
        ]);
 
        //Generovať random 7-číselné číslo objednávky
        do {
            $cisloObjednavky = mt_rand(1000000, 9999999);
        } while (Objednavka::where('cisloObjednavky', $cisloObjednavky)->exists());
 
        //uloženie objednávky
        $objednavka = Objednavka::create([
            'user_id'         => Auth::id(),
            'adresa_id'       => $adresa->id,
            'typ_dopravy'     => $platbaData['shipping'],
            'cisloObjednavky' => $cisloObjednavky,
            'datumVytvorenia' => now(),
            'stav'            => 'nova',
            'celkovaSuma'     => $celkovaSuma,
            'cenaDopravy'     => $cenaDopravy,
        ]);
 
        //uloženie položiek
        foreach ($kosik as $polozka) {
            PolozkaObjednavky::create([
                'objednavka_id' => $objednavka->id,
                'produkt_id'    => $polozka['je_merch'] ? null : $polozka['id'],
                'mnozstvo'      => $polozka['mnozstvo'],
                'cenaZaKus'     => $polozka['cena'],
                'nazovSnapshot' => $polozka['nazov'],
            ]);
        }
 
        //uloženie platby
        Platba::create([
            'objednavka_id' => $objednavka->id,
            'typPlatby'     => $platbaData['payment'],
            'stavPlatby'    => 'zaplatene',
            'paid_at'       => now(),
        ]);
 
        //vymazanie košíka po zaplatení
        if (Auth::check()) {
            $kosikModel = Kosik::where('user_id', Auth::id())->first();
            if ($kosikModel) {
                $kosikModel->polozky()->delete();
            }
        } else {
            session()->forget('kosik');
        }

        //kúpené produkty nastavíme ako nedostupné
        foreach ($kosik as $polozka) {
            if (!$polozka['je_merch'] && $polozka['id']) {
                Produkt::where('id', $polozka['id'])->update(['dostupnost' => false]);
            }
        }
 
        //vymazanie session
        session()->forget('order');
 
        return view('uspech', compact('cisloObjednavky'));
    }

    //načítanie košíka
    public function nacitajKosik(): array
    {
        if (Auth::check()) {
            $kosikModel = Kosik::where('user_id', Auth::id())->first();
            if (!$kosikModel) return [];
 
            $result = [];
            foreach ($kosikModel->polozky as $p) {
                $key = $p->je_merch ? 'merch' : $p->produkt_id;
                $result[$key] = [
                    'id'       => $p->je_merch ? 'merch' : $p->produkt_id,
                    'nazov'    => $p->nazov,
                    'znacka'   => $p->znacka,
                    'velkost'  => $p->velkost,
                    'cena'     => $p->cena,
                    'obrazok'  => $p->obrazok,
                    'mnozstvo' => $p->mnozstvo,
                    'je_merch' => $p->je_merch,
                ];
            }
            return $result;
        }
 
        return session()->get('kosik', []);
    }
}