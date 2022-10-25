<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user',\App\Http\Controllers\UserController::class);
Route::resource('retailer',\App\Http\Controllers\RetailerController::class);
Route::resource('categorie',\App\Http\Controllers\CategorieController::class);
Route::resource('product',\App\Http\Controllers\ProductController::class);
Route::resource('boarding',\App\Http\Controllers\OnboardingController::class);
Route::resource('indemand', \App\Http\Controllers\InDemandProductController::class);
Route::resource('attendance', \App\Http\Controllers\AttendanceController::class);
Route::resource('meeting', \App\Models\Metting::class);
