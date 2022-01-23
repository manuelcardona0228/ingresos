<?php

use App\Http\Controllers\EgresoController;
use App\Http\Controllers\IngresoController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('contrato/{id}/ingresos', [IngresoController::class, 'ingresoContratoIndex'])->name('contrato.ingreso.index');
Route::get('contrato/{id}/egresos', [EgresoController::class, 'egresoContratoIndex'])->name('contrato.egreso.index');
require __DIR__.'/auth.php';
