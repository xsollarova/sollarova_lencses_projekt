<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obrazok extends Model
{
    protected $table = 'obrazky';
    protected $fillable = ['produkt_id', 'url', 'hlavny', 'poradie'];
}
