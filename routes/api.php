<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\FilasController;
use App\Http\Controllers\MedicationsController;
use App\Http\Controllers\NumerosController;
use App\Http\Controllers\TratamientosController;
use App\Http\Controllers\UserController;
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
Route::get("/usersInPositions", [UserController::class, "usersInPositions"]);
Route::get("/isProcesingNumber", [NumerosController::class, "userIsProcesingNumber"]);

Route::post("/createNumber", [NumerosController::class, "createNumber"]);
Route::post("/createNumberFromSW", [NumerosController::class, "createNumberFromSW"]);
Route::post("/asignNumberToUser", [NumerosController::class, "asignNumberToUser"]);
Route::get("/derivateTo", [NumerosController::class, "derivateTo"]);
Route::post("/derivateToPosition", [NumerosController::class, "derivateToPosition"]);

Route::get("/getCurrentSelectedNumber", [NumerosController::class, "getCurrentSelectedNumber"]);
Route::get("/allNumbers/{id?}", [NumerosController::class, "allNumbers"]);
Route::get("/filterPausedNumbers", [NumerosController::class, "filterPausedNumbers"]);
Route::get("/filterCancelNumbers", [NumerosController::class, "filterCancelNumbers"]);

Route::get("/allEstados", [EstadosController::class, "allEstados"]);
Route::post("/setNextState", [EstadosController::class, "setNextState"]);
Route::post("/setPause", [EstadosController::class, "pauseNumber"]);
Route::post("/setCanceled", [EstadosController::class, "cancelNumber"]);

Route::get("/allPositions", [UserPositionController::class, "allPositions"]);
Route::get("/currentPosition", [UserPositionController::class, "currentPosition"]);
Route::post("/clearPosition", [UserPositionController::class, "clearPosition"]);
Route::post("/changePosition/{id?}", [UserPositionController::class, "changeUserCurrentPosition"]);

Route::get("/allFilas", [FilasController::class, "allFilas"]);
Route::post("/clearAllPositions", [UserPositionController::class, "forceClearAllPosition"]);

//medicamentos
Route::get("/allMedications", [MedicationsController::class, "index"]);

//tratamientos
Route::get("/allTreatments/{id?}", [TratamientosController::class, "show"]);

//historico de retiros
Route::get("/allRetiros", [NumerosController::class, "allRetiros"]);