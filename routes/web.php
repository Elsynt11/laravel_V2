<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ConfirmadosController;
use App\Http\Controllers\SospechososController;
use App\Http\Controllers\NegativosController;
use App\Http\Controllers\DefuncionesController;
use App\Http\Controllers\GraficaController;
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

Route::get('/chart', function () {
    return view('chart');
});

Route::get('/grafica', [GraficaController::class, 'casos']);
Route::get('/top5', [GraficaController::class, 'top']);

Route::get('/estados/getEstados', [EstadoController::class, 'getEstados']);


Route::resource('/estados', EstadoController::class);
Route::resource('/confirmados', ConfirmadosController::class);
Route::resource('/sospechosos', SospechososController::class);
Route::resource('/negativos', NegativosController::class);
Route::resource('/defunciones', DefuncionesController::class);
