<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonacionController; //Controlador de Donaciones
use App\Http\Controllers\VeterinarioController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form'); //Mostrar Registro
Route::post('/register', [AuthController::class, 'register'])->name('register'); //Procesar Registro


Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form'); // Mostrar login
Route::post('/login', [AuthController::class, 'login'])->name('login'); // Procesar login


Route::get('/recuperar', [AuthController::class, 'showForgot'])->name('forgot.form'); //Mostrar recuperar contraseña
Route::post('/recuperar-buscar', [AuthController::class, 'buscarPregunta'])->name('forgot.buscar');
Route::post('/recuperar-validar', [AuthController::class, 'validarRespuesta'])->name('forgot.validar');

Route::get('/nueva-contrasena', function () { //Mostrar actualizar contraseña
    return view('LogRegRecViews.nueva_contraseña');
})->name('forgot.nueva');
Route::post('/nueva-contrasena', [AuthController::class, 'actualizarContraseña'])->name('forgot.actualizar'); //Vista actualizar


Route::post('/donar', [DonacionController::class, 'store'])->name('donations.store');
Route::get('/', [DonacionController::class, 'inicio'])->name('inicio');
Route::patch('/donaciones/{donacion}/atendida', [DonacionController::class, 'marcarAtendida'])->name('donaciones.atendida');


// Ruta principal para el panel veterinario
Route::get('/veterinario', [VeterinarioController::class, 'index'])->name('veterinario.index');
Route::post('/productos/actualizar-stock', [VeterinarioController::class, 'actualizarStock'])->name('productos.actualizarStock');

Route::get('/inventario', [VeterinarioController::class, 'inventario'])->name('inventario');
Route::post('/inventario/toggle/{id}', [VeterinarioController::class, 'toggleActivo']);
Route::get('/productos', [VeterinarioController::class, 'productos'])->name('Productos');
Route::post('/productos', [VeterinarioController::class, 'storeProducto'])->name('Productos.store');
Route::get('/estadisticas', [VeterinarioController::class, 'estadisticas'])->name('estadisticas');