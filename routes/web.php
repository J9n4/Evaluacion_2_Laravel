<?php

use Illuminate\Support\Facades\Route;

// Redirección automática al Núcleo 1 (Requisito de Navegación)
Route::get('/', function () {
    return redirect()->route('nt1');
});

// Rutas estáticas para la teoría y ejemplos de tus núcleos (Dimensión 1)
Route::view('/nucleo-1', 'nucleos.nt1')->name('nt1');
Route::view('/nucleo-2', 'nucleos.nt2')->name('nt2');
Route::view('/nucleo-3', 'nucleos.nt3')->name('nt3');

// Rutas de respaldo temporales para tu compañero (NT4 y NT5)
Route::get('/nucleo-4', function() { return "Sección en desarrollo por compañero (NT4)"; })->name('nt4');
Route::get('/nucleo-5', function() { return "Sección en desarrollo por compañero (NT5)"; })->name('nt5');