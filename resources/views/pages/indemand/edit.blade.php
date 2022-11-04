@extends('layouts.master')
@section('title','Product Edit')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">InDemand Products</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">InDemand Products</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">InDemand Products</h4>
                    <p class="card-title-desc">Edit Indemand Products</p>
                </div>
                <div class="card-body">
                    <form action="{{ route( 'indemand.update',$indemands->id) }}" method="post" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row">
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="mb-4">--}}
{{--                                    <label class="form-label" for="category_id">Category<span class="text-danger">*</span></label>--}}
{{--                                    <select class="form-select" name="category_id" type="text" >--}}
{{--                                        <option value="">Select Category</option>--}}
{{--                                        @forelse($categories as $key=>$category)--}}
{{--                                            <option value="{{$category->id}}" @if($products->category_id== $category->id) selected @endif>{{$category->name}}</option>--}}
{{--                                        @empty--}}
{{--                                        @endforelse--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="default-input">Name<span class="text-danger">*</span></label>
                                    <input class="form-control" name="product_name" type="text" value="{{$indemands->product_name}}" id="product_name" placeholder="Default input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div>
                                    <label class="form-label" for="price">Source Of Information<span class="text-danger">*</span></label>
                                    <input class="form-control" name="source_of_information" type="text" value="{{$indemands->source_of_information}}" id="price" placeholder="Source Of Information">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="market_rate">Market Rate<span class="text-danger">*</span></label>
                                    <input class="form-control" name="market_rate" type="text"  value="{{$indemands->market_rate}}" id="market_rate" placeholder="Market Rate">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label class="form-label" for="market_trend">Market Trend<span class="text-danger">*</span></label>
                                    <input class="form-control" name="market_trend" type="text"  value="{{$indemands->market_trend}}" id="market trend" placeholder="market trend increasing/decreasing/stable">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="note" class="form-label">Note<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"name="note" value="{{$indemands->note}}"id="note" placeholder="Causes">
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
