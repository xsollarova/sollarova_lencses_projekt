<?php

namespace App\Http\Controllers;

use App\Models\Kosik;
use App\Models\PolozkaKosika;
use App\Models\Produkt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KosikController extends Controller
{

    //pridanie merchu do košíka
    private function pridajMerch(&$kosik)
    {
        if (!array_key_exists('merch', $kosik)) {
            $kosik['merch'] = [
                'id'       => 'merch',
                'nazov'    => 'Second Chance plátenka',
                'znacka'   => 'Second Chance',
                'velkost'  => 'univerzálna',
                'cena'     => 2.00,
                'obrazok'  => 'obrazky/oblecenie_obrazky/merch.png',
                'mnozstvo' => 1,
                'je_merch' => true,
            ];
        }
    }

    //načíta košík z databázy pre prihlasených alebo zo session pre neprihlásených
    private function nacitajKosik(): array
    {
        if (Auth::check()) {
            $kosik = Kosik::where('user_id', Auth::id())->first();
            if (!$kosik) return [];

            $result = [];
            foreach ($kosik->polozky as $p) {
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

    //uloží košík do databázy alebo do session
    private function ulozKosik(array $kosik): void
    {
        if (Auth::check()) {
            $kosikModel = Kosik::firstOrCreate(['user_id' => Auth::id()]);
            $kosikModel->polozky()->delete();

            foreach ($kosik as $polozka) {
                if (!$polozka['je_merch'] && $polozka['mnozstvo'] <= 0) continue;
                
                $kosikModel->polozky()->create([
                    'produkt_id' => $polozka['je_merch'] ? null : $polozka['id'],
                    'nazov'      => $polozka['nazov'],
                    'znacka'     => $polozka['znacka'],
                    'velkost'    => $polozka['velkost'],
                    'cena'       => $polozka['cena'],
                    'mnozstvo'   => $polozka['mnozstvo'],
                    'je_merch'   => $polozka['je_merch'],
                    'obrazok'    => $polozka['obrazok'],
                ]);
            }
        } else {
            session()->put('kosik', $kosik);
        }
    }

    //zobrazenie košíka s produktami a celkovou cenou
    public function index()
    {
        $kosik = $this->nacitajKosik();
        $this->pridajMerch($kosik);
        $this->ulozKosik($kosik);

        $celkova_cena = array_sum(array_map(
            fn($p) => $p['cena'] * $p['mnozstvo'], $kosik
        ));

        return view('kosik', compact('kosik', 'celkova_cena'));
    }

    //pridanie produktu do košíka alebo zvýšenie jeho množstva
    public function pridat($id)
    {
        $kosik = $this->nacitajKosik();

        if ($id === 'merch') {
            if (isset($kosik['merch'])) {
                $kosik['merch']['mnozstvo']++;
            }
        } else {
            $produkt = Produkt::with('hlavnyObrazok')->findOrFail($id);

            if (!isset($kosik[$id])) {
                $kosik[$id] = [
                    'id'       => $produkt->id,
                    'nazov'    => $produkt->nazov,
                    'znacka'   => $produkt->znacka,
                    'velkost'  => $produkt->velkost,
                    'cena'     => $produkt->cena,
                    'obrazok'  => $produkt->hlavnyObrazok->url ?? null,
                    'mnozstvo' => 1,
                    'je_merch' => false,
                ];
            }
        }

        $this->ulozKosik($kosik);
        return redirect()->back()->with('uspech', 'Produkt bol pridaný do košíka!');
    }

    //zníženie množstva produktu o 1 alebo jeho odobratie ak je iba 1
    public function odobrat($id)
    {
        $kosik = $this->nacitajKosik();

        if ($id === 'merch') {
            if (isset($kosik['merch']) && $kosik['merch']['mnozstvo'] > 0) {
                $kosik['merch']['mnozstvo']--;
            }
        } else {
            if (isset($kosik[$id]) && $kosik[$id]['mnozstvo'] > 1) {
                $kosik[$id]['mnozstvo']--;
            } elseif (isset($kosik[$id])) {
                unset($kosik[$id]);
            }
        }

        $this->ulozKosik($kosik);
        return redirect()->route('kosik.index');
    }

    //odstránenie produktu z košíka (pri merchi nastaví množstvo na 0)
    public function odstranit($id)
    {
        $kosik = $this->nacitajKosik();

        if ($id === 'merch') {
            $kosik['merch']['mnozstvo'] = 0;
        } else {
            unset($kosik[$id]);
        }

        $this->ulozKosik($kosik);
        return redirect()->route('kosik.index');
    }
}