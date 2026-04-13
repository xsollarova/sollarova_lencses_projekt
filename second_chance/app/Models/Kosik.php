<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kosik extends Model
{
    use HasFactory;

    protected $table = 'kosik';
    protected $fillable = ['user_id'];

    //vráti všetky položky v košíku
    public function polozky()
    {
        return $this->hasMany(PolozkaKosika::class, 'kosik_id');
    }

    //vráti používateľa, ktorému patrí košík
    public function pouzivatel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}