<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\Http\Controllers\UserController;

Route::post('user/login',
   [UserController::class,'login']);

Route::post('user/create',
   [UserController::class,'apiStore']);

Route::put('user/{u}',
   [UserController::class,'apiUpdate']);

Route::delete('user/{id}',
   [UserController::class,'apiDelete']);

Route::get('user/{u}',
   [UserController::class,'apiShow']);