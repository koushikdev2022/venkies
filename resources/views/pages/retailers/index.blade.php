@extends('layouts.master')
@section('title','Retailer List')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Retailers</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">Retailers List</li>
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
                            <h4 class="card-title">Retailers</h4>
                            <p class="card-title-desc">Retailers List</p>
                        </div>
{{--                        <div class="col-sm-6">--}}
{{--                            <span class="card-title btn btn-primary float-end "><a href="{{route('retailer.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" style="width: 100%;" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th> user_id</th>
                                <th>name</th>
                                <th>Mobile</th>
                                <th>email</th>
                                <th>City</th>
                                <th>Pin Code</th>
{{--                                <th>State</th>--}}
{{--                                <th>Concern Person Name</th>--}}
{{--                                <th>Region</th>--}}
{{--                                <th>pan</th>--}}
{{--                                <th>gst</th>--}}
{{--                                <th>Aadhar</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($retailers as $key=>$user)
                                <tr >
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->get_user->name}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->mobile1}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->city}}</td>
                                    <td>{{$user->pin_code}}</td>
{{--                                    <td>{{$user->state}}</td>--}}
{{--                                    <td>{{$user->concern_person_name}}</td>--}}
{{--                                    <td>{{$user->region}}</td>--}}
{{--                                    <td>{{$user->pan}}</td>--}}
{{--                                    <td>{{$user->gst}}</td>--}}
{{--                                    <td>{{$user->aadhar}}</td>--}}

                                    <td>
                                        <form action="{{ route('retailer.destroy',$user->id) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('retailer.edit',$user->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('retailer.show',$user)}}" class="btn btn-default">View</a>
                                            <button type="submit" class="btn btn-danger">Delete</button>

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

