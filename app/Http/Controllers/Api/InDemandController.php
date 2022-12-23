<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InDemandProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class InDemandController extends Controller
{
    public function indemand_list(){
        $indemands=InDemandProduct::all();
        return $this->SuccessResponse('200','list fetch successfully....',$indemands);
    }
    public function add_product( Request $request){
        $validator=Validator::make($request->all(),[
            'product_name'=>'required',
            'source_of_information'=>'required',
            'market_trend'=>'required',
            'market_rate'=>'required',
            'note'=>'required',
            'address'=>'required'
            ]);
        if($validator->fails()){
            return $this->ErrorResponse('400',$validator->messages());
        }
        $result=InDemandProduct::create([
            'user_id'=> auth()->id(),
            'product_name'=>$request->product_name,
            'source_of_information'=>$request->source_of_information,
            'market_rate'=>$request->market_rate,
            'market_trend'=>$request->market_trend,
            'note'=>$request->note,
            'address'=>$request->address
        ]);
        if(!$result){
            return $this->ErrorResponse(400,"Something went wrong ...!");
        }
        return $this->SuccessResponse(200,'In-demand Product created successfully ...!', $result);

    }
    public function update_indemand(Request $request, $id){
        $demand= InDemandProduct::find($id);
       $result= $demand->update([
            'product_name'=>$request->product_name??$demand->product_name,
            'source_of_information'=>$request->source_of_information?? $demand->source_of_information,
            'market_rate'=>$request->market_rate?? $demand->market_rate,
            'market_trend'=>$request->market_trend ?? $demand->market_trend,
            'note'=>$request->note ?? $demand->note,
           'address'=>$request->address
        ]);
        if(!$result){
            return $this->ErrorResponse(400,"Something went wrong ...!");
        }
        return $this->SuccessResponse(200,'Data updated successfully ...!',  $demand);
    }

    public function single_demand(){
        $indemands=InDemandProduct::select('product_name')->groupBy('product_name')->get();
        return $this->SuccessResponse(200,'Data fetch successfully ..!',$indemands);
    }

}
