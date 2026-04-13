<?php

namespace App\Http\Controllers;

use App\Models\Kosik;
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

        if (Auth::check()) {
            $kosikModel = Kosik::where('user_id', Auth::id())->first();
            $kosik = [];
            if ($kosikModel) {
                foreach ($kosikModel->polozky as $p) {
                    $key = $p->je_merch ? 'merch' : $p->produkt_id;
                    $kosik[$key] = [
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
            }
        } else {
            $kosik = session()->get('kosik', []);
        }

        $celkova_cena = array_sum(array_map(fn($p) => $p['cena'] * $p['mnozstvo'], $kosik));
        return view('potvrdenie', compact('kosik', 'celkova_cena'));
    }

    public function store(Request $request)
    {
        // Generovať random 7-číselné číslo objednávky
        $cisloObjednavky = mt_rand(1000000, 9999999);

        return view('uspech', compact('cisloObjednavky'));
    }
}