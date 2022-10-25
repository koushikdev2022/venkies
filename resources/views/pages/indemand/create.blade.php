@extends('layouts.master')
@section('title','Indemand Poduct')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Indemand Products</h4>

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
                    <h4 class="card-title"> Indemand Product</h4>
                    <p class="card-title-desc">Create indemand Products</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'indemand.store') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row">
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="mb-4">--}}
{{--                                    <label class="form-label" for="form-sm-input">Category<span class="text-danger">*</span></label>--}}
{{--                                    <select class="form-select" name="category_id" type="text" >--}}
{{--                                        <option value="">Select Category</option>--}}
{{--                                        @forelse($categories as $key=>$category)--}}
{{--                                        <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                                        @empty--}}
{{--                                        @endforelse--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input"> Product Name<span class="text-danger">*</span></label>
                                    <input class="form-control" name="product_name" type="text" id="product_name" placeholder="Product Name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="Source_of_information">Source Of Information<span class="text-danger">*</span></label>
                                    <input class="form-control" name="source_of_information" type="text" id="source_of_information" placeholder="Information Source">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="market_rate"> Market Price<span class="text-danger">*</span></label>
                                    <input class="form-control" name="market_rate" type="number" id="market_rate" placeholder="Market Rate">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="trend">Market Trend<span class="text-danger">*</span></label>
                                    <input class="form-control" name="market_trend" type="text" accept="image/*" id="image" placeholder="Market trend">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <lable class="form-label " for="note">Note<span class="text-danger">*</span>

                                    </lable>
                                    <input type="text"  class="form-control" name="note" id="name" placeholder="Note">
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
