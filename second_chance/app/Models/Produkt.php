<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produkt extends Model
{
    use HasFactory;

    protected $table = 'produkt';
    protected $fillable = ['kategoria_id', 'nazov', 'znacka', 
                           'popis', 'cena', 'velkost', 'farba', 'stav', 'dostupnost'];

    //vráti kategórie, kde produkt patrí
    public function kategoria() {
        return $this->belongsTo(Kategoria::class, 'kategoria_id');
    }

    //vráti hlavný obrázok + miniatúry produktu
    public function obrazky() {
        return $this->hasMany(Obrazok::class, 'produkt_id');
    }

    //vráti iba hlavný obrázok produktu
    public function hlavnyObrazok() {
        return $this->hasOne(Obrazok::class, 'produkt_id')->where('hlavny', true);
    }

    public function polozkyObjednavky()
    {
        return $this->hasMany(PolozkaObjednavky::class, 'produkt_id');
    }
}
