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

        $celkova_cena = array_sum(array_map(fn($p) => $p['cena'] * $p['mnozstvo'], $kosik));
        return view('udaje', compact('kosik', 'celkova_cena'));
    }
}