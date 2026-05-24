<?php

use App\Http\Controllers\NucleoController;
use Illuminate\Support\Facades\Route;

// Redirección automática
Route::get('/', function () {
    return redirect()->route('nt1');
});

// Rutas estáticas
Route::view('/nucleo-1', 'nucleos.nt1')->name('nt1');
Route::view('/nucleo-2', 'nucleos.nt2')->name('nt2');
Route::view('/nucleo-3', 'nucleos.nt3')->name('nt3');

// Rutas para Eloquent y validaciones
Route::get('/nucleo-4', [NucleoController::class, 'nt4'])->name('nt4');
Route::post('/nucleo-4', [NucleoController::class, 'storeCategoria'])->name('nt4.store');
Route::get('/nucleo-4/{categoria}/edit', [NucleoController::class, 'editCategoria'])->name('nt4.edit');
Route::put('/nucleo-4/{categoria}', [NucleoController::class, 'updateCategoria'])->name('nt4.update');
Route::delete('/nucleo-4/{categoria}', [NucleoController::class, 'destroyCategoria'])->name('nt4.destroy');
Route::post('/nucleo-4/productos', [NucleoController::class, 'storeProducto'])->name('nt4.producto.store');
Route::delete('/nucleo-4/productos/{producto}', [NucleoController::class, 'destroyProducto'])->name('nt4.producto.destroy');
Route::get('/nucleo-5', [NucleoController::class, 'nt5'])->name('nt5');
Route::post('/nucleo-5', [NucleoController::class, 'validarNt5'])->name('nt5.submit');