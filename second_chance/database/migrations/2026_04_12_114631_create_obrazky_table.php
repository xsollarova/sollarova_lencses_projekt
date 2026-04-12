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
        Schema::create('obrazky', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produkt_id')->constrained('produkty')->cascadeOnDelete(); //ak sa produkt zmaže, zmažú sa aj jeho obrázky
            $table->string('url');
            $table->boolean('hlavny')->default(false);
            $table->integer('poradie')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obrazky');
    }
};
