<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el inicio de sesión
Route::post('/login', [AuthController::class, 'login']);

// Ruta para el dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');