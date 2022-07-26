<?php

use App\Http\Controllers\GasEmpresasController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Home');
    })->name('dashboard');

    Route::get('/gas/captura', function () {
        return Inertia::render('modules/gas/GasCaptura');
    })->name('gas.captura');

    Route::get('/gas/empresas', [GasEmpresasController::class, 'index'])->name('gas.empresas');
    Route::post('/gas/empresas/store', [GasEmpresasController::class, 'store'])->name('gas.empresas.store');
});

Route::get('/dashboard2', function () {
    return Inertia::render('H');
})->name('dashboard2');
