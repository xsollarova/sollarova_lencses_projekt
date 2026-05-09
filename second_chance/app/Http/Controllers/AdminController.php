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
            'farba'        => $request->input('farba', []),
            'stav'         => $request->stav,
            'dostupnost'   => true,
        ]);

        //uloženie hlavného obrázku
        if ($request->hasFile('obrazok')) {
            $file = $request->file('obrazok');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('obrazky/oblecenie_obrazky'), $filename);

            Obrazok::create([
                'produkt_id' => $produkt->id,
                'url'        => 'obrazky/oblecenie_obrazky/' . $filename,
                'hlavny'     => true,
                'poradie'    => 1,
            ]);
        }

        //uloženie miniatúr
        if ($request->hasFile('miniobrazky')) {
            $poradie = 2;
            foreach ($request->file('miniobrazky') as $file) {
                $filename = time() . '_' . $poradie . '_' . $file->getClientOriginalName();
                $file->move(public_path('obrazky/oblecenie_obrazky'), $filename);
                Obrazok::create([
                    'produkt_id' => $produkt->id,
                    'url'        => 'obrazky/oblecenie_obrazky/' . $filename,
                    'hlavny'     => false,
                    'poradie'    => $poradie,
                ]);
                $poradie++;
            }
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
            'farba'        => $request->input('farba', []),
            'stav'         => $request->stav,
        ]);

        //nahradenie starého obrázku
        if ($request->hasFile('obrazok')) {

            $produkt->obrazky()->where('hlavny', true)->each(function($o) {
                $path = public_path($o->url);
                if (file_exists($path)) unlink($path);
            });
            $produkt->obrazky()->where('hlavny', true)->delete();

            $file = $request->file('obrazok');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('obrazky/oblecenie_obrazky'), $filename);
            
            Obrazok::create([
                'produkt_id' => $produkt->id,
                'url'        => 'obrazky/oblecenie_obrazky/' . $filename,
                'hlavny'     => true,
                'poradie'    => 1,
            ]);
        }

        //nahradenie miniatúr
        if ($request->hasFile('miniobrazky')) {
            $poradie = $produkt->obrazky()->max('poradie') + 1;
            foreach ($request->file('miniobrazky') as $file) {
                $filename = time() . '_' . $poradie . '_' . $file->getClientOriginalName();
                $file->move(public_path('obrazky/oblecenie_obrazky'), $filename);
                Obrazok::create([
                    'produkt_id' => $produkt->id,
                    'url'        => 'obrazky/oblecenie_obrazky/' . $filename,
                    'hlavny'     => false,
                    'poradie'    => $poradie,
                ]);
                $poradie++;
            }
        }

        return redirect()->route('admin.index')->with('uspech', 'Produkt bol upravený!');
    }

    //vymazanie produktu
    public function destroy($id)
    {
        $produkt = Produkt::with('obrazky')->findOrFail($id);

        foreach ($produkt->obrazky as $obrazok) {
            $path = public_path($obrazok->url);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $produkt->delete();
        return redirect()->route('admin.index')->with('uspech', 'Produkt bol vymazaný!');
    }

    //vymažeme obrázok pri edite
    public function zmazatObrazok($id)
    {
        $obrazok = Obrazok::findOrFail($id);
        
        $path = public_path($obrazok->url);
        if (file_exists($path)) {
            unlink($path);
        }
        $obrazok->delete();
        return back()->with('uspech', 'Obrázok bol vymazaný.');
    }
}