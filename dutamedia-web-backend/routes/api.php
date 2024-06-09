<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/login', function() {
    return response()->json(['message' => 'unauthorized'], 401);
})->name('login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/users', [AuthController::class,'index']);
    Route::get('/users/{id}', [AuthController::class,'show']);
});