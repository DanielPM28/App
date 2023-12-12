<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','admin'])->group(function () {
    //RUTAS PRODUCTORAS
 Route::get('/productoras', [App\Http\Controllers\admin\EventProducerController::class, 'index']);

 Route::get('/productoras/create', [App\Http\Controllers\admin\EventProducerController::class, 'create']);
 Route::get('/productoras/{eventproducers}/edit', [App\Http\Controllers\admin\EventProducerController::class, 'edit']);
 Route::post('/productoras', [App\Http\Controllers\admin\EventProducerController::class, 'sendData']);

 Route::put('/productoras/{produ}', [App\Http\Controllers\admin\EventProducerController::class, 'update']);
 Route::delete('/productoras/{produ}', [App\Http\Controllers\admin\EventProducerController::class, 'destroy']);

//Rutas Conductores
 Route::resource('conductores', 'App\Http\Controllers\admin\ConductoresController');
//Rutas producciones
 Route::resource('producciones', 'App\Http\Controllers\admin\ProduccionesController');
});

Route::middleware(['auth','conductor'])->group(function () {
    Route::get('/horario', [App\Http\Controllers\conductor\HorarioController::class, 'edit']);
    Route::post('/horario', [App\Http\Controllers\conductor\HorarioController::class, 'store']);
});