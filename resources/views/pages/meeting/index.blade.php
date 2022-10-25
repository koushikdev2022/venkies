@extends('layouts.master')
@section('title','Meeting List')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Meeting</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Meeting</a></li>
                        <li class="breadcrumb-item active">  meeting List</li>
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
                                    <h4 class="card-title">Meeting</h4>
                                    <p class="card-title-desc"> Meeting List</p>
                                </div>
                                <div class="col-sm-6">
                                    <span class="card-title btn btn-primary float-end "><a href="{{route('meeting.create')}}" class=" text-white "><i class="fa fa-plus">&nbsp;</i>Add </a></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="example1" style="width: 100%;" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Serial_No</th>
                                    <th>User Name</th>
                                    <th>User Name</th>
                                    <th> Date </th>
                                    <th> Time </th>
                                    <th> Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($meetings as $key=>$meeting)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$meeting->user_id}}</td>
                                        <td>{{$meeting->retaier}}</td>
                                        <td>{{$meeting->date}}</td>
                                        <td>{{$meeting->time}}</td>
                                        <td>{{$meeting->note}}</td>
                                        <td class="justify-content-between justify-content-center">
                                            <form action="{{ route('meeting.destroy',$meeting->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{route('meeting.edit',$meeting->id)}}" class="btn btn-info justify-content-center">Edit</a>

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

