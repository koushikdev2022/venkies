@extends('layouts.master')
@section('title','Product List')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">InDemand Products</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active"> InDemand Products</li>
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
                                    <h4 class="card-title"> InDemand Products</h4>
                                    <p class="card-title-desc"> InDemand Products List</p>
                                </div>
                                <div class="col-sm-6">
                                    <span class="card-title btn btn-primary float-end "><a href="{{route('indemand.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-buttons" style="width: 100%;" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="60px">S.No</th>
                                        <th>Product Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($indemands as $key=>$indemand)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><a href="{{ route('indemand.show',$indemand->product_name) }}" > {{$indemand->product_name}} </a></td>
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

