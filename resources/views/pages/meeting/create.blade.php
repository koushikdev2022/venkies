@extends('layouts.master')
@section('title','Meeting')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Meeting</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Meeting</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Meeting</h4>
                    <p class="card-title-desc">Add Meeting</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'meeting.store') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="form-sm-input">User Name<span class="text-danger">*</span></label>
                                    <select class="form-select" name="user_id" type="text" >
                                        <option value="">Select User</option>
                                        @forelse($users as $key=>$user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="form-sm-input">Retailer Name<span class="text-danger">*</span></label>
                                    <select class="form-select" name="retailer" type="text" >
                                        <option value="">Select User</option>
                                        @forelse($retailers as $key=>$retailer)
                                            <option value="{{$retailer->id}}">{{$retailer->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">Date<span class="text-danger">*</span></label>
                                    <input class="form-control" name="date" type="date" id="date" placeholder="date">
                                </div>
                            </div>
                           <div class="col-sm-6">
                               <div class="mb-4">
                                   <label for="time" class="form-label">Time<span class="text-danger">*</span></label>
                                   <input type="time" class="form-control" name="time" id="time">
                               </div>
                           </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="note" class="form-label">Note<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="note" id="note">
                                </div>
                            </div>
                            <div class=" mt-4">
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
