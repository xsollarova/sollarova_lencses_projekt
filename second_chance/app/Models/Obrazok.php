<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obrazok extends Model
{
    protected $table = 'obrazok';
    protected $fillable = ['produkt_id', 'url', 'hlavny', 'poradie'];
}
