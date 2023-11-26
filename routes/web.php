<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostulacionesController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\SuscripcionesController;
use App\Http\Controllers\TalleresMecanicosController;
use App\Http\Controllers\TecnicosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'loginview'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/membresias', [SuscripcionesController::class, 'membresias'])->name('membresias');
Route::get('/metodo-de-pago/{total}', [SuscripcionesController::class, 'paymentView'])->name('payment.index');
Route::post('/auth_login', [AuthController::class, 'authLogin'])->name('auth.login');
Route::post('/register-store', [AuthController::class, 'guardarRegistro'])->name('register.store');
Route::get('/metodopago', [SuscripcionesController::class, 'viewMetodoPago'])->name('metodo_pago.index');
Route::get('/pagar/{total}', [SuscripcionesController::class, 'pagar'])->name('pagar.store');
Route::get('/create-taller', [TalleresMecanicosController::class, 'createTaller'])->name('taller.create');
Route::post('/store-taller', [TalleresMecanicosController::class, 'registrarTaller'])->name('taller.store');
Route::get('/list-tecnicos', [TecnicosController::class, 'index'])->name('tecnicos.index');
Route::get('/tecnicos-create', [TecnicosController::class, 'create'])->name('tecnicos.create');
Route::post('/tecnicos-store', [TecnicosController::class, 'store'])->name('tecnicos.store');
Route::get('/ver-mapa/{id}', [TecnicosController::class, 'verTecnicoEnElMapa'])->name('tecnicos.mapa');
Route::get('/tecnicos-edit/{id}', [TecnicosController::class, 'edit'])->name('tecnicos.edit');
Route::post('/tecnicos-store-lat-lng', [TecnicosController::class, 'storeLatLng'])->name('tecnicos.store_lat_lng');
Route::get('/all-tecnicos-mapa', [TecnicosController::class, 'allTecnicosMap'])->name('tecnicos.all_tecnicos_map');
Route::get('/solicitudes', [SolicitudesController::class, 'index'])->name('solicitudes.index');
Route::get('/solicitudes/{id}', [SolicitudesController::class, 'show'])->name('solicitudes.show');
Route::get('/postular/{id}', [PostulacionesController::class, 'postuacion'])->name('postulacion.create');
Route::post('/postular', [PostulacionesController::class, 'postular'])->name('postulacion.store');
