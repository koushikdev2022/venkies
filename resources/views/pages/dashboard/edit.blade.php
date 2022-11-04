@extends('layouts.master')
@section('title','Status Edit')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Status</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Status</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Status</h4>
                    <p class="card-title-desc">Edit Status</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'status.update',$status->id) }}" method="post" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="status">User Name<span class="text-danger">*</span></label>
                                    <select class="form-select" name="status" type="text" >
                                        <option value="{{$staus->status}}">{{$status->status}}</option>
                                        @forelse($status as $key=>$sta)
                                            <option value="{{$sta->id}}">{{$sta->status}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class=" mt-4">
                                <button type="submit" class="btn btn-primary w-md" value="Update">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
