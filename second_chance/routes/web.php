<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProduktController;
use App\Http\Controllers\UdajeController;
use App\Http\Controllers\PlatbaController;
use App\Http\Controllers\KosikController;
use App\Http\Controllers\PotvrdenieController;

//statické stránky
Route::get('/', fn() => view('index'));
Route::get('/prihlasenie', fn() => view('prihlasenie'));
Route::get('/uspech', fn() => view('uspech'));

//produkty
Route::get('/produkty', [ProduktController::class, 'index'])->name('produkty.index');
Route::get('/produkty/{id}', [ProduktController::class, 'show'])->name('produkty.show');
Route::get('/hladat', [ProduktController::class, 'hladat'])->name('produkty.hladat');

//registrácia a prihlásenie
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//košík
Route::get('/kosik', [KosikController::class, 'index'])->name('kosik.index');
Route::post('/kosik/pridat/{id}', [KosikController::class, 'pridat'])->name('kosik.pridat')->where('id', '.*');
Route::post('/kosik/odobrat/{id}', [KosikController::class, 'odobrat'])->name('kosik.odobrat')->where('id', '.*');
Route::delete('/kosik/odstranit/{id}', [KosikController::class, 'odstranit'])->name('kosik.odstranit')->where('id', '.*');

//košík - kroky 
Route::get('/udaje', [UdajeController::class, 'index'])->name('udaje.index');
Route::get('/platba', [PlatbaController::class, 'index'])->name('platba.index');
Route::get('/potvrdenie', [PotvrdenieController::class, 'index'])->name('potvrdenie.index');