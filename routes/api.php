<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NumerosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

Route::post("/createNumber", [NumerosController::class, "createNumber"]);
Route::post("/createNumberFromSW", [NumerosController::class, "createNumberFromSW"]);

Route::get("/allNumbers", [NumerosController::class, "allNumbers"]);