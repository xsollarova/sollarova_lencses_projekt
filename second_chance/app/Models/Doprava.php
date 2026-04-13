<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doprava extends Model
{
    use HasFactory;

    protected $table = 'doprava';
    protected $fillable = ['typDopravy', 'cena', 'aktivna'];

    public function objednavky()
    {
        return $this->hasMany(Objednavka::class, 'doprava_id');
    }
}
