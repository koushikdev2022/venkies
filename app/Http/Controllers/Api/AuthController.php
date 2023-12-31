<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetEmail;
use App\Mail\Report;
use App\Models\Cart;
use App\Models\InDemandProduct;
use App\Models\Leave;
use App\Models\Metting;
use App\Models\Onboarding;
use App\Models\Retailer;
use App\Models\User;
use App\Models\UserReport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

    public function today_task(){
        $list = Metting::with('get_retailer','user')->where([ 'date' => date('Y-m-d',strtotime(Carbon::now()))  , 'user_id' =>auth()->id()])->get();
        $order= Cart::with('products.media')->distinct('retailer')->where(['user_id'=>auth()->id()])->whereDate('created_at', '=', Carbon::today())->get()->map(function($rel){
            $rel->retailer_name= $rel->get_retailer->name??'';
            unset($rel['get_retailer']);
            return $rel;
        });
        $retailer = Retailer::where('user_id',auth()->id())->whereDate('created_at', '=', Carbon::today())->get();
        $leave = Leave::where('user_id',auth()->id())->get();
        $indemand= InDemandProduct::where('user_id',auth()->id())->whereDate('created_at', '=', Carbon::today())->get();
        $response= array(
            'list'=>$list,
            'order'=>$order,
            'indemand'=>$indemand,
            'leave' =>$leave,
            'retailer'=>$retailer
        );
        return $this->SuccessResponse(200,'Data updated created successfully ...!', $response);

    }

   public function send_password(){

        $data= User::where('id',auth()->id())->first();
        $new_pass= str::random(8);
        if($data['email']==''||$data['email']=='null'){
            return $this->ErrorResponse(400,"You do not have register email id ..!");
        }

        $data->update([
           'password'=>Hash::make($new_pass)
        ]);
        $user= array(
            'password'=> $new_pass,
            'name'=> $data->name,
        );

       Mail::to('anujchauhan0996@gmail.com')->send(new PasswordResetEmail($user));

       return $this->SuccessResponse(200,'Mail send successfully ...!');

   }

   public function send_report(Request $request){
       $validate= Validator::make($request->all(),[
           'mail_id'=> 'required',
       ]);

       if($validate->fails()){
           return $this->ErrorResponse(400,$validate->errors());
       }

       $data= User::where('id',auth()->id())->first();
       if($data['email']==''||$data['email']=='null'){
           return $this->ErrorResponse(400,"You do not have register email id ..!");
       }
       if(UserReport::where('user_id',auth()->id())->whereDate('created_at',Carbon::now())->exists()){
           return $this->ErrorResponse(400,"Report already send to admin ..!");
       }
       $list = Metting::with('get_retailer','user')->where([ 'date' => date('Y-m-d',strtotime(Carbon::now()))  , 'user_id' =>auth()->id()])->get();
       $order= Cart::select("*")->with('products')->where(['user_id'=>auth()->id()])->whereDate('created_at', '=', Carbon::today())->get()->groupBy(['retailer']);

       $retailer = Retailer::where('user_id',auth()->id())->whereDate('created_at', '=', Carbon::today())->get();
       $leave = Leave::where('user_id',auth()->id())->get();
       $indemand= InDemandProduct::where('user_id',auth()->id())->whereDate('created_at', '=', Carbon::today())->get();
       $value= array(
           'list'=>$list,
           'order'=>$order,
           'indemand'=>$indemand,
           'leave' =>$leave,
           'retailer'=>$retailer
       );

//       return view('mail.today_report',compact('value'));
           Mail::to($request->mail_id)
               ->cc($request->cc)
               ->bcc($request->bcc)
               ->send(new Report($value));




       return $this->SuccessResponse(200,'Mail send successfully ...! ');

   }

}
