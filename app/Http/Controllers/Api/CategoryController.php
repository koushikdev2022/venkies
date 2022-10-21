<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function list_category(){
        $category=Categorie::latest()->get();
         $category->map(function ($listing)
        {
            $listing['image']=$listing->getFirstMediaUrl('category','thumb');
            unset($listing['media']);
            return $listing;
        });
        return $this->SuccessResponse(200 ,'Category fetch Succesfully',$category);
    }
//    public function create_category(Request $request){
//        $validator=Validator::make($request->all(),[
//            'name'=>'required'
//        ]);
//        if($validator->fails()){
//            return $this->ErrorResponse('400',$validator->message());
//        }
//        $result=Categorie::create([
//           'name'=>$request->name,
//        ]);
//        if($request->hasFile('image')){
//            $request->addMedia($request->image)->toMediaCollection('category');
//        }
//        if(!$result){
//            return $this->ErrorResponse(400,"Something went wrong ...!");
//        }
//        return $this->SuccessResponse(200,'Retailer created successfully ...!', $result);
//
//
//    }
//    public function update_category(Request $request){
//        $r=Categorie::find($request->id);
//        if (!$r){
//            return $this->ErrorResponse('400', 'retailer does not exist');
//        }
//        $r->update([
//            'name'=>$r['name'],
//        ]);
//        if ($request->hasFile('image')){
//            $r->clearMediaCollection('category');
//            $r->addMedia($request->image)->toMediaCollection('category');
//        }
//        return $this->SuccessResponse(200 ,'Category Updated Succesfully',$r);
//    }
}
