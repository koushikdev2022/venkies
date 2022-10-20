@extends('layouts.master')
@section('title','Category Create')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User</h4>
                    <p class="card-title-desc">Create Category</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'categorie.store') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">Name<span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" type="text" id="name" placeholder="Default input">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="image">Image<span class="text-danger">*</span></label>
                                    <input class="form-control" name="image" type="file" accept="image/*" id="image" placeholder="Please select Image">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" value="create" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
