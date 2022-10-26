@extends('layouts.master')
@section('title','Product Create')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" placeholder="Enter product name ..">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="description">Description<span class="text-danger">*</span></label>
                                    <input class="form-control @error('description') is-invalid @enderror " name="description" type="text" id="description" placeholder="description">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                                    <input class="form-control @error('price') is-invalid @enderror " name="price" type="number" id="price" placeholder="price">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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

