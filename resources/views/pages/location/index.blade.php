@extends('layouts.master')
@section('title','Loccation')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Location</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Location</a></li>
                        <li class="breadcrumb-item active">Location List</li>
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
                            <h4 class="card-title">Location</h4>
                            <p class="card-title-desc">Locaion List</p>
                        </div>
{{--                        <div class="col-sm-6">--}}
{{--                            <span class="card-title btn btn-primary float-end "><a href="{{route('location.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="card-body">
                    <table id="example1" style="width: 100%;" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Serial_No</th>
                            <th>User Name</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Address</th>
                            <th>Description of Product</th>
                            <th>Contact</th>
{{--                            <th>Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($locations as $key=>$r)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$r->location_user_name->name}}</td>
                                <td>{{$r->longitude}}</td>
                                <td>{{$r->latitude}}</td>
                                <td>{{$r->address}}</td>
                                <td>{{$r->description}}</td>
                                <td>{{$r->contact}}</td>
                                <td class="justify-content-between justify-content-center">
                                    <form action="{{ route('location.destroy',$r->id) }}" method="Post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{route('location.edit',$r->id)}}" class="btn btn-info justify-content-center">Edit</a>

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
    {{--        </div>--}}
    {{--    </section>--}}
@endsection

