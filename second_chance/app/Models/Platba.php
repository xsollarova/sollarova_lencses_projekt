<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platba extends Model
{
    use HasFactory;

    protected $table = 'platba';
    protected $fillable = ['objednavka_id', 'typPlatby', 'stavPlatby', 'paid_at'];

    public function objednavka()
    {
        return $this->belongsTo(Objednavka::class, 'objednavka_id');
    }
}
