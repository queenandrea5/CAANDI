<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BilletController;
/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    //Route::get('/user', [AuthController::class, 'getUser']);
});



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/billets', [BilletController::class, 'store']); // Acheter un billet
    Route::get('/billets', [BilletController::class, 'index']); // Lister tous les billets
    Route::get('/billets/{id}', [BilletController::class, 'show']); // Voir un billet spécifique
});
