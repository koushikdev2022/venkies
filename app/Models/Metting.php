<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metting extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function get_retailer(){
       return $this->belongsTo(Retailer::class ,'retailer');
    }
    public function  user(){
            return $this->belongsTo(User::class,'user_id');
    }

}
