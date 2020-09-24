<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\UsuarioController;

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

Route::prefix('api')->group(function () {
    Route::get('/usuario', [UsuarioController::class, 'index']);
    Route::get('/usuario/{usuario}', [UsuarioController::class, 'show']);
    Route::post('/usuario', [UsuarioController::class, 'store']);
    Route::put('/usuario/{usuario}', [UsuarioController::class, 'update']);
    Route::delete('/usuario/{usuario}', [UsuarioController::class, 'delete']);
});

Route::get('/{any}', AppController::class)->where('any', '.*');
