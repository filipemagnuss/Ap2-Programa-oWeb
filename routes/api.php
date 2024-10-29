<?php

use App\Models\Carro;
use App\Http\Controllers\CarroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    
    Route::get('/carro', [CarroController::class,'index']);
    Route::get('/carro/{placa}', [CarroController::class,'show']);
    Route::post('/carro', [CarroController::class,'store']);
    Route::put('/carro/{placa}', [CarroController::class,'update']);
    Route::delete('/carro/{placa}', [CarroController::class,'destroy']);

});
