<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['days'] = date('d');
        $data['month'] = date('M');
        $data['month_number'] = date('m');
        $data['year_number'] = date('Y');
        $data['information'] = User::all()->map(function ($user) {
            $attendance = Attendance::where(['user_id' => $user['id']])->whereBetween('created_at', [date('Y-m-1'),Carbon::now()])->get();
            $user['attendance'] = $attendance;
            return $user;
        });
//        $salesman= array();
//        foreach($users as $user)
//        {
//            $salesman['id'] = $user->id;
//            $salesman['name'] = $user->name;
//
//            foreach($attendances as $attendance)
//            {
//                if($attendance->user_id == $user->id)
//                {
//                    $attend_2['attendance'] = $attendance->attendance=='Present'?'P':'A';
//                    $attend_2['advance'] = 'n';
//                    $attend_2['date'] = $attendance->created_at;
//                    $attend[] = $attend_2;
//                }
//            }
//            $salesman['attendance'] = $attend;
//            $final[] = $salesman;
//        }
        return view('pages.attendance.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('pages.attendance.create',compact('users'));
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
            'date'=>'required',
            'attendance'=>'required'
        ]);
        $attendances=Attendance::create([
            'user_id'=>$request->user_id,
            'date'=>$request->date,
            'attendance'=>$request->attendance,
        ]);

        if ($attendances!==null)
        {
            return redirect()->route('attendance.index')->with('success','data inserted successfullly');

        }
        return redirect()->route('attendance.index')->with('failure','data insertion failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        $users=User::all();
       $attendances=Attendance::find($attendance->id);
       return view('pages.attendance.edit',compact('attendances','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        $attendances=Attendance::find($attendance->id);
        $attendances->update([
            'user_id'=>$request->user_id,
            'date'=>$request->date,
            'attendance'=>$request->attendance,

        ]);
        return redirect()->route('attendance.index')->with('success','data updation successfullly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        $attendances=Attendance::find($attendance->id);
        $attendances->delete();
        return redirect()->route('attendance.index')->with('success', 'deletion successfully.....');
    }
}
