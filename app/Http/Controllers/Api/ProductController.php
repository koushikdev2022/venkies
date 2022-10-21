<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function product_list()
   {
       $r=Product::all();
       $r->map(function ($listing) {
           $listing['image'] = $listing->getFirstMediaUrl('product', 'thumb');
           unset($listing['media']);
           return $listing;
       });
       return $this->SuccessResponse('200','product fetch Succesfully',$r);

   }
}
