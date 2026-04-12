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
        Schema::create('polozky_kosika', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kosik_id')->constrained('kosiky')->cascadeOnDelete(); //ak sa košík zmaže, zmažú sa aj jeho položky
            $table->foreignId('produkt_id')->nullable()->constrained('produkty')->cascadeOnDelete();
            $table->string('nazov');
            $table->string('znacka')->nullable();
            $table->string('velkost')->nullable();
            $table->decimal('cena', 8, 2);
            $table->integer('mnozstvo')->default(1);
            $table->boolean('je_merch')->default(false);
            $table->string('obrazok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polozky_kosika');
    }
};
