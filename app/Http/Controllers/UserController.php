<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::all();
        $users->map(function($listing){
            $listing['image']= $listing->getFirstMediaUrl('user','thumb')??"";
            return $listing;
           });
        return view('pages.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate= $this->validate($request,[
           'name'=>'required',
           'email' => 'required',
           'password' =>'required',
           'mobile'=>'required',
        ]);


        $user= User::create([
            'name'=>$validate['name'],
            'email' => $validate['email'],
            'password' =>Hash::make($validate['password']),
            'mobile'=>$validate['mobile'],
        ]);
        if($request->hasFile('image')){
            $user->addMedia($request->image)->toMediaCollection('user');
        }
        return redirect()->route('user.index')->with('success','User created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::find($id);
        return view('pages.user.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users=User::find($id);

       $users->update(
           [
               'name'=>$request->name,
               'email'=>$request->email,
               'mobile'=>$request->mobile,
               'password'=>$request->password,
           ]
       );
        if($request->hasFile('image')){
            $users->clearMediaCollection('user');
            $users->addMedia($request->image)->toMediaCollection('user');
        }
        return redirect()->route('user.index')->with('success','user update successfully ..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctors=User::find($id);
        $doctors->delete();
        return redirect()->route('user.index')->with('success','User deleted successfully ..!');
    }

    public function updateStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
