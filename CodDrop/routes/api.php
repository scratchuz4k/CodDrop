<?php

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculosController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/veiculos',[VeiculosController::class, 'index']);
Route::prefix('/veiculo')->group(function(){
    Route::post('/store', [VeiculosController::class,'store']);
    Route::put('/{id}', [VeiculosController::class,'update']);
    Route::delete('/{id}', [VeiculosController::class,'destroy']);
});