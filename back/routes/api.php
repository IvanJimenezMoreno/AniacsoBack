<?php

use App\Http\Controllers\RegistroController;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registro', [RegistroController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post('/comentarios', [ComentarioController::class, 'store']);
Route::middleware('auth:sanctum')->get('/comentarios', [ComentarioController::class, 'index']);

Route::middleware('auth:sanctum')->get('/usuarios', [UsuarioController::class, 'index']);
Route::middleware('auth:sanctum')->get('/usuarios/{id}/apodo', [UsuarioController::class, 'getApodo']);
