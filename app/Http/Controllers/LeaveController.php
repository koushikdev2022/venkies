<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves=Leave::all();
        return view('pages.leave.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('pages.leave.create',compact('users'));
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
            'type'=>'required',
            'cause'=>'required',
            'from'=>'required',
            'to'=>'required'
        ]);
        $result=Leave::create([
            'user_id'=>$request->user_id,
            'type'=>$request->type,
            'cause'=>$request->cause,
            'from'=>date('Y-m-d',strtotime($request->from)),
            'to'=>date('Y-m-d',strtotime($request->to)),
            'status'=>$request->status

        ]);
        if ($result!==null){
            return redirect()->route('leave.index')->with('success','leave added successfully');
        }
        return redirect()->route('leave.index')->with('failure','something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        $users=User::all();
        $leaves=Leave::find($leave->id);
        return view('pages.leave.edit',compact('leaves','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        $user=Leave::find( $leave->id);
        $result=$user->update([
            'type'=>$request->type?? $user->type,
            'cause'=>$request->cause??$user->cause,
            'from'=>date('Y-m-d',strtotime($request->from))??$user->from,
            'to'=>date('Y-m-d',strtotime($request->to))??$user->to,
        ]);
        if ($result){
            return redirect()->route('leave.index')->with('success','leave updated successfuly');
        }
        return redirect()->route('leave.index')->with('failure','something went wrong');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        $leaves=Leave::find($leave->id);
        $leaves->delete();
        return redirect()->route('leave.index')->with('success','leave deleted successfuly');
    }
}
