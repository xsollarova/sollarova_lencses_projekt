<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolozkaObjednavky extends Model
{
    use HasFactory;

    protected $table = 'polozka_objednavky';
    protected $fillable = ['objednavka_id', 'produkt_id', 'mnozstvo', 'cenaZaKus', 'nazovSnapshot'];

    public function objednavka()
    {
        return $this->belongsTo(Objednavka::class, 'objednavka_id');
    }

    public function produkt()
    {
        return $this->belongsTo(Produkt::class, 'produkt_id');
    }
}
