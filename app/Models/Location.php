<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function location_user_name(){
        return $this->belongsTo(User::class,'user_id');
    }
}
