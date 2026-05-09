<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objednavka extends Model
{
    use HasFactory;

    protected $table = 'objednavka';
    protected $fillable = [
        'user_id', 'adresa_id', 'typ_dopravy', 'cisloObjednavky',
        'datumVytvorenia', 'stav', 'celkovaSuma', 'cenaDopravy',
    ];

    public function pouzivatel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function adresa()
    {
        return $this->belongsTo(Adresa::class, 'adresa_id');
    }

    public function platba()
    {
        return $this->hasOne(Platba::class, 'objednavka_id');
    }

    public function polozky()
    {
        return $this->hasMany(PolozkaObjednavky::class, 'objednavka_id');
    }
}
