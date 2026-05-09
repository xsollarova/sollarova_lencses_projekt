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
            $query->where(function($q) use ($request) {
                foreach ($request->farba as $farba) {
                    $q->orWhereJsonContains('farba', $farba);
                }
            });
        }

        //radenie produktov podľa zvoleného parametra
        match($request->get('sort', 'najnovsie')) {
            'cena_asc'  => $query->orderBy('cena', 'asc'),
            'cena_desc' => $query->orderBy('cena', 'desc'),
            default     => $query->orderBy('created_at', 'asc'),
        };

        $produkty  = $query->paginate(12)->withQueryString();
        $kategorie = Kategoria::whereNull('parent_id')->with('podkategorie')->get();
        
        // Získanie min a max ceny z dostupných produktov
        $cenyStats = clone $query;
        $cenyStats = $cenyStats->selectRaw('MIN(cena) as min_cena, MAX(cena) as max_cena')->first();
        $min_cena = $cenyStats->min_cena ?? 0;
        $max_cena = $cenyStats->max_cena ?? 0;

        return view('zoznam_produktov', compact('produkty', 'kategorie', 'min_cena', 'max_cena'));
    }

    //zobrazenie detailného popisu o produkte podľa ID
    public function show($id)
    {
        $produkt = Produkt::with('obrazky', 'kategoria')->findOrFail($id);

        $podobneProdukty = Produkt::where('id', '!=', $produkt->id)
            ->where('dostupnost', true)
            ->where(function($q) use ($produkt) {
                $q->where('kategoria_id', $produkt->kategoria_id)
                  ->orWhere('velkost', $produkt->velkost)
                  ->orWhere('farba', $produkt->farba);
            })
            ->with('hlavnyObrazok')
            ->get()
            ->map(function($p) use ($produkt) {
                $matches = 0;
                if ($p->kategoria_id == $produkt->kategoria_id) $matches += 5;
                if ($p->velkost == $produkt->velkost) $matches+=3;
                if ($p->farba == $produkt->farba) $matches += 2;
                $p->matches = $matches;
                return $p;
            })
            ->sortByDesc('matches')
            ->take(7);

        return view('produkt', compact('produkt', 'podobneProdukty'));
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
            ->paginate(12)
            ->withQueryString();

        $kategorie = Kategoria::whereNull('parent_id')->with('podkategorie')->get();
        
        // Získanie min a max ceny z dostupných produktov
        $cenyStats = Produkt::where('dostupnost', true)->selectRaw('MIN(cena) as min_cena, MAX(cena) as max_cena')->first();
        $min_cena = $cenyStats->min_cena ?? 0;
        $max_cena = $cenyStats->max_cena ?? 0;

        return view('zoznam_produktov', compact('produkty', 'kategorie', 'min_cena', 'max_cena'));
    }
}
