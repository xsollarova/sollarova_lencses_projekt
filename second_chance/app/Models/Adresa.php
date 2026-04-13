<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresa extends Model
{
    use HasFactory;

    protected $table = 'adresa';
    protected $fillable = ['user_id', 'meno', 'priezvisko', 'ulica', 'mesto', 'psc', 'telefon', 'email', 'cislo_domu'];

    public function pouzivatel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function objednavky()
    {
        return $this->hasMany(Objednavka::class, 'adresa_id');
    }
}
