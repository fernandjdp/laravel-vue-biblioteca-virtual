<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Con esta ruta, no importa en qué componente/vista de vue estés, cuando recargues o ingreses la ruta a ese componente, entrará allí*/

Route::get('{path}',[App\Http\Controllers\HomeController::class, 'index'])->where('path','([-a-z0-9_\s]+)');

