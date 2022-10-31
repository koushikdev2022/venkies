<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Metting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
}
