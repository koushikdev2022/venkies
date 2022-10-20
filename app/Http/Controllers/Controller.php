<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function SuccessResponse($code,$message,$data=null){
        $response=[];
        if( is_null($data)){
            $response= array(
                'success'=>true,
                'code'=>$code,
                'message'=>$message
            ) ;
        }else{
            $response=array(
                'success'=>true,
                'code'=>$code,
                'message'=>$message ?? ' No Record Found ..!' ,
                'data'=>$data
            );
        }

        return response($response,$code);
    }

    public function ErrorResponse($code,$message){
        $response=array(
            'success'=>false,
            'code'=>$code,
            'message'=>$message,
        );
        return response()->json($response,$code);
    }

}
