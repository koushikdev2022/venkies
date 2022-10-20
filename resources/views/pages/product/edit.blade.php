@extends('layouts.master')
@section('title','Product Edit')
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
                    <form action="{{ route( 'product.update',$products->id) }}" method="post" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="category_id">Category<span class="text-danger">*</span></label>
                                    <select class="form-select" name="category_id" type="text" >
                                        <option value="">Select Category</option>
                                        @forelse($categories as $key=>$category)
                                            <option value="{{$category->id}}" @if($products->category_id== $category->id) selected @endif>{{$category->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">Name<span class="text-danger">*</span></label>
                                    <input class="form-control" name="name" type="text" value="{{$products->name}}" id="name" placeholder="Default input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                                    <input class="form-control" name="price" type="number" value="{{$products->price}}" id="price" placeholder="price">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="description">description<span class="text-danger">*</span></label>
                                    <input class="form-control" name="description" type="text"  value="{{$products->description}}" id="description" placeholder="Enter the description">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="image">Image<span class="text-danger">*</span></label>
                                    <input class="form-control" name="image" type="file" accept="image/*" value="{{$products->image}}" id="image" placeholder="Please select Image">
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
