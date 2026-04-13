<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('objednavka', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('adresa_id')->constrained('adresa')->cascadeOnDelete();
            $table->foreignId('doprava_id')->constrained('doprava')->cascadeOnDelete();
            $table->string('cisloObjednavky')->unique();
            $table->dateTime('datumVytvorenia')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('stav')->default('nova');
            $table->decimal('celkovaSuma', 10, 2)->default(0);
            $table->decimal('cenaDopravy', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objednavka');
    }
};
