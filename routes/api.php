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
    Route::get('today',[\App\Http\Controllers\Api\AuthController::class,'today_task']);
    Route::post('register',[\App\Http\Controllers\Api\RetailerController::class,'retailer_register']);
    Route::post('update',[\App\Http\Controllers\Api\RetailerController::class,'retailer_update']);
//    Route::post('category/update',[\App\Http\Controllers\Api\CategoryController::class,'update_category']);
//    Route::post('category/create',[\App\Http\Controllers\Api\CategoryController::class,'create_category']);
    Route::get('list',[\App\Http\Controllers\Api\CategoryController::class,'list_category']);
    Route::get('retailer/list',[\App\Http\Controllers\Api\RetailerController::class,'retailer_list']);
    Route::get('retailer/find/{id}',[\App\Http\Controllers\Api\RetailerController::class,'retailer_find']);
    Route::get('product/list/{id?}',[\App\Http\Controllers\Api\ProductController::class,'product_list']);
    Route::get('indemand/list',[\App\Http\Controllers\Api\InDemandController::class,'indemand_list']);
    Route::post('indemand/add',[\App\Http\Controllers\Api\InDemandController::class,'add_product']);
    Route::post('in-demand/update/{id}',[\App\Http\Controllers\Api\InDemandController::class,'update_indemand']);
    Route::get('meeting/list',[\App\Http\Controllers\Api\MeetingController::class,'meeting_list']);
    Route::get('meeting-list/{id}',[\App\Http\Controllers\Api\MeetingController::class,'meeting_details']);
    Route::get('today/meetinglist',[\App\Http\Controllers\Api\MeetingController::class,'today_meeting']);
    Route::post('update-meeting',[\App\Http\Controllers\Api\MeetingController::class,'update_meeting']);
    Route::post('create-meeting',[\App\Http\Controllers\Api\MeetingController::class,'create_meeting']);
    Route::get('orders/{id}',[\App\Http\Controllers\Api\CartController::class,'order_details']);
    Route::get('cart/list',[\App\Http\Controllers\Api\CartController::class,'cart_list']);
    Route::post('cart/add',[\App\Http\Controllers\Api\CartController::class,'cart_add']);
    Route::post('place/order',[\App\Http\Controllers\Api\CartController::class,'place_order']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('profile/update',[AuthController::class,'profile_update']);
    Route::get('leave/list',[\App\Http\Controllers\Api\LeaveController::class,'list_leave']);
    Route::post('leave/create',[\App\Http\Controllers\Api\LeaveController::class,'create_leave']);
    Route::post('leave/update/{id}',[\App\Http\Controllers\Api\LeaveController::class,'update_leave']);
    Route::get('leave/find/{id}',[\App\Http\Controllers\Api\LeaveController::class,'find_leave']);
    Route::get('location/list',[\App\Http\Controllers\Api\LocationController::class,'location_list']);
    Route::post('location/create',[\App\Http\Controllers\Api\LocationController::class,'location_create']);
    Route::get('resend/password',[AuthController::class,'send_password']);
    Route::post('send/report',[AuthController::class,'send_report']);
    Route::get('email/list',[\App\Http\Controllers\Api\SupportController::class,'get_mails']);
});
Route::post('login',[AuthController::class,'login']);

