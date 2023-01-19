<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Cadastros\{
    AnoAgriculaController,
    EmpresaController,
};
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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::get('/me', function (Request $request) {
        return auth()->user();
    });

    //Route::apiResource('/empresa', EmpresaController::class);
    

    Route::post('/auth/logout', [AuthController::class, 'logout']);
});

//Route::apiResource('posts', PostController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/ano-agricula', AnoAgriculaController::class);

Route::apiResource('safra', App\Http\Controllers\Api\Cadastros\SafraController::class);


Route::apiResource('safra', App\Http\Controllers\Api\Cadastros\SafraController::class);
