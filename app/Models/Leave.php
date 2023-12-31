<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Leave extends Model
{
    protected $guarded=['id'];
    use HasFactory;
    public function  leave_user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
