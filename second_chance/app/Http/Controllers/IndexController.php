<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;

class IndexController extends Controller
{
    public function index()
    {
        // Načítaj 6 najnovších produktov s ich hlavným obrázkom
        $novinky = Produkt::with('hlavnyObrazok')
            ->where('dostupnost', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('index', compact('novinky'));
    }
}