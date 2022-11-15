<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Metting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    public function meeting_list(){
        $meeting= Metting::with('get_retailer','user')->where('user_id',auth()->id())->latest()->get();
        return $this->SuccessResponse(200,'Meetings fetch successfully',$meeting);
    }
    public function meeting_details($id){
        $meeting=Metting::find($id);
        $meeting->executive_name = $meeting->user->name;
        $meeting->retailer_name = $meeting->get_retailer->name ?? '';
        unset($meeting['user']);
        unset($meeting['get_retailer']);
        return $this->SuccessResponse(200,'Meetings fetch successfully',$meeting);
    }
    public function today_meeting(){
       $list = Metting::with('get_retailer','user')->where([ 'date' => date('Y-m-d',strtotime(Carbon::now()))  , 'user_id' =>auth()->id()])->get();
       return $this->SuccessResponse('200','data fetch successfully',$list);
    }

    public function create_meeting(Request $request){

        $validator=Validator::make($request->all(),[
            'retailer'=>'required',
            'date'=>'required',
            'time'=>'required',
            'note'=>'required'
        ]);
        if($validator->fails()){
            return $this->ErrorResponse('400',$validator->messages());
        }
        Metting::create([
            'user_id'=>auth()->id(),
            'retailer'=>$request->retailer,
            'date'=>date('Y-m-d',strtotime($request->date)),
            'time'=>date('H:i:s',strtotime($request->time)),
            'note'=>$request->note,
        ]);
        return $this->SuccessResponse('200','Meeting Created successfully');
    }

    public function update_meeting(Request $request)
    {
        $meetings=Metting::find($request->id);
        if($meetings==''){
            return $this->ErrorResponse(400,"Something went wrong ...!");
        }
       $result=  $meetings->update([
            'retailer'=>$request->retailer,
            'date'=>date('Y-m-d',strtotime($request->date)),
            'time'=>date('H:i:s',strtotime($request->time)),
            'note'=>$request->note,

        ]);
        if(!$result){
            return $this->ErrorResponse(400,"Something went wrong ...!");
        }
        return $this->SuccessResponse(200,'Meeting updated created successfully ...!', $meetings);
    }
}
