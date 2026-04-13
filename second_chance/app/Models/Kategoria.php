<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $table = 'kategoria';
    protected $fillable = ['parent_id', 'nazov', 'pohlavie', 'popis'];

    //vráti podkategórie danej kategórie
    public function podkategorie() {
        return $this->hasMany(Kategoria::class, 'parent_id');
    }

    //vráti produkty, ktoré sú v danej kategorii
    public function produkty() {
        return $this->hasMany(Produkt::class, 'kategoria_id');
    }
}
