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
        Schema::create('polozka_objednavky', function (Blueprint $table) {
            $table->id();
            $table->foreignId('objednavka_id')->constrained('objednavka')->cascadeOnDelete();
            $table->foreignId('produkt_id')->nullable()->constrained('produkt')->nullOnDelete();
            $table->integer('mnozstvo')->default(1);
            $table->decimal('cenaZaKus', 8, 2);
            $table->string('nazovSnapshot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polozka_objednavky');
    }
};
