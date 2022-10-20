<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $validate= Validator::make($request->all(),[
            'email'=> 'required',
            'password' =>'required'
        ]);

        if($validate->fails()){
            return $this->ErrorResponse(400,$validate->errors());
        }
        if(!User::where('email',$request->email)->exists()){
            return $this->ErrorResponse(400,'User does\'not exists');
        }
        $user= User::where('email',$request->email)->first();
        if (!hash::check($request->password, $user->password)) {
            return $this->ErrorResponse(400, 'You have entered wrong password');
        }
        $user['token'] = 'Bearer ' . $user->createToken('auth_token')->plainTextToken;
        unset($user['created_at']);
        unset($user['updated_at']);
        return $this->SuccessResponse(200, 'Login Successfully..', $user);

    }
}
