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

// Rutas protegidas con autenticación
Route::middleware('auth')->group(function () {
    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario');
});

Route::post('/inventario', [InventarioController::class, 'agregar'])->name('inventario.agregar');
Route::put('/inventario/{id}', [InventarioController::class, 'actualizar'])->name('inventario.actualizar');
Route::put('/inventario/inactivar/{id}', [InventarioController::class, 'inactivar']);
Route::get('/exportar-inventario-excel', [InventarioController::class, 'exportarExcel'])->name('exportar-excel-inventario');

Route::post('/inventario/guardar-archivo/{id}', [InventarioController::class, 'guardarArchivo'])->name('inventario.guardarArchivos');
Route::delete('/inventario/{id}/borrar-archivo', [InventarioController::class, 'borrarArchivo'])->name('inventario.borrarArchivo');

Route::get('/reporte-inventario', [InventarioController::class, 'reporteCompleto'])->name('inventario.reporte');





// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
