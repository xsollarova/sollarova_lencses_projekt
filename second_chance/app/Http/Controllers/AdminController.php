<?php

namespace App\Http\Controllers;

use App\Models\Produkt;
use App\Models\Kategoria;
use App\Models\Obrazok;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //zobrazenie produktov
    public function index(Request $request)
    {
        $query = Produkt::with('hlavnyObrazok', 'kategoria');

        //filtrovanie  podľa kategórie ak ju vyberie
        if ($request->filled('kategoria')) {
            $query->where('kategoria_id', $request->kategoria);
        }

        $produkty = $query->get();
        $kategorie = Kategoria::all();

        return view('admin.index', compact('produkty', 'kategorie'));
    }

    //zobrazenie formulára na pridanie produktu
    public function create()
    {
        $kategorie = Kategoria::all();
        return view('admin.create', compact('kategorie'));
    }

    //uloženie nového produktu do databázy
    public function store(Request $request)
    {
        $produkt = Produkt::create([
            'kategoria_id' => $request->kategoria_id,
            'nazov'        => $request->nazov,
            'znacka'       => $request->znacka,
            'popis'        => $request->popis,
            'cena'         => $request->cena,
            'velkost'      => $request->velkost,
            'farba'        => $request->farba,
            'stav'         => $request->stav,
            'dostupnost'   => true,
        ]);

        //uloženie obrázku
        if ($request->hasFile('obrazok')) {
            $path = $request->file('obrazok')->store('obrazky/produkty', 'public');
            Obrazok::create([
                'produkt_id' => $produkt->id,
                'url'        => 'storage/' . $path,
                'hlavny'     => true,
                'poradie'    => 1,
            ]);
        }

        return redirect()->route('admin.index')->with('uspech', 'Produkt bol pridaný!');
    }

    //zobrazenie formulára na úpravu produktu
    public function edit($id)
    {
        $produkt = Produkt::with('hlavnyObrazok')->findOrFail($id);
        $kategorie = Kategoria::all();
        return view('admin.edit', compact('produkt', 'kategorie'));
    }

    //uloženie zmien
    public function update(Request $request, $id)
    {
        $produkt = Produkt::findOrFail($id);
        $produkt->update([
            'kategoria_id' => $request->kategoria_id,
            'nazov'        => $request->nazov,
            'znacka'       => $request->znacka,
            'popis'        => $request->popis,
            'cena'         => $request->cena,
            'velkost'      => $request->velkost,
            'farba'        => $request->farba,
            'stav'         => $request->stav,
        ]);

        //nahradenie starého obrázku
        if ($request->hasFile('obrazok')) {
            $produkt->obrazky()->delete();
            $path = $request->file('obrazok')->store('obrazky/produkty', 'public');
            Obrazok::create([
                'produkt_id' => $produkt->id,
                'url'        => 'storage/' . $path,
                'hlavny'     => true,
                'poradie'    => 1,
            ]);
        }

        return redirect()->route('admin.index')->with('uspech', 'Produkt bol upravený!');
    }

    //vymazanie produktu
    public function destroy($id)
    {
        Produkt::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('uspech', 'Produkt bol vymazaný!');
    }
}