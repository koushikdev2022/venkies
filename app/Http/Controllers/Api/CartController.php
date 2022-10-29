<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function cart_add(Request $request){
        $validate=   Validator::make($request->all(),[
            'items'=>'required'

        ]);
        if($validate->fails()){
            return $this->ErrorResponse(400,$validate->messages());
        }
        $cart_id= str::random(7);
        foreach ($request['items'] as $value){
             Cart::create([
                'cart_id'=>$value['cart_id'],
                'product'=>$value['product'],
                'quantity'=>$value['quantity'],
                'price'=>$value['price'],
            ]);
        }
        $carts= Cart::where('cart_id',$cart_id)->get();
        return $this->SuccessResponse(200,'Cart created successfully ...!', $carts);
    }
    public function cart_list(){
        $r= Cart::with('product.media')->where('cart_id',auth()->id())->get()->map(function($data){
            return $data;
        });

        return $this->SuccessResponse(200,'Cart fetch successfully ..!',$r);
    }
}
