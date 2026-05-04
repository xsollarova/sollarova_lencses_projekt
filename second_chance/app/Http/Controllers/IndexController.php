<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Kategoria;

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

        $kategorie = Kategoria::all();

        return view('index', compact('novinky', 'kategorie')); 
    }
}