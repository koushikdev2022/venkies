<?php

namespace App\Http\Controllers;

use App\Models\Metting;
use App\Models\Retailer;
use App\Models\User;
use Illuminate\Http\Request;

class MettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $meetings=Metting::all();
       return view('pages.meeting.index',compact('meetings'));
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
        return view('pages.meeting.create',compact('users','retailers'));
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
            'user_id'=>'required',
            'retailer'=>'required',
            'date'=>'required',
            'time'=>'required',
            'note'=>'required'
        ]);
        $meetings=Metting::create([
            'user_id'=>$request->user_id,
            'retailer'=>$request->retailer,
            'date'=>$request->date,
            'time'=>$request->time,
            'note'=>$request->note,
        ]);
      if ($meetings!==null)
      {
          return redirect()->route('meeting.index')->with('success', 'data insertaion successfull');
      }
        return redirect()->route('meeting.index')->with('failure', 'data insertation failed');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Metting  $metting
     * @return \Illuminate\Http\Response
     */
    public function show(Metting $metting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Metting  $metting
     * @return \Illuminate\Http\Response
     */
    public function edit(Metting $metting)
    {
        $users=User::all();
        $retailers=Retailer::all();
        $meetings=Metting::find($metting->id);
        return view('pages.meeting.edit',compact('users','retailers','meetings'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Metting  $metting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metting $metting)
    {
        $meetings=find($metting->id);
        $meetings->update([
            'user_id'=>$request->user_id,
            'retailer'=>$request->retailer,
            'date'=>$request->date,
            'time'=>$request->time,
            'note'=>$request->note,

        ]);
        return redirect()->route('meeting.index')->with('success','data updation successfully....');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Metting  $metting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metting $metting)
    {
        $meetings=Metting::find($metting->id);
        $meetings->delete();
        return redirect()->route('meeting.index')->with('success','data deletion successfully....');

    }
}
