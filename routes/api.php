<?php

use App\Http\Controllers\UserApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user_api_controller/index', [UserApiController::class, 'index']);
Route::post('/user_api_controller/show/{id}', [UserApiController::class, 'show']);
Route::post('/user_api_controller/insert', [UserApiController::class, 'insert']);
Route::post('/user_api_controller/delete/{id}', [UserApiController::class, 'delete']);
