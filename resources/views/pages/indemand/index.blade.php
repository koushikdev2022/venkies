@extends('layouts.master')
@section('title','Product List')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Indemand Products</a></li>
                        <li class="breadcrumb-item active"> indemand Product List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="card-title"> Indemand Products</h4>
                                    <p class="card-title-desc"> indemand Product List</p>
                                </div>
                                <div class="col-sm-6">
                                    <span class="card-title btn btn-primary float-end "><a href="{{route('indemand.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-responsive-lg table-responsive-sm table-responsive-md">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Serial_No</th>
                                        <th>Product Name</th>
                                        <th> Information Source</th>
                                        <th> Market Price</th>
                                        <th>Market Trend</th>
                                        <th>Notes</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($indemands as $key=>$indemand)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$indemand->product_name}}</td>
                                            <td>{{$indemand->source_of_information}}</td>
                                            <td>{{$indemand->market_rate}}</td>
                                            <td>{{$indemand->market_trend}}</td>
                                            <td>{{$indemand->note  }}</td>
                                            <td class="justify-content-between justify-content-center">
                                                <form action="{{ route('indemand.destroy',$indemand->id) }}" method="Post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="{{route('indemand.edit',$indemand->id)}}" class="btn btn-info justify-content-center">Edit</a>

                                                    <button type="submit" class="btn btn-danger justify-content-center">Delete</button>

                                                </form>
                                            </td>
                                        </tr>
                                    @empty

                                    @endforelse
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
{{--        </div>--}}
{{--    </section>--}}
@endsection

