<?php

use App\Http\Controllers\ProfileController;
use App\Models\Peticione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PagesController::class,'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(\App\Http\Controllers\PeticioneController::class)->group(function () {
    Route::get('/peticiones', 'index')->name('peticiones.index');
    Route::get('peticiones/add', 'create')->name('peticiones.add');
    Route::post('peticiones', 'store')->name('peticiones.store');
    Route::get('peticiones/{id}', 'show')->name('peticiones.show');
    Route::get('mispeticiones', 'listmine')->name('peticiones.mine');
});
require __DIR__.'/auth.php';