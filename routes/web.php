<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HijoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RestriccionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Hijos
    Route::get('hijos/{hijo}', [HijoController::class, 'show'])->name('administrar-hijo');
    // Recarga de saldo para hijo
    Route::get('hijos/{hijo}/agregar-saldo', [DepositoController::class, 'index'])->name('agregar-saldo');
    Route::post('hijos/{hijo}/realizar-recarga', [DepositoController::class, 'store'])->name('realizar-recarga');
    // Restricciones para hijo
    Route::get('hijos/{hijo}/restricciones', [RestriccionController::class, 'index'])->name('restricciones');

});

require __DIR__.'/auth.php';
