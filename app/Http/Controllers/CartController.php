<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Retailer;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $carts=Cart::where('user_id',auth()->id())->latest()->get();
        return view('pages.cart.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $retailers=Retailer::all();
        $products=Product::all();
        return view('pages.cart.create',compact('users','retailers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
//            'items'=>'required'
        'quantity'=>'required',
            'price'=>'required'
        ]);
//        foreach ($request['items'] as $value){
           $result= Cart::create([
                'retailer'=>$request['retailer'],
                'user_id'=>auth()->id(),
                'product'=>$request['product'],
                'quantity'=>$request['quantity'],
                'price'=>$request['price'],
            ]);
           if ($result!==null){
               return redirect()->route('cart.index')->with('success','item added to cart successfully');
           }
            return redirect()->route('cart.index')->with('failure','something went wrong');

        }
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        $retailers=Retailer::all();
        $products=Product::all();
        $carts=Cart::find($cart->id);
        return view('pages.cart.edit',compact('carts','retailers','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $carts=Cart::find($cart->id);
        $carts->update([
            'retailer'=>$request['retailer'],
            'user_id'=>auth()->id(),
            'product'=>$request['product'],
            'quantity'=>$request['quantity'],
            'price'=>$request['price'],
        ]);
        return  redirect()->route('cart.index')->with('success','cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $delete=Cart::find($cart->id);
        $delete->delete();
        return redirect()->route('cart.index')->with('success','item deleted successfuly');
    }
}
