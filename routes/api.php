<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProdukController;

Route::post('/registrasi', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::get('/produk/{id}', [ProdukController::class, 'show']);
    Route::put('/produk/{id}/update', [ProdukController::class, 'update']);
    Route::patch('/produk/{id}/update', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}/delete', [ProdukController::class, 'destroy']);
});

