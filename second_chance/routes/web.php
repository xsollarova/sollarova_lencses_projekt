<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'));
Route::get('/kosik', fn() => view('kosik'));
Route::get('/platba', fn() => view('platba'));
Route::get('/potvrdenie', fn() => view('potvrdenie'));
Route::get('/prihlasenie', fn() => view('prihlasenie'));
Route::get('/produkt', fn() => view('produkt'));
Route::get('/udaje', fn() => view('udaje'));
Route::get('/uspech', fn() => view('uspech'));
Route::get('/zoznam_produktov', fn() => view('zoznam_produktov'));
