<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ReviewController;



Route::get('/hazaro', function () {
    return 'bonjour';
});/*->middleware('auth:sanctum');*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    //Route::get('/user', [AuthController::class, 'getUser']);
});




Route::post('/tickets/purchase', [TicketController::class, 'purchase']);


// Mettre à jour un biome


Route::middleware('auth:sanctum', 'admin')->group(function () {
    Route::post('/admin/set-meal-error', [AdminController::class, 'setMealError']);
    Route::post('/admin/set-enclosure-status', [AdminController::class, 'setEnclosureStatus']);
});


// routes/api.php

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin-only', function () {
        // Code accessible uniquement par les admins
        return response()->json(['message' => 'Welcome, Admin!']);
    })->middleware('admin');
});
// routes/web.php ou routes/api.php

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});
Route::get('/users/{id}', [UserController::class, 'show']);


//Route::get('/animals', [AnimalController::class, 'index']); // Lister tous les animaux

//Route::get('/animals/{id}', [AnimalController::class, 'show']); // Afficher un animal

//Route::post('/animals', [AnimalController::class, 'store']); // Ajouter un animal


Route::get('/animals/{name}', [AnimalController::class, 'search']);

Route::post('/reviews', [ReviewController::class, 'store']); // Ajouter un avis

Route::get('/reviews/{id_enclosure}', [ReviewController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

