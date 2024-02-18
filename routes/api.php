<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MadreController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;

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

Route::prefix('/alumno') -> controller(AlumnoController::class) -> group(function (){
    Route::get('', 'getAll');
    Route::middleware('comprobarIDnumerico')->get('{id}', 'getAlumnoByID');
    Route::post('', 'create');
    Route::middleware('comprobarIDnumerico')->delete('{id}', 'delete');
    Route::middleware('comprobarIDnumerico')->post('/update/{id}', 'update');
    Route::middleware('comprobarIDnumerico')->get('{id}/madre', 'getMadre');
    Route::middleware('comprobarIDnumerico')->get('{id}/mascota', 'getMascota');
});

Route::prefix('/mascota') -> controller(MascotaController::class) -> group(function (){
    Route::get('', 'getAll');
    Route::middleware('comprobarIDnumerico')->get('{id}', 'getById');
    Route::post('', 'create'); 
    Route::middleware('comprobarIDnumerico')->delete('{id}', 'delete');
    Route::middleware('comprobarIDnumerico')->post('{id}', 'update');
    Route::middleware('comprobarIDnumerico')->get('{id}/alumno', 'getAlumno');
});

Route::prefix('/madre')->controller(MadreController::class)->group(function () {
    Route::get('', 'getAll');
    Route::middleware('comprobarIDnumerico')->get('{id}', 'getById');
    Route::post('', 'create');
    Route::middleware('comprobarIDnumerico')->delete('{id}', 'delete');
    Route::middleware('comprobarIDnumerico')->post('{id}', 'update');
    Route::middleware('comprobarIDnumerico')->get('{id}/alumno', 'getAlumno');
});

Route::post('/login',[LoginController::class, 'login']);
//Route::middleware('comprobarInicioSesion') -> put('/cerrarSesion', [LoginController::class, 'cerrarSesion']);
//Route::middleware('comprobarInicioSesion') -> put('/informacion', [LoginController::class, 'informacionUsuario']);
Route::middleware('auth:api')->post('/crearUsuario', [UsuarioController::class, 'crearUsuario']);
Route::middleware('auth:api')->put('/cerrarSesion',[LoginController::class, 'cerrarSesion']);
Route::middleware('auth:api')->get('/informacion',[LoginController::class, 'informacionUsuario']);