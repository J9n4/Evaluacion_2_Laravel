<?php

use Illuminate\Support\Facades\Route;

// Redirección inicial automática al Núcleo 1
Route::get('/', function () {
    return redirect()->route('nt1');
});

Route::view('/nucleo-1', 'nucleos.nt1')->name('nt1');
Route::view('/nucleo-2', 'nucleos.nt2')->name('nt2');
Route::view('/nucleo-3', 'nucleos.nt3')->name('nt3');

// Rutas temporales para tu compañero (NT4 y NT5)
Route::view('/nucleo-4', 'nucleos.nt4')->name('nt4');
Route::view('/nucleo-5', 'nucleos.nt5')->name('nt5');