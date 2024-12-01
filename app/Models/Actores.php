<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actores extends Model
{
    protected $table='actores';
    protected $fillable = ['nombre', 'biografia', 'fecha_nacimiento', 'genero','nacionalidad','premios','foto',];
}
