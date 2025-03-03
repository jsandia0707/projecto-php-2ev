<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CuotasController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de autenticación con Google
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Grupo para Administradores
Route::middleware(['auth', 'checkUserType:Administrador'])->group(function () {
    Route::resource('clientes', ClientesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('cuotas', CuotasController::class);

    Route::get('clientes/{id}/cuotas', [CuotasController::class, 'cuotasPorCliente'])
        ->name('clientes.cuotas');

    Route::post('tareas/{id}/cancel', [TareasController::class, 'cancel'])
        ->name('tareas.cancel');

    Route::post('tareas/{id}/realize', [TareasController::class, 'realize'])
        ->name('tareas.realize');

    Route::post('users/{id}/degrade', [UsersController::class, 'degrade'])
        ->name('users.degrade');

    Route::post('users/{id}/promote', [UsersController::class, 'promote'])
        ->name('users.promote');

    Route::post('cuotas/{id}/markAsPaid', [CuotasController::class, 'markAsPaid'])
        ->name('cuotas.markAsPaid');
});

// Grupo para Operarios y Administradores
Route::middleware(['auth', 'checkUserType:Operario,Administrador'])->group(function () {
    Route::resource('tareas', TareasController::class);

    Route::get('/tareas/{id}/user', [TareasController::class, 'Tareas_X_Usuarios'])
        ->name('tareas.user');

    Route::get('/tareas/{id}/client', [TareasController::class, 'Tareas_X_Clientes'])
        ->name('tareas.clientes');
});

// Rutas para Perfil de Usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/api.php';