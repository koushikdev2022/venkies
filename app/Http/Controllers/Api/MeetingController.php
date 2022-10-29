<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Metting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function meeting_list(){
        $meeting= Metting::with('retailer','user')->where('user_id',auth()->id())->latest()->get();

        return $this->SuccessResponse(200,'Meetings fetch successfully',$meeting);
    }
    public function meeting_details($id){
        $meeting=Metting::find($id);
        $meeting->executive_name = $meeting->user->name;

        $meeting->retailer_name = $meeting->retailer->name ?? '';
        unset($meeting['user']);
        unset($meeting['retailer']);
        return $this->SuccessResponse(200,'Meetings fetch successfully',$meeting);
    }
}
