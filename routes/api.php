<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


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



