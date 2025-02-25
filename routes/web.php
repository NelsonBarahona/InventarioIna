<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarioController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el inicio de sesión
Route::post('/login', [AuthController::class, 'login']);

// Ruta para el inventario
Route::get('/inventario', [AuthController::class, 'inventario'])->name('inventario');

// Ruta para obtener la tabla en la vista con sus registros 
Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

