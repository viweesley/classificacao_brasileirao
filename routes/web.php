<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassificacaoController;
use App\Http\Controllers\JogoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/classificacao', [ClassificacaoController::class, 'index'])->name('classificacao.index');
Route::post('/confronto', [JogoController::class, 'store'])->name('jogo.store');



