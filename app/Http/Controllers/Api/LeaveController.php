<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\If_;

class LeaveController extends Controller
{
   public function create_leave(Request $request){

       $validator=Validator::make($request->all(),[

           'type'=>'required',
           'cause'=>'required',
           'from'=>'required',
           'to'=>'required'
       ]);
       if ($validator->fails())
       {
           return $this->ErrorResponse('400',$validator->messages());
       }
       $result=Leave::create([
          'user_id'=>auth()->id(),
          'type'=>$request->type,
          'cause'=>$request->cause,
          'from'=>date('Y-m-d',strtotime($request->from)),
          'to'=>date('Y-m-d',strtotime($request->to)),
       ]);
       if ($result!==null){
           return $this->SuccessResponse('200','Leave Created Successfully',$result);
       }
       return $this->ErrorResponse('400','Something Went Wrong');

   }

//   public function update_leave(Request $request,$id){
//       $user=Leave::find($id);
//        $result=$user->update([
//           'type'=>$request->type?? $user->type,
//           'cause'=>$request->cause??$user->cause,
//            'from'=>date('d-m-Y',strtotime($request->from)),
//            'to'=>date('d-m-Y',strtotime($request->to)),
//       ]);
//        if ($result){
//            return $this->SuccessResponse('200', 'Leave Updated Successfully', $user);
//        }
//       return $this->ErrorResponse('400','Something Went Wrong');
//   }

   public function list_leave(){
       $list=Leave::where('user_id',auth()->id())->latest()->get();
       return $this->SuccessResponse('200','Data Fetch Successfully', $list);
   }

   public function find_leave($id){
       $find = Leave::find($id);
       return $this->SuccessResponse('200','Data Fetch Successfully', $find);
   }
}
