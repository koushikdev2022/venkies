@extends('layouts.master')
@section('title','Product List')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">cart</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cart</li>
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
                                    <h4 class="card-title">Cart</h4>
                                    <p class="card-title-desc">Cart List</p>
                                </div>
                                <div class="col-sm-6">
                                    <span class="card-title btn btn-primary float-end "><a href="{{route('cart.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="datatable-buttons" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
{{--                                    <th>User Name</th>--}}
                                    <th>  Retailer Name</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th width="80px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($carts as $key=>$user)
                                    <tr>
                                        <td>{{$key+1}}</td>
{{--                                        <td>{{$user->cart_name->name ?? ""}}</td>--}}
                                        <td>{{$user->get_retailer->name??""}}</td>
                                        <td>{{$user->products->name??""}}</td>
                                        <td>{{$user->quantity}}</td>
                                        <td>{{$user->price}}</td>
                                        <td class="justify-content-between justify-content-center">
                                            <form action="{{ route('cart.destroy',$user->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{route('cart.edit',$user->id)}}" class="btn btn-info justify-content-center"><i class='fa fa-edit'></i></a>

                                                <button type="submit" class="btn btn-danger justify-content-center"><i class='fa fa-trash'></i></button>
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
{{--        </div>--}}
{{--    </section>--}}
@endsection

