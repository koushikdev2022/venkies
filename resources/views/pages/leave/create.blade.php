@extends('layouts.master')
@section('title','Leave')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Leave</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Leave</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Leave</h4>
                    <p class="card-title-desc">Add Leave</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'leave.store') }}" method="post" enctype="multipart/form-data">@csrf
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
                                    <label class="form-label" for="form-sm-input">Type of Leave <span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="">Select Type of Leave</option>
                                        <option value="causal">casual</option>
                                        <option value="formal">formal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="cause" class="form-label">Cause <span class="text-danger">*</span></label>
                                    <input type="text" class="form-select" name="cause" id="cause" placeholder="Cause of Leave">

                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">From<span class="text-danger">*</span></label>
                                    <input class="form-control" name="from" type="date" id="from" placeholder="From">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">To<span class="text-danger">*</span></label>
                                    <input class="form-control" name="to" type="date" id="to" placeholder="TO">
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
