<?php

use App\Http\Controllers\Api\AuthController;
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
});

Route::get('authentication',[AuthController::class,'authentication'])->name('authentication');
Route::middleware('auth:sanctum')->group( function () {
    Route::get('boarding',[\App\Http\Controllers\Api\AuthController::class,'boarding']);
    Route::post('register',[\App\Http\Controllers\Api\RetailerController::class,'retailer_register']);
});
Route::post('login',[AuthController::class,'login']);
