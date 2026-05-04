<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategoria;

class KategoriaSeeder extends Seeder
{
    //vytvorí kategórie v databáze
    public function run()
{
    $kategorie = [
        ['nazov' => 'Topy', 'pohlavie' => 'žena'],
        ['nazov' => 'Nohavice', 'pohlavie' => 'žena'],
        ['nazov' => 'Šaty', 'pohlavie' => 'žena'],
        ['nazov' => 'Tričká', 'pohlavie' => 'muž'],
        ['nazov' => 'Nohavice', 'pohlavie' => 'muž'],
        ['nazov' => 'Mikiny', 'pohlavie' => 'muž'],
    ];

    //pre každú vytvorí aj záznam v databáze
    foreach ($kategorie as $k) {
        Kategoria::create($k);
    }
}
}
