<?php

namespace App\Http\Controllers;

use App\Models\Kosik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlatbaController extends Controller
{
    //načítanie košíka z databázy alebo session a zobrazenie platby
    public function index()
    {
        if (!session()->has('order.udaje')) {
            return redirect()->route('udaje.index')->with('error', 'Najprv vyplňte dodacie údaje.');
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

        $platba = session()->get('order.platba', []);
        $celkova_cena = array_sum(array_map(fn($p) => $p['cena'] * $p['mnozstvo'], $kosik));
        return view('platba', compact('kosik', 'celkova_cena', 'platba'));
    }

    public function store(Request $request)
    {
        if (!session()->has('order.udaje')) {
            return redirect()->route('udaje.index')->with('error', 'Najprv vyplňte dodacie údaje.');
        }

        $validated = $request->validate([
            'shipping' => 'required|in:predajna,kurier',
            'payment'  => 'required|in:dobierka,karta,prevod',
        ], [
            'shipping.required' => 'Vyberte spôsob dopravy.',
            'shipping.in'       => 'Neplatný spôsob dopravy.',
            'payment.required'  => 'Vyberte spôsob platby.',
            'payment.in'        => 'Neplatný spôsob platby.',
        ]);

        session()->put('order.platba', $validated);
        return redirect()->route('potvrdenie.index');
    }
}