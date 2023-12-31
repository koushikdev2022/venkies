<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Retailer;
use App\Models\User;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        $retailers=Retailer::all();
        return view('pages.retailers.index',compact('retailers','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function show(Retailer $retailer)
    {
        $carts=Cart::where('retailer',$retailer->id)->latest()->get();
        return view('pages.cart.index',compact('carts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function edit(Retailer $retailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retailer $retailer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retailer $retailer)
    {
        //
    }
}
