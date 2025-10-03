<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\CategoriaController;


Route::get('/', function () { return view('welcome'); });

Route::get('/login', Login::class)->name('login');

Route::get('/dashboard', [InicioController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/categorias',        [CategoriaController::class, 'index'])->name('categoria')->middleware('auth');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categoria.crear')->middleware('auth');
Route::get('/categorias/show',   [CategoriaController::class, 'show'])->name('categoria.show')->middleware('auth');
Route::get('/categorias/trash',  [CategoriaController::class, 'trash'])->name('categoria.trash')->middleware('auth');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

