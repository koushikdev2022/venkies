<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function product_list($id=null)
   {
       if($id){
           $r=Product::where('category_id',$id)->get();
       }else{
           $r=Product::latest()->get();
       }
       $r->map(function ($listing) {
           $listing['image'] = $listing->getFirstMediaUrl('product', 'thumb');
           unset($listing['media']);
           return $listing;
       });
       return $this->SuccessResponse('200','product fetch Successfully',$r);

   }
}
