<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    protected $table='peliculas';
    protected $fillable = ['nombre', 'sinopsis', 'categoria', 'duracion','foto','fecha','terminos','mayores_edad'];
}
