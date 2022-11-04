@extends('layouts.master')
@section('title','Attendance')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Attendence</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Attendance</h4>
                    <p class="card-title-desc">Add Attendance</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'attendance.store') }}" method="post" enctype="multipart/form-data">@csrf
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
                                    <label class="form-label" for="default-input">Date<span class="text-danger">*</span></label>
                                    <input class="form-control" name="date" type="date" id="date" placeholder="date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input"> Attendance<span class="text-danger">*</span></label>
                                    <select name="attendance" id="attendance" class="form-select">
                                        <option value="">
                                            Select Attendance
                                        </option>
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                    </select>
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
