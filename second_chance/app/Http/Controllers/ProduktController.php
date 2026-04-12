<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Kategoria;

class ProduktController extends Controller
{
    //zobrazenie zoznamu produktov kde vieme filtrovať podľa ceny, veľkost, farby
    public function index(Request $request)
    {
        $query = Produkt::with('hlavnyObrazok')->where('dostupnost', true);

        //filtrovanie produktov podľa zvoleného filtra
        if ($request->filled('kategoria')) {
            $query->where('kategoria_id', $request->kategoria);
        }
        if ($request->filled('pohlavie')) {
            $query->whereHas('kategoria', fn($q) => $q->where('pohlavie', $request->pohlavie));
        }
        if ($request->filled('min_cena')) {
            $query->where('cena', '>=', $request->min_cena);
        }
        if ($request->filled('max_cena')) {
            $query->where('cena', '<=', $request->max_cena);
        }
        if ($request->filled('velkost')) {
            $query->whereIn('velkost', $request->velkost);
        }
        if ($request->filled('farba')) {
            $query->whereIn('farba', $request->farba);
        }

        //radenie produktov podľa zvoleného parametra
        match($request->get('sort', 'najnovsie')) {
            'cena_asc'  => $query->orderBy('cena', 'asc'),
            'cena_desc' => $query->orderBy('cena', 'desc'),
            default     => $query->orderBy('created_at', 'desc'),
        };

        $produkty  = $query->paginate(24)->withQueryString();
        $kategorie = Kategoria::whereNull('parent_id')->with('podkategorie')->get();

        return view('zoznam_produktov', compact('produkty', 'kategorie'));
    }

    //zobrazenie detailného popisu o produkte podľa ID
    public function show($id)
    {
        $produkt = Produkt::with('obrazky', 'kategoria')->findOrFail($id);
        return view('produkt', compact('produkt'));
    }

    //vyhľadanie produktov podľa názvu, značky, popisu alebo farby
    public function hladat(Request $request)
    {
        $search = $request->get('search');
        
        $produkty = Produkt::with('hlavnyObrazok')
            ->where('dostupnost', true)
            ->where(function($query) use ($search) {
                $query->where('nazov', 'like', '%' . $search . '%')
                    ->orWhere('znacka', 'like', '%' . $search . '%')
                    ->orWhere('popis', 'like', '%' . $search . '%')
                    ->orWhere('farba', 'like', '%' . $search . '%');
            })
            ->paginate(24)
            ->withQueryString();

        $kategorie = Kategoria::whereNull('parent_id')->with('podkategorie')->get();

        return view('zoznam_produktov', compact('produkty', 'kategorie'));
    }
}
