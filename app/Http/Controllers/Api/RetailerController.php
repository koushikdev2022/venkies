<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Retailer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RetailerController extends Controller
{
    public function retailer_register(Request $request){
     $validate=   Validator::make($request->all(),[
            'name'=>'required',
            'mobile1'=>'nullable',
            'mobile2' =>'nullable',
            'email' =>'nullable',
            'address'=>'nullable',
            'address1'=>'nullable',
            'city'=>'nullable',
            'pin_code'=>'nullable',
            'state'=>'nullable',
            'concern_person_name'=>'nullable',
            'region'=>'nullable',
            'pan'=>'nullable',
            'gst'=>'nullable',
            'aadhar'=>'nullable'
        ]);
        if($validate->fails()){
            return $this->ErrorResponse(400,$validate->messages());
        }
        $retailer= Retailer::create([
            'user_id'=>auth()->id(),
            'name'=>$request->name,
            'mobile1'=>$request->mobile1,
            'mobile2' =>$request->mobile2,
            'email' => $request->email,
            'address'=>$request->address,
            'address1'=>$request->address1,
            'city'=>$request->city,
            'pin_code'=>$request->pin_code,
            'state'=>$request->state,
            'concern_person_name'=>$request->concern_person_name,
            'region'=>$request->region,
            'pan'=>$request->pan,
            'gst'=>$request->gst,
            'aadhar'=>$request->aadhar
        ]);
        if(!$retailer){
            return $this->ErrorResponse(400,"Something went wrong ...!");
        }
        return $this->SuccessResponse(200,'Retailer created successfully ...!', $retailer);
    }
    public function retailer_update(Request $request){
        $r= Retailer::find($request->id);
        if(!$r){
            return $this->ErrorResponse(400,'Retailer does\'not exists');
        }
        $r->update([
            'user_id'=>auth()->id(),
            'name'=>$request->name?? $r->name,
            'mobile1'=>$request->mobile1 ?? $r->mobile1,
            'mobile2' =>$request->mobile2?? $r->mobile2,
            'email' => $request->email?? $r->email,
            'address'=>$request->address?? $r->address,
            'address1'=>$request->address1?? $r->address1,
            'city'=>$request->city?? $r->city,
            'pin_code'=>$request->pin_code ?? $r->pin_code,
            'state'=>$request->state?? $r->state,
            'concern_person_name'=>$request->concern_person_name?? $r->concern_person_name,
            'region'=>$request->region?? $r->region,
            'pan'=>$request->pan?? $r->pan ,
            'gst'=>$request->gst?? $r->gst,
            'aadhar'=>$request->aadhar?? $r->aadhar,
        ]);
        return $this->SuccessResponse(200,'Retailer Updated successfully....!',$r);

    }
    public function retailer_list(){
        $r= Retailer::where('user_id',auth()->id())->get();
        return $this->SuccessResponse(200,'Retailer fetch successfully ..!',$r);
    }

}
