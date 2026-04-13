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
        Schema::create('produkt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategoria_id')->constrained('kategoria');
            $table->string('nazov');
            $table->string('znacka')->nullable();
            $table->text('popis')->nullable();
            $table->decimal('cena', 8, 2);
            $table->string('velkost')->nullable();
            $table->string('farba')->nullable();
            $table->string('stav');
            $table->boolean('dostupnost')->default(true);
            $table->date('datumPridania')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produkt');
    }
};
