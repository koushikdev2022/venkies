<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Categorie::all();
        $categories->map(function ($listing){
           $listing['image']=$listing->getFirstMediaUrl('category','thumb')??"";
           return $listing;
        });
        return view('pages.categorie.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.categorie.create');
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
           'name'=>'required'
       ]);
       $result=Categorie::create(
           [
              'name'=>$request->name,
           ]
       );
       if($request->hasFile('image'))
           $result->AddMedia($request->image)->toMediaCollection('category');
       if ($result!==null)
       {
           return redirect()->route('categorie.index')->with('success','data inserted ');
       }
        return redirect()->route('categorie.index')->with('failure','data insertion failed ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $categories=Categorie::find($id);
        return view('pages.categorie.edit' , compact('categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $categories=Categorie::find($categorie->id);

        $categories->update(
            [
                'name'=>$request->name,
            ]
        );
        if($request->hasFile('image')){
            $categories->clearMediaCollection('category');
            $categories->addMedia($request->image)->toMediaCollection('category');
        }
        return redirect()->route('categorie.index')->with('success','Category update successfully ..!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
       $categories=Categorie::find($categorie->id);
       $categories->delete();
       return redirect()->route('categorie.index')->with('success', 'deletion success');

    }
}
