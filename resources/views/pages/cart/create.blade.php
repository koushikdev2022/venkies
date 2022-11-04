@extends('layouts.master')
@section('title','Vart Create')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Cart</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cart</h4>
                    <p class="card-title-desc">Create Cart</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'cart.store') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="mb-4">--}}
{{--                                    <label class="form-label" for="form-sm-input">User Name<span class="text-danger">*</span></label>--}}
{{--                                    <select class="form-select" name="user_id" type="text" >--}}
{{--                                        <option value="">Select User</option>--}}
{{--                                        @forelse($users as $key=>$user)--}}
{{--                                            <option value="{{$user->id}}">{{$user->name}}</option>--}}
{{--                                        @empty--}}
{{--                                        @endforelse--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="form-sm-input">retailer Name<span class="text-danger">*</span></label>
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
                                    <label class="form-label" for="form-sm-input">Product Name<span class="text-danger">*</span></label>
                                    <select class="form-select" name="product" type="text" >
                                        <option value="">Select product</option>
                                        @forelse($products as $key=>$product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">Quantity<span class="text-danger">*</span></label>
                                    <input class="form-control @error('quantity') is-invalid @enderror" name="quantity" type="number" id="quantity" placeholder="Enter number  ..">
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                                    <input class="form-control @error('price') is-invalid @enderror " name="price" type="text" id="price" placeholder="price">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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

