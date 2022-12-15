<?php

namespace App\Http\Controllers;

use App\Models\support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supports=Support::all();
        return view('pages.support.index',compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.support.create');
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
        $this->validate($request,
        [
            'name'=>'required',
            'email'=>'required'
        ]);
        $support=Support::create([
           'name'=>$request->name,
           'email'=>$request->email
        ]);
        return redirect()->route('support.index')->with('success','data insert');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $support=Support::find($id);
        return view('pages.support.edit',compact('support'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, support $support)
    {
        //
        $support=Support::find($support->id);
        $support->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        return redirect(route('support.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(support $support)
    {
        //
        $support=Support::find($support->id);
        $support->delete();
        return redirect(route('support.index'));
    }
}
