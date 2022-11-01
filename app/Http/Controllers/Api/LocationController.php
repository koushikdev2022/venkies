<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function location_list(){
        $location=Location::latest()->get();
        return $this->SuccessResponse('200','data fetch successfully',$location);
    }

    public function location_create(Request $request){
        $validator=Validator::make($request->all(),[
            'longitude'=>'required',
            'latitude'=>'required',
            'description'=>'nullable',
            'address'=>'required',
            'contact'=>'nullable'
        ]);
        if($validator->fails()){
            return $this->ErrorResponse(400,$validator->messages());
        }
        $locations=Location::create([
            'user_id'=>auth()->id(),
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            'description'=>$request->description,
            'address'=>$request->address,
            'contact'=>$request->contact
        ]);
        if(!$locations){
            return $this->ErrorResponse(400,"Something went wrong ...!");
        }
        return $this->SuccessResponse(200,'Location created successfully ...!', $locations);
    }
}
