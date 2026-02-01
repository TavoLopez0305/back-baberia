<?php

use Illuminate\Support\Facades\Route;

// controllers
use App\Http\Controllers\AuthController;


Route::get('/ping', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'API funcionando'
    ]);
});


// auth 
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});
