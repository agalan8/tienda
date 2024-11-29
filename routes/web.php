<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('articulos', ArticuloController::class);
Route::resource('facturas', FacturaController::class);
// Ruta GET para mostrar el formulario de añadir artículos
Route::get('/factura/{factura}/agregar-articulo', [FacturaController::class, 'anadirArticulos'])->name('facturas.anadirArticulos');

// Ruta POST para procesar el formulario y añadir el artículo
Route::post('/factura/{factura}/agregar-articulo', [FacturaController::class, 'anadirArticulo'])->name('facturas.anadirArticulo');

require __DIR__.'/auth.php';
