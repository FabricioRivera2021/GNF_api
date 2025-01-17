<?php

use App\Events\Example;
use App\Events\updateNumbers;
use App\Models\Numeros;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::post("/register", [AuthController::class, "register"]);
// Route::post("/login", [AuthController::class, "login"]);

Route::get('/broadcast', function () {
    $numeros = Numeros::all();
    broadcast(new Example($numeros));
});