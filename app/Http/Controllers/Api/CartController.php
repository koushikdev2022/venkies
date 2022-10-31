<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Metting;
use App\Models\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
//        $cart_id= str::random(7);
        foreach ($request['items'] as $value){
             Cart::create([
                 'retailer'=>$value['retailer'],
                'user_id'=>auth()->id(),
                'product'=>$value['product'],
                'quantity'=>$value['quantity'],
                'price'=>$value['price'],
            ]);
        }
        $carts= Cart::where('user_id',auth()->id())->groupBy('retailer')->get();
        return $this->SuccessResponse(200,'Cart created successfully ...!', $carts);
    }
    public function cart_list(){
        $r= Cart::with('product.media')->select("*")->where('user_id',auth()->id())->groupBy('retailer')->get();
        return $this->SuccessResponse(200,'Cart fetch successfully ..!',$r);
    }
    public function today_meeting(){
        $list = Cart::whereDate('date', Carbon::today())->get()->all();
        return $this->SuccessResponse('200','data fetch successfully',$list);
    }

    public function place_order(Request $request)
    {
        $validate=   Validator::make($request->all(),[
            'items'=>'required'
        ]);
        foreach ($request['items'] as $item)
        {
            Cart::find($item->id)->update(['status'=> true]);
        }
        if($validate->fails()){
            return $this->ErrorResponse(400,$validate->messages());
        }

     return $this->SuccessResponse(200,'Order place successfully');
    }
}
