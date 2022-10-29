<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function meeting(){
        return $this->hasMany(Metting::class,'retailer');

    }
}
