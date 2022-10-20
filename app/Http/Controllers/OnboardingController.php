<?php

namespace App\Http\Controllers;

use App\Models\Onboarding;
use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boardings=Onboarding::all();
        $boardings->map(function($listing){
            $listing['image']= $listing->getFirstMediaUrl('boarding','thumb');
            return $listing;
        });
        return view('pages.boarding.index',compact('boardings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.boarding.create');

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
                'title'=>'required',
                'description'=>'required',
                'img'=>'required'
            ]);
            $on_boarding=Onboarding::create([
                'title'=> $request['title'],
                'description'=>$request['description'],
            ]);
            $on_boarding->addMedia($request->img)->toMediaCollection('boarding');
            if($on_boarding !== null){
                return redirect()->route('boarding.index')->with('success', 'Stored Successfully ..!');
            }
            return redirect()->back()->with('error', 'Failed to Store Data ..!');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boarding=Onboarding::find($id);
        return view('pages.boarding.edit',compact('boarding'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $boarding=Onboarding::find($id);
        $boarding->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        if($request->hasFile('img')){
            $boarding->clearMediaCollection('boarding');
            $boarding->addMedia($request->img)->toMediaCollection('boarding');
        }
        return redirect()->route('boarding.index')->with('success','Schedule update successfully ..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boarding=Onboarding::find($id);
        $boarding->delete();
        return redirect()->route('boarding.index')->with('success','On boarding deleted successfully ..!');
    }
    public function get_boarding(){
        $banners= Onboarding::latest()->get();
        if(!is_null($banners)){
            $banners->map(function($listing){
                $listing['image']= $listing->getFirstMediaUrl('boarding','thumb');
               unset( $listing['media']);
               unset( $listing['created_at']);
               unset( $listing['updated_at']);

            });
        }

        else{
            return $this->SuccessResponse(200,"No data found",null);
        }

        return $this->SuccessResponse(200,"Data fetch Successfully",$banners);
    }
}
