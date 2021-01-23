<?php

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\AuthController;


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

Route::post('register',[AuthController::class, 'register']);
        // Login User
        Route::post('login',[AuthController::class, 'login']);
        
        // Refresh the JWT Token
        Route::get('refresh',[AuthController::class, 'refresh']);
        
        // Below mention routes are available only for the authenticated users.
        Route::middleware('auth:api')->group(function () {
            // Get user info
            Route::get('user', 'AuthController@user');
            // Logout user from application
            Route::post('logout', 'AuthController@logout');

            Route::get('/veiculos',[VeiculosController::class, 'index']);
            Route::prefix('/veiculo')->group(function(){
                Route::post('/store', [VeiculosController::class,'store']);
                Route::put('/{id}', [VeiculosController::class,'update']);
                Route::delete('/{id}', [VeiculosController::class,'destroy']);
            });


        });

