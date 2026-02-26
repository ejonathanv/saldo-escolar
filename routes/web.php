<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\HijoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestriccionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

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

    // Inventario
    Route::get('inventario', [InventarioController::class, 'index'])->name('inventario');

    // Pagos Stripe
    Route::post('pagos/create-payment-intent', [PagoController::class, 'createPaymentIntent'])->name('pagos.create-payment-intent');
    Route::post('pagos/confirmar', [PagoController::class, 'confirmarPago'])->name('pagos.confirmar');
    Route::post('pagos/verificar-estado', [PagoController::class, 'verificarEstado'])->name('pagos.verificar-estado');

});

require __DIR__.'/auth.php';
