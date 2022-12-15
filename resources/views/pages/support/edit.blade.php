@extends('layouts.master')
@section('title','Product Edit')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Support</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Support</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Support</h4>
                    <p class="card-title-desc">Edit Support</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'support.update',$support->id) }}" method="post" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">Name<span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" type="text" value="{{$support->name}}" id="name" placeholder="Default input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">email<span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" type="text" value="{{$support->email}}" id="name" placeholder="Default input">
                                </div>
                            </div>

                            <div class=" mt-4">
                                <button type="submit" class="btn btn-primary w-md">Update</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
