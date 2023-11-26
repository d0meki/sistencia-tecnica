<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\TalleresMecanicosController;
use App\Http\Controllers\TecnicosController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register-user', [AuthController::class, 'registrarUsuario']);
Route::get('/get-usuarios', [AuthController::class, 'getUsuarios']);
Route::get('/get-usuario/{id}', [AuthController::class, 'getUserById']);
Route::post('/asignar-role', [AuthController::class, 'asignarRol']);
Route::post('/register-vehiculo', [VehiculoController::class, 'registrarVehiculo']);
Route::post('/register-taller-mecanico', [TalleresMecanicosController::class, 'registrarTallerMecanico']);
Route::post('/register-tecnico', [TecnicosController::class, 'addTecnicoTaller']);
Route::post('/register-usuario-taller', [TalleresMecanicosController::class, 'registrarUsuarioTaller']);
Route::get('/get-tecnicos/{id}', [TecnicosController::class, 'getTecnicosByTaller']);
Route::get('/get-my-vehiculos/{id}', [VehiculoController::class, 'getVehiculosByid']);
Route::get('/get-my-taller/{id}', [TalleresMecanicosController::class, 'getMyTallerMecanico']);

Route::post('/solicitar', [SolicitudesController::class, 'nuevaSolicitud']);
Route::get('/tarea/{id}', [TecnicosController::class, 'tareaTecnico']);

