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
Route::get('retailer/order',[\App\Http\Controllers\Api\RetailerController::class,'retailer_order'])->name('retailer.order');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user',\App\Http\Controllers\UserController::class);
Route::get('/status/update', [\App\Http\Controllers\UserController::class, 'updateStatus']);
Route::resource('retailer',\App\Http\Controllers\RetailerController::class);
Route::resource('categorie',\App\Http\Controllers\CategorieController::class);
Route::resource('product',\App\Http\Controllers\ProductController::class);
Route::resource('boarding',\App\Http\Controllers\OnboardingController::class);
Route::resource('indemand', \App\Http\Controllers\InDemandProductController::class);
Route::resource('attendance', \App\Http\Controllers\AttendanceController::class);
Route::resource('meeting', \App\Http\Controllers\MettingController::class);
Route::resource('location',\App\Http\Controllers\LocationController::class);
Route::resource('dashboard',\App\Http\Controllers\DashboardController::class);
Route::resource('cart',\App\Http\Controllers\CartController::class);
Route::resource('leave',\App\Http\Controllers\LeaveController::class);
Route::resource('support',\App\Http\Controllers\SupportController::class);

