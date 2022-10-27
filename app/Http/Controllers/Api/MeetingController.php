<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Metting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function meeting_list(){
        $meeting= Metting::where('user_id',auth()->id())->latest()->get();
        return $this->SuccessResponse(200,'Meetings fetch successfully',$meeting);
    }
}
