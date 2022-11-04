<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Retailer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){
       $response=[
           'total_retailers'=> Retailer::count() ,
           'total_products' =>Product::count(),
           'total_executives'=>User::count(),
           'total_orders'=>Cart::count()
       ];
       return view('home',compact('response'));
   }

}
