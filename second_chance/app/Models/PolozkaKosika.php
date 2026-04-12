<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PolozkaKosika extends Model
{
    use HasFactory;

    protected $table = 'polozky_kosika';
    protected $fillable = [
        'kosik_id', 'produkt_id', 'nazov', 'znacka',
        'velkost', 'cena', 'mnozstvo', 'je_merch', 'obrazok'
    ];

    //vráti košík, v ktorom je položka
    public function kosik()
    {
        return $this->belongsTo(Kosik::class, 'kosik_id');
    }

    //vráti produkt, ktorý položka reprezentuje (merch má null)
    public function produkt()
    {
        return $this->belongsTo(Produkt::class, 'produkt_id');
    }
}