<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsersApiController;
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

Route::get('/register', [UserAuthController::class, 'register']);
Route::get('/login', [UserAuthController::class, 'login']);

Route::apiResource('/employee', EmployeeController::class)->middleware('auth:api');
// Route::resource('users', UsersApiController::class)->middleware('auth:api');
