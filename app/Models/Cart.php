<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function products(){
        return $this->belongsTo(Product::class,'product');
    }

    public function get_retailer(){
        return $this->belongsTo(Retailer::class,'retailer');
    }

    public function cart_user(){
            return $this->belongsTo(User::class,'user_id');
    }
}
