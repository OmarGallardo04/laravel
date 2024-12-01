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
        Schema::create('actores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre',100);
            $table->string('biografia',500);
            $table->date('fecha_nacimiento');
            $table->string('genero',100);
            $table->string('nacionalidad',100);
            $table->string('premios',100);
            $table->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actores');
    }
};
