<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $products->map(function ($listing){
           $listing['image']=$listing->getFirstMediaUrl('product','thumb')??"";
           return $listing;
        });
        return view('pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Categorie::get();
        return view('pages.product.create',compact('categories'));
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
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);

        $products=Product::create(
            [
                'name'=>$request->name,
                'category_id'=>$request->category_id,
                'price'=>$request->price,
                'description'=>$request->description,
            ]
        );
        if ($request->hasFile('image')){
            $products->addMedia($request->image)->toMediaCollection('product');
        }
        if ($products!==null)
        {
            return redirect()->route('product.index')->with('success','data inserted ');
        }
        return redirect()->route('product.index')->with('failure','data insertion failed ');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products=Product::find($product->id);
        $categories= Categorie::get();
        return view('pages.product.edit',compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $products=Product::find($product->id);
        $products->update(
            [
                'name'=>$request->name,
                'category_id'=>$request->category_id,
                'price'=>$request->price,
                'description'=>$request->description,
            ]
        );
        if($request->hasFile('image')){
            $products->clearMediaCollection('product');
            $products->addMedia($request->image)->toMediaCollection('product');
        }
        return redirect()->route('product.index')->with('success','Category update successfully ..!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $products=Product::find($product->id);
        $products->delete();
        return redirect()->route('product.index')->with('success', 'deletion success');

    }
}
