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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 100);
            $table->string('sinopsis', 500);
            $table->string('categoria', 20);
            $table->integer('duracion');
            $table->string('foto');
            $table->date('fecha'); // Cambiado a tipo date
            $table->boolean('mayores_edad'); // Cambiado a boolean
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
