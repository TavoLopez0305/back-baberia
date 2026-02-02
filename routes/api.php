<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;


// Route::get('/ping', function () {
//     return response()->json([
//         'status' => 'ok',
//         'message' => 'API funcionando'
//     ]);
// });


// auth 
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');
});

Route::middleware(['auth:sanctum', 'role:administrador'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'role:administrador'])->group(function () {
    Route::get('/productos', [ProductoController::class, 'index']);
    Route::get('/productos/{id}', [ProductoController::class, 'show']);
    Route::post('/productos', [ProductoController::class, 'store']);
    Route::put('/productos/{id}', [ProductoController::class, 'update']);
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'role:administrador'])->group(function () {
    Route::get('/sucursales', [SucursalController::class, 'index']);
    Route::get('/sucursales/{id}', [SucursalController::class, 'show']);
    Route::post('/sucursales', [SucursalController::class, 'store']);
    Route::put('/sucursales/{id}', [SucursalController::class, 'update']);
    Route::delete('/sucursales/{id}', [SucursalController::class, 'destroy']);
});



