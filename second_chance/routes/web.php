<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', fn() => view('index'));
Route::get('/kosik', fn() => view('kosik'));
Route::get('/platba', fn() => view('platba'));
Route::get('/potvrdenie', fn() => view('potvrdenie'));
Route::get('/prihlasenie', fn() => view('prihlasenie'));
Route::get('/produkt', fn() => view('produkt'));
Route::get('/udaje', fn() => view('udaje'));
Route::get('/uspech', fn() => view('uspech'));
Route::get('/zoznam_produktov', fn() => view('zoznam_produktov'));

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');