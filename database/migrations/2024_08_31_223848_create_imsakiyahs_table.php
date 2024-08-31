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
        Schema::create('imsakiyahs', function (Blueprint $table) {
            $table->id();
            $table->string("kota");
            $table->date("hijriyah");
            $table->date("masehi");
            $table->string("imsak", 5);
            $table->string("subuh", 5);
            $table->string("dzuhur", 5);
            $table->string("ashar", 5);
            $table->string("maghrib", 5);
            $table->string("isya", 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imsakiyahs');
    }
};
