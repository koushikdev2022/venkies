@extends('layouts.master')
@section('title','Leave List')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Leave</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Leave</a></li>
                        <li class="breadcrumb-item active">  Leave List</li>
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
                                    <h4 class="card-title">Leave</h4>
                                    <p class="card-title-desc">Leave List</p>
                                </div>
                                <div class="col-sm-6">
                                    <span class="card-title btn btn-primary float-end "><a href="{{route('leave.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="datatable-buttons" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>User Name</th>
                                    <th>Type</th>
                                    <th> Cause </th>
                                    <th> From </th>
                                    <th> To</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($leaves as $key=>$lea)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$lea->leave_user->name}}</td>
                                        <td>{{$lea->type}}</td>
                                        <td>{{$lea->cause}}</td>
                                        <td>{{$lea->from}}</td>
                                        <td>{{$lea->to}}</td>
                                        <td class="justify-content-between justify-content-center">
                                            <form action="{{ route('leave.destroy',$lea->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{route('leave.edit',$lea->id)}}" class="btn btn-info justify-content-center">Edit</a>

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

