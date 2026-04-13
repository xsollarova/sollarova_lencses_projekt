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
        Schema::create('doprava', function (Blueprint $table) {
            $table->id();
            $table->string('typDopravy');
            $table->decimal('cena', 8, 2)->default(0);
            $table->boolean('aktivna')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doprava');
    }
};
