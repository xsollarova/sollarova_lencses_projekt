<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //v priebehu implementácia sme sa rozhodli nahradiť tabuľku doprava priamo
        //stĺpcom typ_dopravy v tabuľke objednavka
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
