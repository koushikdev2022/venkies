<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Retailer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'business_type'=>$request->business_type,
            'region'=>$request->region,
            'pan'=>$request->pan,
            'gst'=>$request->gst,
            'description' => $request->description,
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
            'business_type'=>$request->business_type,
            'state'=>$request->state?? $r->state,
            'concern_person_name'=>$request->concern_person_name?? $r->concern_person_name,
            'region'=>$request->region?? $r->region,
            'pan'=>$request->pan?? $r->pan ,
            'gst'=>$request->gst?? $r->gst,
            'description' => $request->description?? $r->description,
            'aadhar'=>$request->aadhar?? $r->aadhar,
        ]);
        return $this->SuccessResponse(200,'Retailer Updated successfully....!',$r);

    }
    public function retailer_list(){
        $r= Retailer::where('user_id',auth()->id())->latest()->get();
        return $this->SuccessResponse(200,'Retailer fetch successfully ..!',$r);
    }
    public function retailer_find(Request $request){
        $r= Retailer::find($request->id);
        if($r!==null)
        {
            return $this->SuccessResponse(200,'Retailer fetch successfully ..!',$r);
        }
        return $this->ErrorResponse(400,"Retailer not Found with this id!");

    }

    public function retailer_order(){
        $retailer= Retailer::select(DB::raw("COUNT(*) as total"),DB::raw("MONTHNAME(created_at) as MonthName"))
            ->whereYear('created_at',date('Y'))
            ->groupBy('MonthName')
            ->get();
        $orders= Cart::select(DB::raw("COUNT(*) as total"),DB::raw("MONTHNAME(created_at) as MonthName"))
            ->whereYear('created_at',date('Y'))
            ->groupBy('MonthName')
            ->get();
        $response=[
            'retailer' => $retailer,
            'orders'=>$orders
        ];
        return response(['code'=>200,'data'=>$response]);
    }
}
