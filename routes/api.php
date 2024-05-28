<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\NumerosController;
use App\Http\Controllers\UserPositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
// Route::post("/logout", [AuthController::class, "logout"]);

Route::get("/dashboard");

Route::post("/createNumber", [NumerosController::class, "createNumber"]);
Route::post("/createNumberFromSW", [NumerosController::class, "createNumberFromSW"]);

Route::get("/allNumbers/{id?}", [NumerosController::class, "allNumbers"]);

Route::get("/allEstados", [EstadosController::class, "allEstados"]);

Route::get("/allPositions", [UserPositionController::class, "allPositions"]);
Route::get("/currentPosition", [UserPositionController::class, "currentPosition"]);
Route::post("/clearPosition", [UserPositionController::class, "clearPosition"]);
Route::post("/changePosition/{id?}", [UserPositionController::class, "changeUserCurrentPosition"]);