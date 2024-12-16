<?php

use App\Http\Controllers\BodegaController;
use Illuminate\Support\Facades\Route;

// Ruta para mostrar la lista de bodegas
Route::get('/bodegas', [BodegaController::class, 'index'])->name('bodega.index');

// Ruta para mostrar el formulario de creación de una nueva bodega
Route::get('/bodegas/create', [BodegaController::class, 'create'])->name('bodega.create');

// Ruta para almacenar una nueva bodega
Route::post('/bodegas', [BodegaController::class, 'store'])->name('bodega.store');
