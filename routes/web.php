<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Models\Peliculas;
use App\Models\Actores;

Route::get('/',[PrincipalController::class,'index'])->name('index');
Route::get('/peliculas',[PrincipalController::class,'peliculas'])->name('peliculas');
Route::get('/actores',[PrincipalController::class,'actores'])->name('actores');
Route::get('/agregarpeliculas',[PrincipalController::class,'agregarpeliculas'])->name('agregarpeliculas');
Route::get('/agregaractores',[PrincipalController::class,'agregaractores'])->name('agregaractores');
Route::post('/guardar',[PrincipalController::class,'guardar'])->name('guardar');
Route::delete('/borrar/{pelicula}',[PrincipalController::class,'borrar'])->name('borrar');
Route::get('/editar/{pelicula}',[PrincipalController::class,'editar'])->name('editar');
Route::put('/actualizar/{pelicula}',[PrincipalController::class,'actualizar'])->name('actualizar');
Route::post('/guardar2',[PrincipalController::class,'guardar2'])->name('guardar2');
Route::delete('/borrar2/{actor}',[PrincipalController::class,'borrar2'])->name('borrar2');
Route::get('/editar2/{actor}',[PrincipalController::class,'editar2'])->name('editar2');
Route::put('/actualizar2/{actor}',[PrincipalController::class,'actualizar2'])->name('actualizar2');
Route::get('/filtrar',[PrincipalController::class,'filtrar'])->name('filtrar');