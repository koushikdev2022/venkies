<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Onboarding;
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
    public function authentication(){
        return $this->ErrorResponse(401,'authentication failed');
    }

    public function boarding(){
        $banners= Onboarding::latest()->get();
        if(!is_null($banners)){
            $banners->map(function($listing){
                $listing['image']= $listing->getFirstMediaUrl('boarding','thumb');
                unset( $listing['media']);
                unset( $listing['created_at']);
                unset( $listing['updated_at']);
            });
        }
        else{
            return $this->SuccessResponse(200,"No data found",null);
        }
        return $this->SuccessResponse(200,"Data fetch Successfully",$banners);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->SuccessResponse(200, 'You have successfully logged out');
    }

    public function profile_update(Request $request){
        $user= User::find(auth()->id());
       $result= $user->update([
            'name'=>$request->name ?? $user->name,
            'email'=>$request->email?? $user->email,
            'mobile'=>$request->mobile ?? $user->mobile,
            'mobile1'=>$request->mobile1?? $user->mobile1
        ]);
        if($request->hasFile('image')){
            $user->clearCollection('profile');
            $user->addMedia($request->image)->toMediaCollection('profile');
        }
        if(!$result){
            return $this->ErrorResponse(400,"Something went wrong ...!");
        }
        return $this->SuccessResponse(200,'Data updated created successfully ...!', $result);
    }
}
