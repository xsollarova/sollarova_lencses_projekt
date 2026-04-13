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
        Schema::create('kategoria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('kategoria')->nullOnDelete();
            $table->string('nazov');
            $table->string('pohlavie');
            $table->string('popis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoria');
    }
};
