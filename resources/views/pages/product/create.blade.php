@extends('layouts.master')
@section('title','Product Create')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product</h4>
                    <p class="card-title-desc">Create Product</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'product.store') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="form-sm-input">Category<span class="text-danger">*</span></label>
                                    <select class="form-select" name="category_id" type="text" >
                                        <option value="">Select Category</option>
                                        @forelse($categories as $key=>$category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">Name<span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" type="text" id="name" placeholder="Default input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="description">Description<span class="text-danger">*</span></label>
                                    <input class="form-control" name="description" type="text" id="description" placeholder="description">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                                    <input class="form-control" name="price" type="number" id="price" placeholder="price">
                                </div>
                            </div>
                            <div class="col-sm-6 m-2">
                                <div>
                                    <label class="form-label" for="image">Image<span class="text-danger">*</span></label>
                                    <input class="form-control" name="image" type="file" accept="image/*" id="image" placeholder="Please select Image">
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
@extends('layouts.master')
@section('title','User Create')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                    <p class="card-title-desc">Create User</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'user.store') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">Name<span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" type="text" id="name" placeholder="Default input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="form-sm-input">Email<span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" type="email" id="email" placeholder="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="mobile">Mobile<span class="text-danger">*</span></label>
                                    <input class="form-control" name="mobile" type="number" id="form-lg-input" placeholder="mobile">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="password">Password<span class="text-danger">*</span></label>
                                    <input class="form-control" name="password" type="password" id="password" placeholder="Enter the Password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="image">Image<span class="text-danger">*</span></label>
                                    <input class="form-control" name="image" type="file" accept="image/*" id="image" placeholder="Please select Image">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
