<?php

namespace App\Http\Controllers;

use App\Models\Kosik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UdajeController extends Controller
{
    //načíta košík z databázy alebo session a zobrazí formulár údajov
    public function index()
    {
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

        $udaje = session()->get('order.udaje', []);
        $celkova_cena = array_sum(array_map(fn($p) => $p['cena'] * $p['mnozstvo'], $kosik));
        return view('udaje', compact('kosik', 'celkova_cena', 'udaje'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'meno'       => 'required|string|max:255',
            'priezvisko' => 'required|string|max:255',
            'telefon'    => 'required|regex:/^[0-9\+\-\s\(\)]+$/',
            'email'      => 'required|email|max:255',
            'mesto'      => 'required|string|max:255',
            'psc'        => 'required|regex:/^\d{5}$/',
            'cislo_domu' => 'required|integer|min:1',
        ], [
            'meno.required'           => 'Meno je povinné.',
            'priezvisko.required'     => 'Priezvisko je povinné.',
            'telefon.required'        => 'Telefónne číslo je povinné.',
            'telefon.regex'           => 'Telefónne číslo môže obsahovať iba čísla, +, -, medzery a zátvorky.',
            'email.required'          => 'Email je povinný.',
            'email.email'             => 'Email musí byť platný.',
            'mesto.required'          => 'Mesto je povinné.',
            'psc.required'            => 'PSČ je povinné.',
            'psc.regex'               => 'PSČ musí obsahovať presne 5 číslic.',
            'cislo_domu.required'     => 'Číslo domu je povinné.',
            'cislo_domu.integer'      => 'Číslo domu musí byť číslo.',
            'cislo_domu.min'          => 'Číslo domu musí byť väčšie ako 0.',
        ]);

        session()->put('order.udaje', $validated);
        return redirect()->route('platba.index');
    }
}